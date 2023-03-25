
<?php
session_start();
if(isset($_SESSION['id']) && $_SESSION['id']== true){
 
}
else{
 header('location:../../views/Auth/login.php');
}

include '../../model/Employee.php';
$conn_select_employees = new Employee();
$user_id =$_GET['id'];
$select_employee_to_edit = $conn_select_employees->select_employee_edit($user_id);
$row=mysqli_fetch_array($select_employee_to_edit);


include '../../model/Accesslevel.php';
$conn_select_access_levels = new Access_level();
$read_all_access= $conn_select_access_levels->select_access_levels();
$number = mysqli_num_rows($read_all_access);

$user_id =$_GET['id'];
$select_access_description = new Access_level();
$read_access_d= $select_access_description->select_access_levels_name($user_id);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit page</title>
    <style>
         input{margin-bottom:7px;padding:7px;}
        input[type="text"],
        input[type="password"],
        input[type="email"],
        input[type="date"]{
            width:94%;

        }
    </style>
</head>
<body>
<div class="" style="width:400px;box-shadow:1px 1px 10px 1px #eee;overflow:hidden;padding:20px;margin:100px auto;">


        <form action="../../controller/EmployeeController.php?id=<?php echo $user_id;?>" method="post">
                    <h2>Edit Employee</h2><br>
                    <input type="text" name="fname" placeholder="First Name" value="<?php echo $row['firstname'];?>" required></br>
                    <input type="text" name="lname" placeholder="Last Name" value="<?php echo $row['lastname'];?>"required></br>
                    <input type="email" name="email" placeholder="Email" value="<?php echo $row['email'];?>"required></br>
                    <input type="text" name="number" placeholder="Age" value="<?php echo $row['age'];?>"required></br>
                    <input type="text" name="job_title" placeholder="Job Title"  value="<?php echo $row['job_title'];?>"required></br>
      
                   
                    <input type="password" name="password" placeholder="Password"  value="<?php echo $row['password'];?>"required></br>
                    <input type="date" name="bday" placeholder="Birth Date"  value="<?php echo $row['birth_date'];?>" required></br>
                    <select name="access_level_id" style="padding:7px;width:395px;margin-bottom:5px;" required>
                    <?php foreach ($read_access_d as $read_access_lvl) { ?>    
                    <option value="<?php echo $read_access_lvl['access_level_id'];?>"><?php echo $read_access_lvl['description']; ?></option>
                    <?php } ?>  
                    <?php foreach ($read_all_access as $row) { ?>
                            <option value="<?php echo $row['access_level_id']; ?>"><?php echo $row['description']; ?></option>
                        <?php } ?>
                    </select>
                    <br>
                    <br>
                   
                    <input type="submit" class="update-btn" style="cursor:pointer;padding:8px;width:100px;float:right;margin-right:5px;background:#4caf50;border:none;color:#ffffff;text-align:center;" name="update_btn" value="Update">
                
                
                </form>
                <a href="../../views/Employee/employee_list.php" class="add_employee">Cancel</a>

    </div>
</body>
</html>