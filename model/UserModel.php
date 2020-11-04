<?php
    include_once "ConnectDB.php";
    class UserModel extends ConnectDB{
        function __construct(){
            parent::__construct();
        }
        function show(){
            $query="SELECT * FROM users";
            $stmt=$this->conn->prepare($query);
            $stmt->execute();
            $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            return $data;
        }
    }