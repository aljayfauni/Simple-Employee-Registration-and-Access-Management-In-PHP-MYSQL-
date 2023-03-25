<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '../aljay_ramile/database/database.php';

class Access_level extends Database{

    public function __construct(){
        $this->db_connection();
    }
    public function select_access_levels(){

    $query="Select * from access_levels";
    $result=mysqli_query($this->connection,$query);
        return $result;
    }

    public function select_access_levels_name($user_id) {
        $query = "SELECT access_levels.access_level_id, access_levels.description 
                  FROM access_levels 
                  LEFT JOIN employees 
                  ON access_levels.access_level_id = employees.access_level_id 
                  WHERE employees.id = '$user_id'";
        $result = mysqli_query($this->connection, $query);
        return $result;
    }
    
    public function create_new_access_level($description){
       $getmax_id =  "SELECT MAX(id) FROM access_levels";
        $query="INSERT INTO access_levels (access_level_id,description) values ('$getmax_id','$description')";
        $result=mysqli_query($this->connection,$query);
        return $result;
        

    }
    public function delete_access_level($access_id){
        $query="delete from access_levels where access_level_id ='$access_id'";
        $result=mysqli_query($this->connection,$query);
        return $result;
    }
  
}
?>