<?php
class ConnectDB{
    const DNS='mysql:host=localhost;dbname=crud';
    const USERNAME='root';
    const PASSWORD='';
    public $conn;
    function __construct(){
        try {
            $this->conn=new PDO(self::DNS,self::USERNAME,self::PASSWORD,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}