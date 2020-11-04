<?php
    include_once "ConnectDB.php";
    class UserModel extends ConnectDB{
        function __constructor(){
            parent::__constructor();
        }
        function show(){
            $query="SELECT * FROM users";
            $stmt=$this->conn->prepare($query);
            $stmt->exec();
            $data=$stmt->fetch_All(PDO::FETCH_ASSOC);
            return $data;
        }
    }