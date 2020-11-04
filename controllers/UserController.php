<?php
    include_once "./model/UserModel.php";
    class UserController extends UserModel{
        function __constructor()
        {
            parent::__constructor();
        }
        function showAllUser(){
            $userList=$this->show();
            
        }
    }