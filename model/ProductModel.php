<?php
    class ProductModel extends ConnectDB{
        private $table='products';
        function __construct()
        {
            parent::__construct();
        }
        //show Product detail
        function show(){
            $query="SELECT * FROM {$this->table} INNER JOIN users ON products.user_id=users.user_id";
            $stmt=$this->conn->prepare($query);
            $stmt->execute();
            if($stmt->rowCount()>0){
                $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            return $data;
        }
        function addProduct($data){
            return $this->add($data,$this->table);
        }
    }