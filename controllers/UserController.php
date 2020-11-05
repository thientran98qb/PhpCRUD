<?php
    include_once "./model/UserModel.php";
    class UserController extends UserModel{
        function __construct()
        {
            parent::__construct();
        }
        function showAllUser(){
            $userList=$this->show();
            include_once DOCUMENT_ROOT . "/views/users/index.php";
        }
        function addUser(){
            $arr=
                [
                    'user_name'=>'thientran98qb',
                    'user_img'=>'img/s',
                    'user_phone'=>'0123646'
                ];
            $this->add($arr);
        }
    }