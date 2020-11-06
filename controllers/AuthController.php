<?php
    include_once "./model/UserModel.php";
    class AuthController extends UserModel{
        function __construct()
        {
            parent::__construct();
        }
        function showLogin(){
            unset($_SESSION['register']);
            // include_once DOCUMENT_ROOT."/views/users/login.php";
            $this->view('login');
        }
        function loginPage(){
            global $error;
            if(isset($_POST['submitLogin'])){   
                if(empty($_POST['username']) && empty($_POST['password'])){
                    $error['username']='Username is invalid'; 
                    $error['password']='Password is invalid';
                }
                if(empty($_POST['username'])){
                    $error['username']='Username is invalid'; 
                }else{
                    if(!preg_match('/^[A-Za-z]{1}[A-Za-z0-9]{5,31}$/', $_POST['username'])){
                        $error['username']='Username start UpperCase and [6-31] characters'; 
                    }else{
                        $username=$_POST['username'];
                    }
                }
                if(empty($_POST['password'])){
                    $error['password']='Password is invalid'; 
                }else{
                    if(!preg_match('/^[A-Za-z]{1}[A-Za-z0-9]{6,31}$/', $_POST['password'])){
                        $error['password']='Password at least 6 characters and at least 1 letter'; 
                    }else{
                        $password=md5($_POST['password']);
                    }
                }
                if(!empty($error)){
                    $this->view('login',[
                        'error'=>$error
                    ]);
                }else{
                    $login=$this->loginProcess($username,$password);
                    if($login>0){
                        $userLogin=$this->getUserLogin($login);
                        if(isset($_POST['remember'])){
                            setcookie("login",$userLogin['user_fullname'],time()+60,'/');
                        }
                        $_SESSION['fullname']=$userLogin['user_fullname'];
                        $_SESSION['isLogin']=true;
                        if(isset($_SESSION['loginError'])){
                            unset($_SESSION['loginError']);
                        }
                    }else{
                        $_SESSION['loginError']='Tên đăng nhâp hoặc mật khẩu không đúng';
                        $this->showLogin();
                        exit();
                    }
                }
            }

        }
        function logoutPage(){
            unset($_SESSION['isLogin']);
            unset($_SESSION['fullname']);
            $this->showLogin();
            exit();
        }
        function registerUser(){
            include_once DOCUMENT_ROOT."/views/users/register.php";
            exit();
        }
        function registerProcess(){
            if(isset($_POST['submitRegister'])){
                $username=$_POST['username'];
                $password=$_POST['password'];
                $fullname=$_POST['fullname'];
                $data=[
                    'user_name'=>$username,
                    'user_fullname'=>$fullname,
                    'user_pass'=>md5($password)
                ];
                $regis=$this->add($data);
                if($regis){
                    $_SESSION['register']='Đăng ký thành công';
                }else{
                    $_SESSION['register']='Đăng ký thất bại';
                }
                $this->registerUser();
            }
        }
    }