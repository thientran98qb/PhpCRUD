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
            if(!preg_match('/^[a-z0-9A-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂẾưăạảấầẩẫậắằẳẵặẹẻẽềềểếỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s\W|_ ]{6,}$/', $_POST['productname'])){
                $error["error_name"]="Product name is invalid";
            }else{
                $productname=$_POST['productname'];
            }
            if(!preg_match('/^[a-z0-9A-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂẾưăạảấầẩẫậắằẳẵặẹẻẽềềểếỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s\W|_ ]{6,}$/', $_POST['productdescription'])){
                $error["error_desc"]="productdescription is invalid";
            }else{
                $productdescription=$_POST['productdescription'];
            }
            if(!empty($_POST['productdate'])){
                $product_date=$_POST['productdate'];
            }
            if(isset($_FILES['productimg'])){
                $fileName=$_FILES['productimg']['name'];
                $fileTmp=$_FILES['productimg']['tmp_name'];
                if($_FILES['productimg']['error'] == 0){
                    if($_FILES['productimg']['size']<2100000){
                        $tail_stand_img=array('png','jpg','jpeg','gif');
                        $extension_img=explode('.',$fileName);
                        $tail_img=strtolower(end($extension_img)) ;
                        $newFileName=md5(time().$fileName). '.'. $tail_img;
                        if(in_array($tail_img,$tail_stand_img)){
                            $dirFile=getcwd() . '/uploads/';
                            $destFilePath=$dirFile . $newFileName;
                            if(empty($error)){
                                if(move_uploaded_file($fileTmp,$destFilePath)){
                                    $product_img=$newFileName;
                                }
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
                $error["error"]=true;
                echo json_encode($error);
            }else{
                $product=[
                    "product_name"=>$productname,
                    "product_img"=>$product_img,
                    "product_description"=>$productdescription,
                    "product_date_created"=>$product_date,
                    "user_id"=>$_SESSION['user_id']
                ];
                $this->addProduct($product);
                echo json_encode(["error"=>false,"status"=>"Add new product succesfully"]);
            }
        }
        function getProductAjax(){
            $countProduct=$this->totalProduct();
            if(isset($_GET['currentPage'])){
                $current_page=$_GET['currentPage'];
            }else{
                $current_page=1;
            }
            $per_page=4;
            $start=($current_page-1) * $per_page;
            $limit=$per_page;    
            $product=$this->showData($start,$limit);
            echo json_encode(["product"=>$product,"count"=>$countProduct]);
        }
        function showFormEdit(){
            $product_id=(isset($_GET['product_id']) ? $_GET['product_id'] : '');
            $row=$this->getRowbyId($product_id);
            echo json_encode(["row"=>$row]);
        }
        function deleteProduct(){
            $product_id=(isset($_GET['product_id']) ? $_GET['product_id'] : '');
            $row=$this->getRowbyId($product_id);
            $delete=$this->deleteRowId($product_id);
            if($delete === true){
                if(unlink( getcwd() . "/uploads/" . $row['product_img'])){
                    echo json_encode(["delete"=>true]);
                } 
            }else{
                echo json_encode(["delete"=>false]);
            }
        }
    }