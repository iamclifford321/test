<?php
/*
___________________________________________________________________________
___________________________________________________________________________

Connection Class
___________________________________________________________________________
___________________________________________________________________________

*/
class Connection{

    private $servername='remotemysql.com';
    private $username='03YcHjiMgr';
    private $password='BVmtZc6DRM';
    private $dbname='03YcHjiMgr';
    protected $mysqli;

    public function __construct(){

        $this->mysqli = new mysqli($this->servername,$this->username,$this->password,$this->dbname);

    }
    public function __destruct(){
        $this->mysqli->close();
    }

}
