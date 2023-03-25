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

include '../../model/Employee.php';
$conn_select_employees = new Employee();
$read_all_employee= $conn_select_employees->select_all_employees();
foreach($read_all_employee as $row){
if ($_SESSION['id'] <='2' ) {
    $showDeleteBtn = true;
    $showUpdateBtn = true;
} 

else {
    $showDeleteBtn = false;
    $showUpdateBtn = false;
}

}


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
           background:#009688;
           padding:10px;
           color:#ffffff;
            text-decoration:none;
 
        }
        .access-tbl{
            max-width:60%;
            height:300px;
            margin:40px auto;
            BORDER:1PX SOLID #ccc;
            overflow:auto;
            text-align:center;
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
                    <?php  ?>
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
                <form action="../../controller/AccessLevelController.php" method="post">
                    <h2>Add Access Level Permission</h2><br>
                    <input type="text" name="description" placeholder="Description" required></br>
                   <input type="submit" class="add-btn" style="cursor:pointer;padding:8px;width:100px;float:right;margin-right:5px;background:#4caf50;border:none;color:#ffffff;text-align:center;" name="AddAccessLevel" value="Submit">
                </form>
            </div>
            <br>
            <br>
            <div class="access-tbl">
            <table style="">
                <tr>
                <thead>
                    <th>ID</th>
                    <th>Desciption</th>
                
                    <th>Actions</th>
               
                </thead>
                </tr>
                <tbody>
                <?php foreach ($read_all_access as $row) { 
                    
                    //  show button based on the logged in user's role

                    ?>
                    
                   
                    <tr>
                        <td><?php echo $row['access_level_id'];?></td>
                        <td><?php echo $row['description'];?></td>
                    
                      
                        <td class="actions"><?php if ($showDeleteBtn): ?>
                        <a href="../../controller/delete.php?id=<?php echo $row['access_level_id'];?>" class="delete-btn">Delete</a>
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