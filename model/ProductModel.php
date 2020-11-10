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
                }else{
                    $data=[];
                }
                return $data;
            }
        function showData($start=0,$limit=4){
            $query="SELECT * FROM {$this->table} INNER JOIN users ON products.user_id=users.user_id ORDER BY {$this->table}.product_id DESC LIMIT {$start},{$limit}";
            $stmt=$this->conn->prepare($query);
            $stmt->execute();
            if($stmt->rowCount()>0){
                $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
            }else{
                $data=[];
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
        function getRowbyId($id){
            $query="SELECT * FROM products INNER JOIN users ON products.user_id=users.user_id WHERE products.product_id=:id ";
            $stmt=$this->conn->prepare($query);
            $stmt->bindValue(":id",$id);
            $stmt->execute();
            $row=$stmt->fetch(PDO::FETCH_ASSOC);
            return $row;
        }
        function deleteRowId($id){
            $query="DELETE FROM products WHERE product_id=:id";
            $stmt=$this->conn->prepare($query);
            $stmt->bindValue(":id",$id);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                return true;
            }
            return false;
        }
        public function update($data, $id)
        {
            if (!empty($data)) {
                $fileds = '';
                $x = 1;
                $filedsCount = count($data);
                foreach ($data as $field => $value) {
                    $fileds .= "{$field}=:{$field}";
                    if ($x < $filedsCount) {
                        $fileds .= ", ";
                    }
                    $x++;
                }
            }
            $sql = "UPDATE {$this->table} SET {$fileds} WHERE product_id=:id";
            $stmt = $this->conn->prepare($sql);
            try {
                $this->conn->beginTransaction();
                $data['id'] = $id;
                $stmt->execute($data);
                $this->conn->commit();
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
                $this->conn->rollback();
            }
        }
        function searchProduct($product_name){
            $query="SELECT * FROM products INNER JOIN users ON products.user_id=users.user_id WHERE product_name LIKE '%${product_name}%'";
            $stmt=$this->conn->prepare($query);
            // $stmt->bindValue(":productname",$product_name);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
            }else{
                $data=[];
            }
            return $data;
        }
    }