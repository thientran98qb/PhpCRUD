<?php
    include_once "./model/UserModel.php";
    class AuthController extends UserModel{
        function __construct()
        {
            parent::__construct();
        }
        function showLogin(){
            unset($_SESSION['register']);
            include_once DOCUMENT_ROOT."/views/users/login.php";
        }
        function loginPage(){
            if(isset($_POST['submitLogin'])){           
                $username=$_POST['username'];
                $password=md5($_POST['password']);
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
                        $_SESSION['loginError']='Đăng nhập không thành công';
                        $this->showLogin();
                        exit();
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
                    $_SESSION['register']='Đăng ky thành công';
                }else{
                    $_SESSION['register']='Đăng ky that bai';
                }
                $this->registerUser();
            }
        }
    }