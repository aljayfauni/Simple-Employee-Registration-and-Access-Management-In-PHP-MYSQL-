<?php
include_once '../model/Employee.php';

$conn_delete_emp = new Employee();
$employee_id = $_GET['id'];
$delete_emp =$conn_delete_emp->delete_employee($employee_id);

if($delete_emp){
    header('location:../views/Employee/employee_list.php');
}
else{

    echo "failed to Delete!";
}
include_once '../model/AccessLevel.php';
$conn_delete_access_level = new Access_level();
$access_id = $_GET['id'];
$delete_access_level =$conn_delete_access_level->delete_access_level($access_id);
if($delete_access_level){
    header('location:../views/Access_level/access_level_permission.php');
}

else{

    echo "failed to Delete!";
}
?>