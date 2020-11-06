<?php
    session_start();
    include_once "./config/config.php";
    include_once "./controllers/UserController.php";
    include_once "./controllers/AuthController.php";
    include_once "./controllers/ProductController.php";
    $user=new UserController();
    $auth=new AuthController();
    $product=new ProductController();
    
    $action =filter_input(INPUT_GET,'action');

    if(empty($action)){
        $action=filter_input(INPUT_POST,'action');
    }
    switch ($action) {
        case 'processlogin':
            $auth->loginPage();
            if(isset($_SESSION['isLogin'])){
                $product->showHome();
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