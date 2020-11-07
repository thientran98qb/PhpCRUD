<?php
    include_once "ConnectDB.php";
    class UserModel extends ConnectDB{
        private $table='users';
        function __construct(){
            parent::__construct();
        }
        public function view($view,$data=[]){
            require_once DOCUMENT_ROOT."/views/users/".$view.".php";			
        }

        function addUser($data){
            return $this->add($data,$this->table);
        }
        function show(){
            $query="SELECT * FROM $this->table";
            $stmt=$this->conn->prepare($query);
            $stmt->execute();
            $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            return $data;
        }
        
        function loginProcess($username,$password){
            $query="SELECT users.user_id FROM users WHERE user_name=:username AND user_pass=:passwordd";
            $stmt=$this->conn->prepare($query);
            $stmt->bindValue(':username',$username);
            $stmt->bindValue(':passwordd',$password);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                $data=$stmt->fetch(PDO::FETCH_ASSOC);
                return (int)$data['user_id'];
            }else{
                return -1;
            }
            $stmt->closeCursor();      
        }
        function getUserLogin($id){
            $query="SELECT users.user_fullname FROM users WHERE user_id=:user_id";
            $stmt=$this->conn->prepare($query);
            $stmt->bindValue(':user_id',$id);
            $stmt->execute();
            $data=$stmt->fetch(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            return $data;
        }
    }