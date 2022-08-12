<?php
session_start();
if(!isset($_SESSION['allProducts'])){
        header("location:/medicineStore/cart.php");
    }
    
    if(isset($_SESSION['allProducts'])){
        $orderList = "";
        $total = 50;
        foreach($_SESSION['allProducts'] as $key => $value){
            $orderList.= $value['productName'].'('.$value['qty'].')';
            $total += (int)$value['productPrice']*(int)$value['qty'];
        }
        return $total;
        return $orderList;
    }
?>