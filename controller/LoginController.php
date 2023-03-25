<?php
include_once "../model/Login.php";
$conn_login_employee = new Login();
if(isset($_POST['login_btn'])){
session_start();
$conn_login_employee = new Login();
$email= mysqli_real_escape_string($conn_login_employee->connection,$_POST['email']);
$password= $_POST['password'];

$select_user= $conn_login_employee->select_loginEmployee($email,$password);

if(mysqli_num_rows($select_user)>0){
 
$row=mysqli_fetch_array($select_user);

$_SESSION['id']=$row['access_level_id'];

header('location:../views/Employee/employee_list.php');
}
else{
    echo "failed to login user not found!";

}


}



?>