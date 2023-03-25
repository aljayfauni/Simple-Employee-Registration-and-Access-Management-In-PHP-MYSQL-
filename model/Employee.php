<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '../aljay_ramile/database/database.php';

class Employee extends Database{

    public function __construct(){
        $this->db_connection();
    }
    public function create_new_employee($fname,$lname,$age,$birth_date,$email,$password,$job_title,$access_level_id){

        $query="INSERT INTO employees(firstname,lastname,age,birth_date,email,password,job_title,access_level_id) values ('$fname','$lname','$age','$birth_date','$email','$password','$job_title','$access_level_id')";
        $result=mysqli_query($this->connection,$query);
        return $result;
        

    }

    public function update_employee($user_id,$fname,$lname,$age,$birth_date,$email,$password,$job_title,$access_level_id){

        $query="Update employees set firstname='$fname', lastname='$lname',age='$age',birth_date='$birth_date', email='$email', password='$password',job_title='$job_title',access_level_id='$access_level_id' WHERE id ='$user_id'";
        $result=mysqli_query($this->connection,$query);
        return $result;
        

    }

    public function delete_employee($employee_id){
        $query="delete from employees where id ='$employee_id' and  id !='1' ";
        $result=mysqli_query($this->connection,$query);
        return $result;
    }

    public function select_all_employees(){

        $query="Select * from employees";
        $result=mysqli_query($this->connection,$query);
            return $result;
        }

        public function select_employee_edit($user_id){

            $query="Select * from employees where id ='$user_id'";
            $result=mysqli_query($this->connection,$query);
                return $result;
            }
      
}
?>