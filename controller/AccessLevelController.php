<?php
include '../model/Accesslevel.php';

$access_level = new Access_level();

if(isset($_POST['AddAccessLevel'])){
  
$description=mysqli_real_escape_string($access_level->connection,$_POST['description']);


    $add_access_level=$access_level->create_new_access_level($description);
    if($add_access_level){
  
    
        echo "<script>alert('Added Successfully!');
        window.location.href ='../views/Access_level/access_level_permission.php'</script>";
       
        
    }
    else{
        echo "<script>alert('Error Failed!');
        window.location.href ='../views/Access_level/access_level_permission.php'</script>";
       
    }
}

?>