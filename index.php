<?php
    session_start();
    include_once "./config/config.php";
    include_once "./controllers/AuthController.php";
    include_once "./controllers/ProductController.php";
    $auth=new AuthController();
    $product=new ProductController();
    
    $action =filter_input(INPUT_GET,'action');
    $actionAjax=isset($_REQUEST['actionn']) ? $_REQUEST['actionn'] : '';
    if(!empty($actionAjax) && $actionAjax=="addProductAjax"){
        return $product->addProductAjax();  
    }
    if(!empty($actionAjax) && $actionAjax=="getProduct"){
        return $product->getProductAjax();  
    }
    if(!empty($actionAjax) && $actionAjax=="editproduct"){
        return $product->showFormEdit();  
    }
    if(!empty($actionAjax) && $actionAjax=="deleteproduct"){
        return $product->deleteProduct();  
    }
    if(!empty($actionAjax) && $actionAjax=="profile"){
        return $product->getDetailProduct();  
    }
    if(!empty($actionAjax) && $actionAjax=="search"){
        return $product->processSearch();  
    }
    if(empty($action)){
        $action=filter_input(INPUT_POST,'action');
    }
    switch ($action) {
        case 'processlogin':
            $auth->loginPage();
            if(isset($_SESSION['isLogin'])){
                header("Location:http://localhost:8080/PhpCRUD");
                // $product->showHome();
            }else{
                unset($_SESSION['loginError']);
            }
            break;
        case 'register':
            $auth->registerUser();
            break;
        case 'registerProcess':
            $auth->registerProcess();
            break;
        case 'logout':
            $auth->logoutPage();  
            break;
        default:     
            if(isset($_SESSION['isLogin']) || isset($_COOKIE['login']) ){
                $product->showHome();
            }else{
                unset($_SESSION['loginError']);
                $auth->showLogin();           
            }
            break;
    }