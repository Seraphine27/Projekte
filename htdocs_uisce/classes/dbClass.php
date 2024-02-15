<?php

class Database
{
    private $dbhost = 'localhost';
    private $dbuser = 'root';
    private $dbpw = '';
    private $dbname = 'uisce';

    public function connect()
    {
        try 
        {
            $dsn = "mysql:host=$this->dbhost;dbname=$this->dbname";
            $pdo = new PDO($dsn, $this->dbuser, $this->dbpw);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            return $pdo;
        }

        catch (PDOException $error)
        {
            die("Error!". $error->getMessage());
        }
    }
}

?>