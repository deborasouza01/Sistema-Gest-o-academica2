<?php

class Database {
    private $driver;
    private $host;
    private $dbname;
    private $username;

    private $con;

    function __construct() {
        $this->driver = "mysql"; //tipo de banco de dados que vai usar
        $this->host = "localhost";
        $this-> dbname = "gestaoacademica"; /**/ 
        $this -> username = "root"; //nome do usuario no banco
    }

    function getConexao() {
        try {
            $this->con = new PDO(
               "$this->driver: host=$this->host; dbname=$this->dbname",
               $this->username

            );

            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

            return $this->con;
               
        } catch(Exception $e) {
            echo $e->getMessage();

        }
    }


}