<?php

class db{
private $DB_host='localhost';
private $DB_user='root';
private $DB_pass='';
private $DB_name='todoo';

protected function connect(){
try
{
    $DB_con = new PDO("mysql:host={$this->DB_host};dbname={$this->DB_name}",$this->DB_user,$this->DB_pass);
    $DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $DB_con;
}
catch(PDOException $e)
{
    echo $e->getMessage(); 
}

}



}



?>