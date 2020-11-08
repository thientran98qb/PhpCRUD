<?php
    class ProductModel extends ConnectDB{
        private $table='products';
        function __construct()
        {
            parent::__construct();
        }
        //show Product detail
        function show(){
            $query="SELECT * FROM {$this->table} INNER JOIN users ON products.user_id=users.user_id ORDER BY {$this->table}.product_id DESC";
                $stmt=$this->conn->prepare($query);
                $stmt->execute();
                if($stmt->rowCount()>0){
                    $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
                }
                return $data;
            }
        function showData($start=0,$limit=4){
        $query="SELECT * FROM {$this->table} INNER JOIN users ON products.user_id=users.user_id ORDER BY {$this->table}.product_id DESC LIMIT {$start},{$limit}";
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
        function totalProduct(){
            $query="SELECT * FROM {$this->table}";
            $stmt=$this->conn->prepare($query);
            $stmt->execute();
            $count=$stmt->rowCount();
            return $count;
        }
    }