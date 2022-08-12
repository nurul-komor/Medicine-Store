<!DOCTYPE html>
<html lang="en">

<>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>Dashboard</title>
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!-- Vendors styles-->
    <!-- font awesome css  -->
    <link rel="stylesheet" href="icons/fontawesome/css/all.min.css">
    <!-- bootstrap css  -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <!-- datatable css -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/dataTables.foundation.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/dataTables.jqueryui.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/dataTables.material.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/dataTables.semanticui.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/dataTables.uikit.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/jquery.dataTables.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/jquery.dataTables_themeroller.min.css">



    <link rel="stylesheet" href="vendors/simplebar/css/simplebar.css">
    <link rel="stylesheet" href="css/vendors/simplebar.css">
    <!-- Main styles for this application-->
    <link href="css/style.css" rel="stylesheet">
    <!-- We use those styles to show code examples, you should remove them in your application.-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/prismjs@1.23.0/themes/prism.css">
    <link href="css/examples.css" rel="stylesheet">
    <!-- Global site tag (gtag.js) - Google Analytics-->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        // Shared ID
        gtag('config', 'UA-118965717-3');
        // Bootstrap ID
        gtag('config', 'UA-118965717-5');
    </script>
    </head>

    <body>
        <div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
            <div class="sidebar-brand d-none d-md-flex">
                <svg class="sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
                    <use xlink:href="assets/brand/coreui.svg#full"></use>
                </svg>
                <svg class="sidebar-brand-narrow" width="46" height="46" alt="CoreUI Logo">
                    <use xlink:href="assets/brand/coreui.svg#signet"></use>
                </svg>
            </div>
            <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
                <li class="nav-item"><a class="nav-link" href="/medicineStore/dashboard">
                        <svg class="nav-icon">
                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-speedometer"></use>
                        </svg> Dashboard<span class="badge badge-sm bg-info ms-auto">NEW</span></a></li>
                <li class="nav-title">Main</li>

                <li class="nav-item"><a class="nav-link" href="Categories">
                        &nbsp;&nbsp;<i class="fa-solid fa-sitemap"></i>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Categories</a></li>
                <li class="nav-item"><a class="nav-link" href="Products">
                        &nbsp;&nbsp;<i class="fa-solid fa-box-open"></i>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Products</a></li>



                <li class="nav-group"><a class="nav-link nav-group-toggle">
                        &nbsp;&nbsp;<i class="fa fa-truck" aria-hidden="true"></i>

                        &nbsp;&nbsp;&nbsp;&nbsp;Customers & Orders</a>
                    <ul class="nav-group-items">
                        <li class="nav-item"><a class="nav-link" href="Customers">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                &nbsp;&nbsp;Customers</a></li>
                        <li class="nav-item"><a class="nav-link" href="Orders">
                                <i class="fa-solid fa-truck"></i>
                                &nbsp;&nbsp;Orders</a></li>
                    </ul>
                <li class="nav-item"><a class="nav-link" href="Transaction">
                        &nbsp;&nbsp;<i class="fa-solid fa-sack-dollar"></i>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Transaction</a></li>
                <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
                        <svg class="nav-icon">
                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-star"></use>
                        </svg> Pages</a>
                    <ul class="nav-group-items">
                        <li class="nav-item"><a class="nav-link" href="login" target="_top">
                                <svg class="nav-icon">
                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-account-logout"></use>
                                </svg> Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="register" target="_top">
                                <svg class="nav-icon">
                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-account-logout"></use>
                                </svg> Register</a></li>
                        <li class="nav-item"><a class="nav-link" href="404" target="_top">
                                <svg class="nav-icon">
                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-bug"></use>
                                </svg> Error 404</a></li>
                        <li class="nav-item"><a class="nav-link" href="500" target="_top">
                                <svg class="nav-icon">
                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-bug"></use>
                                </svg> Error 500</a></li>
                    </ul>
                </li>


            </ul>
            <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
        </div>
        <div class="wrapper d-flex flex-column min-vh-100 bg-light">
            <header class="header header-sticky mb-4">

                <div class="container-fluid">
                    <button class="header-toggler px-md-0 me-md-3" type="button"
                        onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
                        <svg class="icon icon-lg">
                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-menu"></use>
                        </svg>
                    </button><a class="header-brand d-md-none" href="#">
                        <svg width="118" height="46" alt="CoreUI Logo">
                            <use xlink:href="assets/brand/coreui.svg#full"></use>
                        </svg></a>
                    <ul class="header-nav ms-3">
                        <li class="nav-item dropdown"><a class="nav-link py-0" data-coreui-toggle="dropdown" href="#"
                                role="button" aria-haspopup="true" aria-expanded="false">
                                <div class="avatar avatar-md"><img class="avatar-img" src="assets/img/avatars/8.jpg"
                                        alt="user@email.com">
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end pt-0">
                                <div class="dropdown-header bg-light py-2">
                                    <div class="fw-semibold">Account</div>
                                </div>

                                <a class="dropdown-item" href="#">
                                    <svg class="icon me-2">
                                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-account-logout"></use>
                                    </svg> Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="header-divider"></div>
                <div class="container-fluid">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb my-0 ms-2">
                            <li class="breadcrumb-item">
                                <!-- if breadcrumb is single--><a href="#">Home</a>
                            </li>
                            <!-- <li class="breadcrumb-item">
              if breadcrumb is single<a href="#">Theme</a>
            </li> -->
                            <li class="breadcrumb-item active"><span>Products</span></li>
                        </ol>
                    </nav>
                </div>
            </header>
            <div class="body flex-grow-1 px-3 ">
                <div class="card mb-5 p-3">
                    <form enctype="multipart/form-data" id="add-product-form" class="row" method="post"
                        action="product-ajax.php" target="_blank">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="product-name" class="form-label">Product Name</label>
                                <input type="text" class="form-control" name="productName" id="product-name">
                            </div>
                            <div class="mb-3">
                                <label for="product-title" class="form-label">Title</label>
                                <input type="text" class="form-control" name="productTitle" id="product-title">
                            </div>
                            <div class="mb-3">
                                <label for="product-itmes" class="form-label">Items</label>
                                <input type="text" class="form-control" name="productItems" id="product-itmes">
                            </div>
                            <div class="mb-3">
                                <label for="product-price" class="form-label">Add Image</label>
                                <input type="file" class="form-control" name="productImage" id="product-price">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="product-price-old" class="form-label">Normal Price</label>
                                <input type="text" class="form-control" name="productPriceOld" id="product-price-old">
                            </div>
                            <div class="mb-3">
                                <label for="product-price-new" class="form-label">New Price</label>
                                <input type="text" class="form-control" name="productPriceNew" id="product-price-new">
                            </div>

                            <div class="form-group mb-3">
                                <label for="inputGroupSelect02">Category</label>
                                <select class="form-control " id="my_select" name="cat_id" required="required">
                                    <?php require('./db/user.php');
                                    $all_topic = $user->selectAllData("categories");
                                ?>
                                    <option value="">-- Please select --</option>
                                    <?php foreach($all_topic as $values){?>
                                    <option value="<?= $values['id'];?>">
                                        <?= $values['category'] ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="inputGroupSelect02">Status</label>
                                <select class="form-control " id="inputGroupSelect02" name="status">
                                    <option class="form-control" value="1">Publish</option>
                                    <option value="0">Unpublish</option>
                                </select>
                            </div>
                        </div>
                        <input type="hidden" name="action" id="" value="addproduct">
                        <div class="col-md-6">
                            <button type="submit" class="col-md-4 btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="col-12 card p-3 mt-4">
                    <?php require('edit-category-modal.php')?>
                    <table class="table table-bordered display" id="productsTable" style="text-align: center;">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Title</th>
                                <th scope="col">Image</th>
                                <th scope="col">Available</th>
                                <th scope="col">Offer Price</th>
                                <th scope="col">Normal Price</th>
                                <th scope="col">status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td>@mdo</td>
                                <td>@mdo</td>
                                <td>@mdo</td>
                                <td>@mdo</td>
                                <td>@mdo</td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
            <footer class="footer">

            </footer>
        </div>
        <!-- jquery js  -->
        <script src="js/jquery.js"></script>
        <!-- font-awesome js  -->
        <script src="icons/fontawesome/js/all.min.js"></script>
        <!-- CoreUI and necessary plugins-->
        <script src="vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
        <script src="vendors/simplebar/js/simplebar.min.js"></script>
        <!-- Plugins and scripts required by this view-->
        <script src="vendors/@coreui/utils/js/coreui-utils.js"></script>
        <script src="js/colors.js"></script>
        <script>
        </script>
        <script src="../assets/js/bootstrap.min.js"></script>
        <script src="/assets/js/jquery-3.3.1.min.js"></script>
        <script src="js/product-ajax.js"></script>
        <!-- datatable js  -->


        <script scr="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"></script>
        <script scr="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/dataTables.bootstrap.min.js"></script>
        <script
            scr="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/dataTables.bootstrap4.min.js"></script>
        <script
            scr="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/dataTables.dataTables.min.js"></script>
        <script
            scr="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/dataTables.foundation.min.js"></script>
        <script scr="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/dataTables.jqueryui.min.js"></script>
        <script scr="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/dataTables.material.min.js"></script>
        <script
            scr="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/dataTables.semanticui.min.js"></script>
        <script scr="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/dataTables.uikit.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#productsTable').DataTable();
            });
        </script>
    </body>

</html>