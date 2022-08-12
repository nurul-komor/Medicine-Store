<?php include('preloader.php')?>
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
    <!-- font awesome css  -->
    <link rel="stylesheet" href="dashboard/icons/fontawesome/css/all.min.css">
    <!-- Style -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/custom.style.css">

    <title>Online Medicine Shop</title>
</head>

<body>
    <!-- ========== Start home-section ========== -->
    <section class="home-section" id="home-section">
        <?php require('navbar.php')?>

        <div class="search-section container d-flex justify-content-center align-items-center">

            <form action="" method="post" id="search-item-form" class="text-center">
                <h2 class="text-light font-weight-bold mb-5 d-block mb-3">SEARCH YOUR PRODUCT</h2>
                <div class="row">
                    <div class="col-md-9">
                        <div class="row">
                            <input class="col-md-12 form-control mb-3" type="text" name="search_query" id="searchItem"
                                placeholder="type here...">
                            <!-- <select class="col-md-6 mb-3 form-control">
                                <option style="height: calc(1.5em + 0.75rem + 2px);" selected>Select
                                </option>
                            </select> -->
                        </div>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>

            </form>
        </div>
    </section>
    <!-- ========== End home-section ========== -->
    <!-- ========== Start Collections ========== -->
    <div class="collections ">
        <div class="collection-title text-center py-4">
            <h2 class="font-weight-bold text-dark ">OUR MEDICINE COLLECTION</h2>
            <p class="">Best Items</p>
        </div>
        <div class="all-products container-fluid" id="all-products">
            <div class="singleCategory">
                <div class="products-title text-center py-3 mb-3">
                    <h4 class="font-weight-bold text-light">Product Title</h4>
                </div>
                <div class="owl-carousel">
                    <a href="products/product-demo">
                        <div class="item">
                            <div class="item-bg">
                            </div>
                            <div class="item-text p-3">
                                <div class="d-flex">
                                    <div>
                                        <p>Product Name</p>
                                        <p class="font-weight-bold pt-1">90/-</p>
                                    </div>
                                    <div class="rating-icon p-1">
                                        <span class="icon-star"></span>
                                        <span class="icon-star"></span>
                                        <span class="icon-star"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- ========== End Collections ========== -->
    <!-- ========== Start footer ========== -->
    <footer class="py-2 copyright text-center">
        <p>&copy; Company name all right reserverd</p>
    </footer>
    <!-- ========== End footer ========== -->
    <script src=" assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/front-ajax.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.sticky.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="dashboard/icons/fontawesome/js/all.min.js"></script>
    <script>
    $(".owl-carousel").owlCarousel({
        autoWidth: false,
        loop: false,
        center: false,
        items: 5,
        loop: false,
        margin: 10,
        autoplay: false,
        nav: false,
        dots: false,
        responsive: {
            0: {
                items: 1,

            },
            480: {
                items: 2,

            },
            768: {
                items: 5,

            }
        }
    });
    $("#search-item-form").on('submit', function(e) {
        e.preventDefault()
        $(document).ready(function() {
            function getSearchItems(singleproduct) {
                var product = `<a class="col-md-3" href="products/?spm=${singleproduct.productId}">
            <div class="item">
                            <div class="item-bg" style="background:url('uploads/${singleproduct.product_image}');background-size:cover;background-position:center center">
                            </div>
                            <div class="item-text p-3">
                                <div class="d-flex">
                                    <div>
                                        <p>${singleproduct.product_name}</p>
                                        <p class="font-weight-bold pt-1">${singleproduct.new_price}/-</p>
                                    </div>
                                    <div class="rating-icon p-1">
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                        </a>`;;
                return product;
            }

            // $(document).on('keyup', 'input#search', function() {
            var search = $("#searchItem").val();
            if (!(search === '')) {
                $.ajax({
                    url: '/medicineStore/search-product.php',
                    method: 'post',
                    dataType: 'json',
                    data: {
                        search_query: search
                    },
                    success: function(result) {
                        console.log(result);
                        var searchList = "";
                        $.each(result.searchResult, function(index, singleproduct) {
                            if (singleproduct.status == "1") {
                                if ((singleproduct.items - singleproduct.sold_out) >
                                    0) {
                                    searchList += getSearchItems(singleproduct);
                                }
                            }
                        });
                        $(".collections").addClass("row");
                        $(".collections").html(searchList);
                    },
                    error: function() {

                    }
                })
            } else {
                // getSearchItems()
            }
            // })
            // getSearchItems();
        })
    })
    </script>
</body>

</html>