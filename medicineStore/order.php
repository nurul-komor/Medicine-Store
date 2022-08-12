<?php require("count.php")?>
<?php if(!$_SESSION['allProducts']){
    header("location:/medicineStore/cart.php");
    exit();
}?>
<?php require('dashboard/db/user.php')?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

    <link rel="stylesheet" href="assets/fonts/icomoon/style.css">
    <!-- owl carousel  -->
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <!-- hover css  -->
    <link rel="stylesheet" type="" href="assets/css/hover.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- font awesome  -->
    <link rel="stylesheet" href="dashboard/icons/fontawesome/css/all.min.css">
    <!-- Style -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/custom.style.css">

    <title>Online Medicine Shop</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css' rel='stylesheet'>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <link rel="stylesheet" type="" href="product-css.css">
</head>

<body className='snippet-body'>
    <!-- /.container -->
    <?php 
        $action = $_REQUEST['action'];
        if($action=="order"){
            $orderArray = [
                'username' => $_POST['username'],
                'email' => $_POST['email'],
                'phone' => $_POST['phone'],
                'address' => $_POST['address'],
                'products' => $orderList,
                'total' => $total
            ];?>
    <div class="container">
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Well done!</h4>
            <h6>Your Order id:#<b><?php $result = $user->insertData('orders',$orderArray);?></b></h6>
            <p>Lorem Ipsum/p>
                <hr>
            <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
        </div>
    </div>
    <?php
            // 
               

        }
    ?>
    <script scr="./assets/js/front-product-ajax.js"></script>
    <script type='text/javascript'
        src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js'></script>
    <script type='text/javascript' src='#'></script>
    <script type='text/javascript' src='#'></script>
    <!-- ========== Start footer ========== -->
    <!-- ========== End footer ========== -->
    <script src=" assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.sticky.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="dashboard/icons/fontawesome/js/all.min.js"></script>

</body>

<?php unset($_SESSION['allProducts']);
    // header("location:/medicineStore/");
?>

</html>