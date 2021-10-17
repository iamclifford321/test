<?php
/*
___________________________________________________________________________
___________________________________________________________________________

Connection Class
___________________________________________________________________________
___________________________________________________________________________

*/
class Connection{

    private $servername='localhost';
    private $username='root';
    private $password='';
    private $dbname='test';
    protected $mysqli;

    public function __construct(){
        
        $this->mysqli = new mysqli($this->servername,$this->username,$this->password,$this->dbname);
    }
    public function __destruct(){
        $this->mysqli->close();
    }

}