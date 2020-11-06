<?php
    class ProductModel extends ConnectDB{
        protected $product='products';
        function __construct()
        {
            parent::__construct();
        }
        function show(){
            $query="SELECT * FROM {$this->product} INNER JOIN users ON products.user_id=users.user_id";
            $stmt=$this->conn->prepare($query);
            $stmt->execute();
            if($stmt->rowCount()>0){
                $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            return $data;
        }
    }