<?php
session_start();
session_destroy();
header('location:../../views/Auth/login.php');
?>