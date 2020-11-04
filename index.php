<?php
    include_once "./config/config.php";
    include_once "./controllers/UserController.php";
    $user=new UserController();
    $action=isset($_POST['action']) ? $_POST['action'] :'';
    switch ($action) {
        case 'value':
            # code...
            break;
        
        default:
            $user->showAllUser();
            break;
    }