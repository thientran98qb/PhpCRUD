<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/fontawesome/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    
    <title>Document</title>
</head>
<body>
    <header>
        <div class="nav">
            <div class="nav_content">
                <h1>CRUD PHP</h1>
                <span class="logout">
                <p class="nameLogin">
                    <?php if(isset($_SESSION['fullname']) && isset($_COOKIE['login'])) {?>
                        Hello <?php echo $_SESSION['fullname']; ?>
                    <?php }else{?>
                        <p class="nameLogin">
                            <?php if(isset($_SESSION['fullname'])) {?>
                                Hello <?php echo $_SESSION['fullname']; ?>
                            <?php }?>
                        </p>
                        <p class="nameLogin">
                            <?php if(isset($_COOKIE['login'])) {?>
                                Hello <?php echo $_COOKIE['login']; ?>
                            <?php }?>
                        </p>    
                    <?php }?> 
                </p>                  
                    <a href=".?action=logout" class="btn btn-success btn-logout"><i class="fas fa-sign-out-alt">Logout</i></a>
                </span>
            </div>
        </div>
    </header>
