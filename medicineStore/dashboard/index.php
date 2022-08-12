<?php 
session_start();
if(!$_SESSION['username']){
header('location:login');
exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>Dashboard</title>


    <!-- Vendors styles-->
    <link rel="stylesheet" href="vendors/simplebar/css/simplebar.css">
    <link rel="stylesheet" href="css/vendors/simplebar.css">
    <!-- font awesome  -->
    <link rel="stylesheet" href="icons/fontawesome/css/all.min.css">
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
    <link href="vendors/@coreui/chartjs/css/coreui-chartjs.css" rel="stylesheet">
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
                    <i class="fa-solid fa-sitemap"></i>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Categories</a></li>
            <li class="nav-item"><a class="nav-link" href="Products">
                    <i class="fa-solid fa-box-open"></i>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Products</a></li>



            <li class="nav-group"><a class="nav-link nav-group-toggle">
                    <i class="fa fa-truck" aria-hidden="true"></i>

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
                    <i class="fa-solid fa-sack-dollar"></i>
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

                            <a class="dropdown-item" href="login">
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
                        <li class="breadcrumb-item active"></li>
                    </ol>
                </nav>
            </div>
        </header>
        <div class="body flex-grow-1 px-3">
            <div class="container-lg">
                <div class="card mb-4">
                    <div class="card-header">
                        <string>Widgets</string>
                    </div>
                    <div class="card-body">
                        <div class="example">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item"><a class="nav-link active" data-coreui-toggle="tab"
                                        href="#preview-856" role="tab">
                                        <svg class="icon me-2">
                                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-media-play"></use>
                                        </svg>Preview</a></li>
                            </ul>
                            <div class="tab-content rounded-bottom">
                                <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-856">
                                    <div class="row">
                                        <div class="col-sm-6 col-lg-3">
                                            <div class="card mb-4 text-white bg-primary">
                                                <div
                                                    class="card-body pb-0 d-flex justify-content-between align-items-start">
                                                    <div>
                                                        <div class="fs-4 fw-semibold">26K <span
                                                                class="fs-6 fw-normal">(-12.4%
                                                                <svg class="icon">
                                                                    <use
                                                                        xlink:href="vendors/@coreui/icons/svg/free.svg#cil-arrow-bottom">
                                                                    </use>
                                                                </svg>)</span></div>
                                                        <div>Users</div>
                                                    </div>
                                                    <div class="dropdown">
                                                        <button class="btn btn-transparent text-white p-0" type="button"
                                                            data-coreui-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <svg class="icon">
                                                                <use
                                                                    xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options">
                                                                </use>
                                                            </svg>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end"><a
                                                                class="dropdown-item" href="#">Action</a><a
                                                                class="dropdown-item" href="#">Another action</a><a
                                                                class="dropdown-item" href="#">Something else here</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                                                    <canvas class="chart" id="card-chart1" height="70"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.col-->
                                        <div class="col-sm-6 col-lg-3">
                                            <div class="card mb-4 text-white bg-info">
                                                <div
                                                    class="card-body pb-0 d-flex justify-content-between align-items-start">
                                                    <div>
                                                        <div class="fs-4 fw-semibold">$6.200 <span
                                                                class="fs-6 fw-normal">(40.9%
                                                                <svg class="icon">
                                                                    <use
                                                                        xlink:href="vendors/@coreui/icons/svg/free.svg#cil-arrow-top">
                                                                    </use>
                                                                </svg>)</span></div>
                                                        <div>Income</div>
                                                    </div>
                                                    <div class="dropdown">
                                                        <button class="btn btn-transparent text-white p-0" type="button"
                                                            data-coreui-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <svg class="icon">
                                                                <use
                                                                    xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options">
                                                                </use>
                                                            </svg>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end"><a
                                                                class="dropdown-item" href="#">Action</a><a
                                                                class="dropdown-item" href="#">Another action</a><a
                                                                class="dropdown-item" href="#">Something else here</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                                                    <canvas class="chart" id="card-chart2" height="70"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.col-->
                                        <div class="col-sm-6 col-lg-3">
                                            <div class="card mb-4 text-white bg-warning">
                                                <div
                                                    class="card-body pb-0 d-flex justify-content-between align-items-start">
                                                    <div>
                                                        <div class="fs-4 fw-semibold">2.49% <span
                                                                class="fs-6 fw-normal">(84.7%
                                                                <svg class="icon">
                                                                    <use
                                                                        xlink:href="vendors/@coreui/icons/svg/free.svg#cil-arrow-top">
                                                                    </use>
                                                                </svg>)</span></div>
                                                        <div>Conversion Rate</div>
                                                    </div>
                                                    <div class="dropdown">
                                                        <button class="btn btn-transparent text-white p-0" type="button"
                                                            data-coreui-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <svg class="icon">
                                                                <use
                                                                    xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options">
                                                                </use>
                                                            </svg>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end"><a
                                                                class="dropdown-item" href="#">Action</a><a
                                                                class="dropdown-item" href="#">Another action</a><a
                                                                class="dropdown-item" href="#">Something else here</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="c-chart-wrapper mt-3" style="height:70px;">
                                                    <canvas class="chart" id="card-chart3" height="70"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.col-->
                                        <div class="col-sm-6 col-lg-3">
                                            <div class="card mb-4 text-white bg-danger">
                                                <div
                                                    class="card-body pb-0 d-flex justify-content-between align-items-start">
                                                    <div>
                                                        <div class="fs-4 fw-semibold">44K <span
                                                                class="fs-6 fw-normal">(-23.6%
                                                                <svg class="icon">
                                                                    <use
                                                                        xlink:href="vendors/@coreui/icons/svg/free.svg#cil-arrow-bottom">
                                                                    </use>
                                                                </svg>)</span></div>
                                                        <div>Sessions</div>
                                                    </div>
                                                    <div class="dropdown">
                                                        <button class="btn btn-transparent text-white p-0" type="button"
                                                            data-coreui-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <svg class="icon">
                                                                <use
                                                                    xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options">
                                                                </use>
                                                            </svg>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end"><a
                                                                class="dropdown-item" href="#">Action</a><a
                                                                class="dropdown-item" href="#">Another action</a><a
                                                                class="dropdown-item" href="#">Something else here</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                                                    <canvas class="chart" id="card-chart4" height="70"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="example">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item"><a class="nav-link active" data-coreui-toggle="tab"
                                        href="#preview-1114" role="tab">
                                        <svg class="icon me-2">
                                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-media-play"></use>
                                        </svg>Preview</a></li>
                            </ul>
                            <div class="tab-content rounded-bottom">
                                <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1114">
                                    <div class="row">
                                        <div class="col-sm-6 col-lg-4">
                                            <div class="card" style="--cui-card-cap-bg: #3b5998">
                                                <div
                                                    class="card-header position-relative d-flex justify-content-center align-items-center">
                                                    <svg class="icon icon-3xl text-white my-4">
                                                        <use
                                                            xlink:href="vendors/@coreui/icons/svg/brand.svg#cib-facebook-f">
                                                        </use>
                                                    </svg>
                                                    <div
                                                        class="chart-wrapper position-absolute top-0 start-0 w-100 h-100">
                                                        <canvas id="social-box-chart-1" height="90"></canvas>
                                                    </div>
                                                </div>
                                                <div class="card-body row text-center">
                                                    <div class="col">
                                                        <div class="fs-5 fw-semibold">89k</div>
                                                        <div class="text-uppercase text-medium-emphasis small">friends
                                                        </div>
                                                    </div>
                                                    <div class="vr"></div>
                                                    <div class="col">
                                                        <div class="fs-5 fw-semibold">459</div>
                                                        <div class="text-uppercase text-medium-emphasis small">feeds
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.col-->
                                        <div class="col-sm-6 col-lg-4">
                                            <div class="card" style="--cui-card-cap-bg: #00aced">
                                                <div
                                                    class="card-header position-relative d-flex justify-content-center align-items-center">
                                                    <svg class="icon icon-3xl text-white my-4">
                                                        <use
                                                            xlink:href="vendors/@coreui/icons/svg/brand.svg#cib-twitter">
                                                        </use>
                                                    </svg>
                                                    <div
                                                        class="chart-wrapper position-absolute top-0 start-0 w-100 h-100">
                                                        <canvas id="social-box-chart-2" height="90"></canvas>
                                                    </div>
                                                </div>
                                                <div class="card-body row text-center">
                                                    <div class="col">
                                                        <div class="fs-5 fw-semibold">973k</div>
                                                        <div class="text-uppercase text-medium-emphasis small">followers
                                                        </div>
                                                    </div>
                                                    <div class="vr"></div>
                                                    <div class="col">
                                                        <div class="fs-5 fw-semibold">1.792</div>
                                                        <div class="text-uppercase text-medium-emphasis small">tweets
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.col-->
                                        <div class="col-sm-6 col-lg-4">
                                            <div class="card" style="--cui-card-cap-bg: #4875b4">
                                                <div
                                                    class="card-header position-relative d-flex justify-content-center align-items-center">
                                                    <svg class="icon icon-3xl text-white my-4">
                                                        <use
                                                            xlink:href="vendors/@coreui/icons/svg/brand.svg#cib-linkedin">
                                                        </use>
                                                    </svg>
                                                    <div
                                                        class="chart-wrapper position-absolute top-0 start-0 w-100 h-100">
                                                        <canvas id="social-box-chart-3" height="90"></canvas>
                                                    </div>
                                                </div>
                                                <div class="card-body row text-center">
                                                    <div class="col">
                                                        <div class="fs-5 fw-semibold">500+</div>
                                                        <div class="text-uppercase text-medium-emphasis small">contacts
                                                        </div>
                                                    </div>
                                                    <div class="vr"></div>
                                                    <div class="col">
                                                        <div class="fs-5 fw-semibold">292</div>
                                                        <div class="text-uppercase text-medium-emphasis small">feeds
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.col-->
                                    </div>
                                    <!-- /.row-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div><a href="https://coreui.io">CoreUI </a><a href="https://coreui.io">Bootstrap Admin Template</a> © 2022
                creativeLabs.</div>
            <div class="ms-auto">Powered by&nbsp;<a href="https://coreui.io/docs/">CoreUI UI Components</a></div>
        </footer>
    </div>
    <!-- font-awesome js  -->
    <script src="icons/fontawesome/js/all.min.js"></script>
    <!-- CoreUI and necessary plugins-->
    <script src="vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
    <script src="vendors/simplebar/js/simplebar.min.js"></script>
    <script src="vendors/chart.js/js/chart.min.js"></script>
    <script src="vendors/@coreui/chartjs/js/coreui-chartjs.js"></script>
    <script src="vendors/@coreui/utils/js/coreui-utils.js"></script>
    <script src="js/widgets.js"></script>
    <script>
    </script>

</body>

</html>