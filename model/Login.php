<?php

include '../database/database.php';

class Login extends Database{

    public function __construct(){
        $this->db_connection();
    }
    public function select_loginEmployee($email,$password){

        $query ="SELECT * from employees WHERE email='$email' && password='$password' ";
        $result=mysqli_query($this->connection,$query);
        return $result;
    }
  
}
?>