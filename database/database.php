<?php 
class Database{
private $dbhost;
private $dbusername;
private $dbpass;
private $dbname;

protected function db_connection(){

$this->dbhost="localhost";
$this->dbusername="root";
$this->dbpass="";
$this->dbname="aljayramile";

$this->connection =new mysqli($this->dbhost,$this->dbusername,$this->dbpass,$this->dbname);
return $this->connection;

}

}

?>