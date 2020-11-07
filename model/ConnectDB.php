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
    function add($data,$table=''){
        // insert into users(`user_name`,`user_img`) values ('thien','')
        if(!empty($data)){
            foreach ($data as $key => $value) {
                    $flieds[]=$key;
                    $placehouder[]=":{$key}";
            }
        }
        $sql="INSERT INTO {$table} (".implode(',',$flieds).") VALUES (".implode(',',$placehouder).")";
        $stmt=$this->conn->prepare($sql);
        try {
            $this->conn->beginTransaction();
            $stmt->execute($data);
            $lastInsertedID=$this->conn->lastInsertId();
            $this->conn->commit();
            return $lastInsertedID;
        } catch (PDOException $e) {
            echo "Message error ".$e;
            $this->conn->rollBack();
        }
    }   
}