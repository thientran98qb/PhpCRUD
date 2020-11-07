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
            $d=$_POST['dataForm'];
            var_dump($d);
        }
    }