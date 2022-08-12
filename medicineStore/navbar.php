<?php 
 if(!isset($_SESSION)){
     session_start();
 }
?>
<div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
        </div>
    </div>
    <div class="site-mobile-menu-body"></div>
</div>



<div class="site-navbar js-sticky-header site-navbar-target" role="banner">

    <div class="container">
        <div class="row align-items-center position-relative">
            <div class="site-logo">
                <a href="/medicineStore" class="text-black d-inline-block">Online Medicine Store</a>
            </div>

            <div class="col-12">
                <nav class="site-navigation text-right ml-auto " role="navigation">

                    <ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
                        <li><a href="/medicineStore/" class="nav-link hvr-underline-from-center">Home</a></li>

                        <?php
                        if(!(isset($_SESSION['customerId']))){
                            echo '<li><a href="/medicineStore/customer/login" class="hvr-underline-from-center">Signup / Login</a></li>';
                        }?>
                        <?php
                        if((isset($_SESSION['customerId']))){
                            echo '<li><a href="#" id="logout"  class="hvr-underline-from-center">Logout</a></li>';
                        }?>
                        <li>
                            <?php require('bag.php')?>
                        </li>
                    </ul>
                </nav>

            </div>

            <div class="toggle-button d-inline-block d-lg-none"><a href="#"
                    class="site-menu-toggle py-5 js-menu-toggle text-black"><span class="icon-menu h3"></span></a>
            </div>

        </div>
    </div>

</div>

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
$('#logout').on('click', function(e) {
    e.preventDefault();
    $.ajax({
        url: '/medicineStore/front-ajax.php',
        method: "post",
        dataType: "json",
        data: {
            action: "logout"
        },
        success: function(data) {
            location.reload();
        },
        error: function(request, error) {
            console.log(request);
        }
    });
})
</script>
<!-- <div class="hero" style="background-image: url('images/hero_1.jpg');"></div> -->