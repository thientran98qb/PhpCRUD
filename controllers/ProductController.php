<?php
    include_once "./model/ProductModel.php";
    class ProductController extends ProductModel{
        function __construct()
        {
            parent::__construct();
        }
        function showHome(){
            $product=$this->show();
            include_once DOCUMENT_ROOT."/views/products/index.php";
            exit();
        }
        function addProductAjax(){
            $error=array();
            if($_POST['productname']==""){
                $error["error_name"]="Product name is invalid";
            }else{
                $productname=$_POST['productname'];
            }
            if(isset($_FILES['productimg'])){
                $fileName=$_FILES['productimg']['name'];
                $fileTmp=$_FILES['productimg']['tmp_name'];
                if($_FILES['productimg']['error'] == 0){
                    if($_FILES['productimg']['size']<2100000){
                        $tail_stand_img=array('png','jpg','jpge','gif');
                        $extension_img=explode('.',$fileName);
                        $tail_img=strtolower(end($extension_img)) ;
                        $newFileName=md5(time().$fileName). '.'. $tail_img;
                        if(in_array($tail_img,$tail_stand_img)){
                            $dirFile=getcwd() . '/uploads/';
                            $destFilePath=$dirFile . $newFileName;
                            if(move_uploaded_file($fileTmp,$destFilePath)){
                                echo json_encode(["ok"=>"ok"]);
                            }else{
                                $error["error_file"]="not";
                            }
                        }else{
                            $error["error_file"]="File extension not match";
                        }
                    }else{
                        $error["error_file"]="File size must be less 2MB";
                    }
                }else{
                    $error["error_file"]="File error";
                }
            }else{
                $error["error_file"]="File not found";
            }
            if(!empty($error)){
                echo json_encode($error);
            }else{
                echo json_encode(["ok"=>"ok"]);
            }
        }
    }