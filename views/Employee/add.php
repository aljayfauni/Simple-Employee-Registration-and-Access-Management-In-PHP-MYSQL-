<?php
session_start();
if(isset($_SESSION['id']) && $_SESSION['id']== true){
 
}
else{
 header('location:../../views/Auth/login.php');
}

include '../../model/Accesslevel.php';
$conn_select_access_levels = new Access_level();
$read_all_access= $conn_select_access_levels->select_access_levels();
$number = mysqli_num_rows($read_all_access);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee</title>
    <style>
        *{
            /* font-family:Calibri; */
            margin:0px;
        }
        h2{
            color:grey;
        }
        html{
           
        }
        .login-form{
            width:400px;
            height:auto;
            padding:20px;
            box-shadow:1px 1px 10px 1px #ccc;
            margin:50px auto;
            overflow:hidden;
        }
        input{margin-bottom:7px;padding:7px;}
        input[type="text"],
        input[type="password"],
        input[type="email"],
        input[type="date"]{
            width:94%;

        }
        .login-btn{
            cursor:pointer;
        }
        .top-nav{
            overflow:hidden;
            box-shadow:1px 1px 10px 1px #ccc;
            padding:20px;
        }
        nav{
            float:right;}
        nav ul li{
            display:inline-block;
            
        }
     
        nav ul li a{
            background:#009688;padding:10px;color:white;
          
           color:#ffffff;
            text-decoration:none;
 
        }
        .add_employee{
         
        }
    </style>
</head>
<body>
        <div>
            <div>
                <header>
                    <div class="top-nav">
                    <div class="brand-name">
                    <h2>Employee list and permissions</h2>

                    </div>
                    <nav>
                        <ul>
                            <li> <a href="../../views/Employee/add.php" class="add_employee">+ Add Employee</a></li>
                            <li><a href="../../views/Access_level/access_level_permission.php">Manage Access Level</a></li>
                            <li><a href="../../views/Auth/logout.php" style="background:none;color:grey;"> | Log-Out </a></li>
                        </ul>
                    </nav>
                
                </div>
                </header>
            </div> 
            <div class="class login-form">
                <form action="../../controller/EmployeeController.php" method="post">
                    <h2>Add New Employee</h2><br>
                    <input type="text" name="fname" placeholder="First Name" required></br>
                    <input type="text" name="lname" placeholder="Last Name" required></br>
                    <input type="text" name="email" placeholder="Email" required></br>
                    <input type="text" name="age" placeholder="Age" required></br>
                    <input type="text" name="job_title" placeholder="Job Title" required></br>
      
                    <select name="access_level_id" style="padding:7px;width:395px;margin-bottom:5px;" required>
                        <option selected="true" disabled >--Select Access Level--</option>
                        <?php foreach ($read_all_access as $row) { ?>
                            <option value="<?php echo $row['access_level_id']; ?>"><?php echo $row['description']; ?></option>
                        <?php } ?>
                    </select>
                    <input type="password" name="password" placeholder="Password" required></br>
                    <input type="date" name="bday" placeholder="Birth Date" required></br></br>
                   <input type="submit" class="add-btn" style="cursor:pointer;padding:8px;width:100px;float:right;margin-right:5px;background:#4caf50;border:none;color:#ffffff;text-align:center;" name="add_btn" value="Submit">
                </form>
                <a href="../../views/Employee/employee_list.php" class="add_employee">View Employee List</a>
            </div>
        </div>
</body>
</html>