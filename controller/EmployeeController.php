<?php
include_once '../model/Employee.php';

$employee_model = new Employee();

if(isset($_POST['add_btn'])){
  
$fname=mysqli_real_escape_string($employee_model->connection,$_POST['fname']);
$lname=mysqli_real_escape_string($employee_model->connection,$_POST['lname']);
$age=mysqli_real_escape_string($employee_model->connection,$_POST['age']);
$birth_date=mysqli_real_escape_string($employee_model->connection,$_POST['bday']);
$email=mysqli_real_escape_string($employee_model->connection,$_POST['email']);
$password=mysqli_real_escape_string($employee_model->connection,$_POST['password']);
$job_title=mysqli_real_escape_string($employee_model->connection,$_POST['job_title']);
$access_level_id=mysqli_real_escape_string($employee_model->connection,$_POST['access_level_id']);

    $add_employee=$employee_model->create_new_employee($fname,$lname,$age,$birth_date,$email,$password,$job_title,$access_level_id);
    if($add_employee){
        echo "<script>alert('Added Successfully!');
        window.location.href ='../views/Employee/add.php'</script>";
    }
    else{
        echo "<script>alert('Failed Something went Wrong!');
        window.location.href ='../views/Employee/add.php';</script>";
    }
}
$employee_update = new Employee();
if(isset($_POST['update_btn'])){ 
    $user_id=$_GET['id'];   
    $fname=mysqli_real_escape_string($employee_update->connection,$_POST['fname']);
    $lname=mysqli_real_escape_string($employee_update->connection,$_POST['lname']);
    $age=mysqli_real_escape_string($employee_update->connection,$_POST['age']);
    $birth_date=mysqli_real_escape_string($employee_update->connection,$_POST['bday']);
    $email=mysqli_real_escape_string($employee_update->connection,$_POST['email']);
    $password=mysqli_real_escape_string($employee_update->connection,$_POST['password']);
    $job_title=mysqli_real_escape_string($employee_update->connection,$_POST['job_title']);
    $access_level_id=mysqli_real_escape_string($employee_update->connection,$_POST['access_level_id']);
    $update_user=$employee_update->update_employee($user_id,$fname,$lname,$age,$birth_date,$email,$password,$job_title,$access_level_id);
if($update_user){
    echo "<script>alert('Update Successfully!');
    window.location.href ='../views/Employee/employee_list.php'</script>";
}
else{
    echo "<script>alert('Failed Something went Wrong!');
    window.location.href ='../views/Employee/employee_list.php';</script>";
}
}


?>