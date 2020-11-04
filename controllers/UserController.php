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
    }