<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/authen.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="area__login">
            <div class="form__login">
                <?php if(isset($_SESSION['register'])){ ?>
                    <p class="error"><?php echo $_SESSION['register']; ?></p>
                <?php } ?>
                <h3>Register Website</h3>
                <form action=".?action=registerProcess" method="post" id="form_register">
                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" name="username" value="<?php if(isset($data['username'])) { echo $data['username']; }?>"  id="username" class="form-control">
                        <p id="error">
                            <?php if(isset($data['error']['username'])) {?>
                                <?php echo $data['error']['username'];?>
                            <?php }?>
                        </p>
                    </div>
                    <div class="form-group">
                        <label for="">Fullname</label>
                        <input type="text" name="fullname" id="fullname" value="<?php if(isset($data['fullname'])) { echo $data['fullname']; }?>" class="form-control">
                        <p id="error">
                            <?php if(isset($data['error']['fullname'])) {?>
                                <?php echo $data['error']['fullname'];?>
                            <?php }?>
                        </p>
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" value="<?php if(isset($data['password'])) { echo $data['password']; }?>" class="form-control" id="password">
                        <p id="error">
                            <?php if(isset($data['error']['password'])) {?>
                                <?php echo $data['error']['password'];?>
                            <?php }?>
                        </p>
                    </div>
                    <div class="form-group">
                        <label for="">Re-Password</label>
                        <input type="password" name="repassword" value="<?php if(isset($data['repassword'])) { echo $data['repassword']; }?>"  class="form-control" id="repassword">
                        <p id="error">
                            <?php if(isset($data['error']['repassword'])) {?>
                                <?php echo $data['error']['repassword'];?>
                            <?php }?>
                        </p>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Register" name="submitRegister" id="submitLogin" class="btn btn-primary">
                        <a href="." class="btn btn-success">Login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>