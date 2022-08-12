<?php require('../front-product-ajax.php');?>
<?php if($singleProduct['status']=="0" )
    {header('location:/medicineStore/404.php');}
    if(( (int)$singleProduct['items']- (int)$singleProduct['sold_out'])<1){
        header('location:/medicineStore/404.php');
    };
?>
<?php include('../preloader.php')?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

    <link rel="stylesheet" href="../assets/fonts/icomoon/style.css">
    <!-- owl carousel  -->
    <link rel="stylesheet" href="../assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets/css/owl.theme.default.min.css">
    <!-- hover css  -->
    <link rel="stylesheet" type="" href="../assets/css/hover.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <!-- font awesome  -->
    <link rel="stylesheet" href="../dashboard/icons/fontawesome/css/all.min.css">
    <!-- Style -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/custom.style.css">
    <!-- sweatalert css  -->
    <link rel="stylesheet" type="" href="../assets/css/sweetalert2.min.css">
    <script src="../assets/js/sweetalert2.all.min.js"></script>

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
    <?php require('../navbar.php')?>

    <div class="container-fluid  bg-light p-5 ">
        <?php if($singleProduct['status']=="1"){?>
        <div class="card " id="product-container">
            <div class="row g-0">
                <div class="col-md-6 border-end">
                    <div class="d-flex flex-column justify-content-center">
                        <div class="main_image"
                            style="background:url('../uploads/<?= $singleProduct['product_image']?>');background-position:center center;background-size:contain;background-repeat:no-repeat">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="p-3 right-side">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3>
                                <?= $singleProduct['product_name']?>
                            </h3>
                        </div>
                        <div class="mt-2 pr-3 content">
                            <h6>
                                <?= $singleProduct['product_title']?>
                            </h6>
                        </div>
                        <h3>৳
                            <del class="text-danger"> <?= $singleProduct['old_price']?></del>
                            <?= $singleProduct['new_price']?>
                        </h3>
                        <div class="ratings d-flex flex-row align-items-center mb-3">
                            <div class="d-flex flex-row"> <i class='bx bxs-star'></i> <i class='bx bxs-star'></i> <i
                                    class='bx bxs-star'></i> <i class='bx bxs-star'></i> <i class='bx bx-star'></i>
                            </div> <span>441 reviews</span>
                        </div>
                        <form action="../front-ajax.php" method="post" id="createSession">
                            <div class="col-3 mb-4 p-0">
                                <label for="quantity">Quantity:</label>
                                <?php if(((int)$singleProduct['items'] - (int)$singleProduct['sold_out'])>4){?>
                                <input type="number" class="form-control" name="qty" min="1" max="5" value="1">
                                <?php }else{?>
                                <p>(Only
                                    <?php  echo  (int)$singleProduct['items'] - (int)$singleProduct['sold_out']?>
                                    Items
                                    left)
                                </p>
                                <input type="number" class="form-control" name="qty" min="1"
                                    max="<?php echo  (int)$singleProduct['items'] - (int)$singleProduct['sold_out']?>"
                                    value="1">
                                <?php }?>
                            </div>
                            <input type="hidden" name="action" value="createSession">
                            <input type="hidden" name="productName" value="<?= $singleProduct['product_name']?>">
                            <input type="hidden" name="productPrice" value="<?= $singleProduct['new_price'];?>">
                            <input type="hidden" name="image" value="<?= $singleProduct['product_image'];?>">
                            <input type="hidden" name="spm" value="<?= $_GET['spm']?>" id="spm">
                            <input type="hidden" name="due"
                                value="<?= (int)$singleProduct['items'] - (int)$singleProduct['sold_out'];?>">
                            <div class="buttons d-flex flex-row gap-3"> <button type="submit" class="btn btn-dark">Add
                                    to
                                    Basket</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php }?>
    </div>
    <script scr=" ./assets/js/front-product-ajax.js"></script>
    <script type='text/javascript'
        src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js'>
    </script>
    <script type='text/javascript' src='#'></script>
    <script type='text/javascript' src='#'></script>
    <script type='text/javascript' src='#'></script>
    <script type='text/javascript'>
    function changeImage(element) {

        var main_prodcut_image = document.getElementById('main_product_image');
        main_prodcut_image.src = element.src;


    }
    </script>
    <script type='text/javascript'>
    /*     var myLink = document.querySelector('a[href="#"]');
    myLink.addEventListener('click', function(e) {
        e.preventDefault();
    }); */
    </script>

    <!-- ========== Start footer ========== -->
    <footer class="py-2 copyright text-center">
        <p>&copy; Company name all right reserverd</p>
    </footer>
    <!-- ========== End footer ========== -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous">
    </script>
    <script src=" ../assets/js/jquery-3.3.1.min.js"></script>
    <script src="../assets/js/owl.carousel.min.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/jquery.sticky.js"></script>
    <script src="../assets/js/main.js"></script>
    <script src="../assets/js/script.js"></script>
    <script src="../assets/js/front-ajax.js"></script>
    <script src="../dashboard/icons/fontawesome/js/all.min.js"></script>

</body>

</html>