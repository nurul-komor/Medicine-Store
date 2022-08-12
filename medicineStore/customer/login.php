<?php 
    require('../dashboard/db/user.php');
    session_start();
     if(isset($_SESSION['customerId'])){
        header("location:/medicineStore/");
     }
    if(isset($_POST['btn'])){
        $user = new User();
        $email = $_POST['email'];
        $pass = md5($_POST['password']);
        $result = $user->customerLogin($email,$pass);
        if(!(empty($result))){
        if($result['status']=="1"){
            $_SESSION['customerId'] = $result['customerId'];
            if($_SESSION['customerId']){
                if(isset($_SESSION['allProducts'])){
                    header("location:/medicineStore/cart.php");
                }
                else{
                    header("location:/medicineStore/");
                }
            }
        }
        if($result['status']=="0"){
            echo '<div class="alert alert-warning m-0" role="alert">
                        You are banned
                    </div>';
        }
         }
         if((empty($result))){
             ?>
<div class="alert alert-danger d-flex align-items-center m-0" role="alert">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
        class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
        <path
            d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
    </svg>
    <div>
        &nbsp;&nbsp;&nbsp;Informations not matched
    </div>
</div>
<?php }?>
<?php }?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Site</title>
    <link rel="stylesheet" type="" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="" href="../dashboard/icons/fontawesome/css/all.min.css">
</head>

<body>
    <div class="container">
        <div class="row  justify-content-center align-items-center" style="min-height: 100vh;">
            <div class="col-md-4">
                <div class="card">
                    <article class="card-body">
                        <h4 class="card-title text-center mb-4 mt-1">Sign in</h4>
                        <hr>
                        <p class="text-success text-center">Welcome Back</p>
                        <form method="post">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                    </div>
                                    <input class="form-control" name="email" placeholder="Email here.." type="email"
                                        value="<?php if(isset($_POST['btn'])){ echo $_POST['email'];}?>">
                                </div> <!-- input-group.// -->
                            </div> <!-- form-group// -->
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                    </div>
                                    <input class="form-control" placeholder="******" type="password" name="password"
                                        value="<?php if(isset($_POST['btn'])){ echo $_POST['password'];}?>">
                                </div> <!-- input-group.// -->
                            </div> <!-- form-group// -->
                            <div class="form-group">
                                <button name="btn" type="submit" class="btn btn-primary btn-block"> Login </button>
                            </div> <!-- form-group// -->
                            <p class="text-center d-flex justify-content-between align-items-center"><a href="#"
                                    class="btn">Forgot
                                    password?</a>
                                <a href="registration"><i class=" fa-underline"></i> Create Account</a>
                            </p>
                        </form>
                    </article>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../dashboard/icons/fontawesome/js/all.min.js"></script>

</html>