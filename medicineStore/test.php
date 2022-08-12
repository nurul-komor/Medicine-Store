<?php 
    require('dashboard/db/user.php');
    $user = new User();
    /* 
    $productId =' Rabeca(20mg)_1659968196';
    $singleProduct = $user->getSingleProduct('allProducts',$productId);
    print_r($rows); */
    // session_start();
    // session_destroy();

    // print_r($_SESSION);
    $edit_id = "58";
    // $edit_id = $_GET['edit_id'];
        $statusArray = [
            'status' => '"'.ucwords(1).'"',
        ];
    $updatedOrderStatus = $user->update('order',$statusArray,$edit_id);
?>