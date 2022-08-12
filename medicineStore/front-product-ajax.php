<?php 
        require_once('dashboard/db/user.php');
        $productId  =  $_GET['spm'];
        $singleProduct = $user->getSingleProduct('allProducts',$productId);
?>