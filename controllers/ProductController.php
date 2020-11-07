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
            /* process file :
                file has : +name,type,tmp_name:location of image root,error,size
            */
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
                                echo json_encode(["not"=>"not"]);
                            }
                        }else{
                            echo json_encode(["error"=>"File extension not match"]);
                        }
                    }else{
                        echo json_encode(["error"=>"File size must be less 2MB"]);
                    }
                }else{
                    echo json_encode(["error"=>"File error"]);
                }
            }else{
                echo json_encode(["error"=>"File not found"]);
            }
        }
    }