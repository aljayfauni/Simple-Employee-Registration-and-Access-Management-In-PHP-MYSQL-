<?php
session_start();
if(isset($_SESSION['id']) && $_SESSION['id']== true){
 
}
else{
 header('location:../../views/Auth/login.php');
}

include '../../model/Employee.php';
$conn_select_employees = new Employee();
$read_all_employee= $conn_select_employees->select_all_employees();
$number = mysqli_num_rows($read_all_employee);

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

 
        }
       
        .employees-tbl{
            max-width:90%;
            height:400px;
            margin:100px auto;
            BORDER:1PX SOLID #ccc;
            overflow:auto;
        }
        table{
            border-collapse: collapse;
          width:100%;
            height:auto;
            margin:0px auto;
          
        }
     
        td,th{
          
            border:1px solid #ccc;
            padding:7px;
 
        }
        .delete-btn{
            background:red;
            color:#ffffff;
            padding:7px;
            cursor:pointer;
            margin:3px;
            float:left;
            border-radius:30px;
            text-decoration:none;
        }
        .update-btn{
            background:orange;
            color:#ffffff;
            padding:7px;
            cursor:pointer;
            border-radius:30px;
            margin:3px;
            float:left;
            text-decoration:none;
        }
    </style>
</head>
<body>
        <div>
            <div>
                <header>
                    <div class="top-nav">
                    <div class="brand-name">
                    
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
            <div class="employees-tbl" style="">

              <table>
                <tr>
                <thead>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Age</th>
                    <th>Birth Date</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Job Title</th>
                    <th>Access Level</th>
                    <th>Date Created</th>
                    <th>Date Modified</th>
                    <th>Actions</th>
               
                </thead>
                </tr>
                <tbody>
                <?php foreach ($read_all_employee as $row) { 
                    
                    //  show button based on the logged in user's role
                    // if ($_SESSION['id'] != '0' && $row['id'] !='1') {
                    //     $showDeleteBtn = true;
                    //     $showUpdateBtn = true;
                    // } 
                   if($_SESSION['id'] !='0' AND $row['access_level_id'] >='2') {
                        $showDeleteBtn = true;
                        $showUpdateBtn = true;
                    }
                    else {
                        $showDeleteBtn = false;
                        $showUpdateBtn = false;
                    }
                    
                    ?>
                    
                   
                    <tr>
                        <td><?php echo $row['id'];?></td>
                        <td><?php echo $row['firstname'];?></td>
                        <td><?php echo $row['lastname'];?></td>
                        <td><?php echo $row['age'];?></td>
                        <td><?php echo $row['birth_date'];?></td>
                        <td><?php echo $row['email'];?></td>
                        <td><?php echo $row['password'];?></td>
                        <td><?php echo $row['job_title'];?></td>
                        <td><?php echo $row['access_level_id'];?></td>
                        <td><?php echo $row['date_created'];?></td>
                        <td><?php echo $row['date_modified'];?></td>
                      
                        <td class="actions"><?php if ($showDeleteBtn): ?>
                        <a href="../../controller/delete.php?id=<?php echo $row['id'];?>" class="delete-btn">Delete</a>
                        <?php endif; ?>
                        <?php if ($showUpdateBtn): ?>
                         <a href="../../views/Employee/update.php?id=<?php echo $row['id'];?>" class="update-btn">Update</a>
                       <?php endif; ?>
                       </td>
                       
                    </tr>
                    <?php } ?>
                </tbody>
              </table>
              
            </div>
        </div>
</body>
</html>