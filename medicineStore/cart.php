<?php 
session_start();
if(isset($_POST['clearSession'])){ 
    unset($_SESSION['allProducts']);
    header("location:cart.php");
    }?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet"> -->

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
    <style>
    .sticky-wrapper .site-navbar {
        background-color: #182C61;
    }

    .site-menu-toggle {
        color: #fff;
        z-index: 200;
        float: right;
    }

    footer {
        background: #f8f9fa !important;
    }
    </style>
</head>

<body className='snippet-body'>
    <?php include('preloader.php')?>
    <script>
    function getCartNum() {
        $.ajax({
            url: '/medicineStore/front-ajax.php',
            method: "post",
            dataType: "json",
            data: {
                action: "getCartNum"
            },
            success: function(data) {
                // console.log(data);
                // alert('ok');
                $('#cartNum').html(data)
            },
            error: function(request, error) {
                console.log(request);
            }
        });
    }
    getCartNum();
    </script>
    <?php require('navbar.php')?>

    <div class="container" style="min-height: 80vh">

        <div class="row">
            <div class="col-sm-12 col-md-10 col-md-offset-1">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Total</th>
                        </tr>
                    </thead>
                    <tbody id="cart-items">
                        <?php if(isset($_SESSION['allProducts'])){?>
                        <?php $total = 50;?>
                        <?php  foreach ($_SESSION['allProducts'] as $key => $value) {?>
                        <tr>
                            <td><?=$value['productName']?></td>
                            <td><?=$value['qty']?></td>
                            <td class="text-center"><?=$value['productPrice']?></td>
                            <td class="text-center"><?= ($value['productPrice']*$value['qty'])?></td>
                            <?php $total+=($value['productPrice']*$value['qty'])?>
                        </tr>
                        <?php } ?>
                        <?php }else{ echo "<td colspan='4' class='text-center'>Cart is empty</td>";}?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td>
                                <form method="post">
                                    <button type="submit" name="clearSession" class="btn btn-danger">Clear
                                        Cart</button>
                                </form>
                            </td>
                            <td class="text-end" colspan="2">Total+Delivery Charge(50tk):</td>
                            <td class="text-center" id="total-value"><strong>৳
                                    <?php if(isset($_SESSION['allProducts'])){ echo $total;}else{ echo 0; }?></strong>
                            </td>
                        </tr>
                    </tfoot>
                </table>
                <div class="float-end">
                    <a href="checkout.php"><button class="btn btn-success" type="button">Checkout</button></a>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container -->
    <script scr="./assets/js/front-product-ajax.js"></script>
    <script type='text/javascript'
        src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js'></script>
    <script type='text/javascript' src='#'></script>
    <script type='text/javascript' src='#'></script>
    <script type='text/javascript' src='#'></script>
    <script type='text/javascript'>
    function changeImage(element) {

        var main_prodcut_image = document.getElementById('main_product_image');
        main_prodcut_image.src = element.src;


    }
    </script>


    <!-- ========== Start footer ========== -->
    <footer class="py-2 copyright text-center">
        <p>&copy; Company name all right reserverd</p>
    </footer>
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

</html>