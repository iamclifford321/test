<?php
/*
___________________________________________________________________________
___________________________________________________________________________

Connection Class
___________________________________________________________________________
___________________________________________________________________________

*/
class Connection{

    private $servername='databases.000webhost.com';
    private $username='id17046173_nmsc_user';
    private $password='fORDcLI1998!';
    private $dbname='id17046173_test';
    protected $mysqli;

    public function __construct(){

        $this->mysqli = new mysqli($this->servername,$this->username,$this->password,$this->dbname);
    }
    public function __destruct(){
        $this->mysqli->close();
    }

}
