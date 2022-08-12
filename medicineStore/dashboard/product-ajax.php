<?php
    require('./db/user.php');
    $user =  new User();
    $action = $_REQUEST['action'];
    // create dynamic file 
    // insert topic 
    if($action=="addproduct" && !empty($action)){
        $productName = $_POST['productName'];
        $productId = str_replace(' ','',$productName).'_'.time();
        $productTitle = $_POST['productTitle'];
        $productItems = $_POST['productItems'];
        $productPriceOld = $_POST['productPriceOld'];
        $productPriceNew = $_POST['productPriceNew'];
        $cat_id = $_POST['cat_id'];
        $status = $_POST['status'];
        $productImage = "";
        $productImage = $_FILES['productImage'];
        if(!empty($productImage['name'])){
        $productImageName = $user->upload_file($productImage);
        $productArray = [
            'product_name' => ucwords($productName),
            'productId' => $productId,
            'product_title' => $productTitle,
            'cat_id' => $cat_id,
            'product_image'=> $productImageName,
            'old_price' => $productPriceOld,
            'new_price'=> $productPriceNew,
            'items'=> $productItems,
            'status'=> $status
        ];
        $result = $user->insertData('allproducts',$productArray);
        if($result){
            echo $result;
        }
        }
    }
    // get all topics 
        if($action == "getAllproduct"){
            $allproducts = $rows = $user->selectAllData('allproducts');
            $productList   = array('allproducts' =>  $allproducts);
            echo json_encode($productList);
            exit();
        }
    // Edit topics 
    if($action==="edit_product"){
        $edit_id  = (!empty($_POST['edit_id'])) ? $_POST['edit_id']:"";
        $productName = $_POST['productName'];
        $productTitle = $_POST['productTitle'];
        $productItems = $_POST['productItems'];
        $productPriceOld = $_POST['productPriceOld'];
        $productPriceNew = $_POST['productPriceNew'];
        $productImage = $_FILES['productImage'];
        if(!empty($productImage['name'])){
        $productImageName = $user->upload_file($productImage);
        $productArray = [
            'product_name' => '"'.ucwords($productName).'"',
            'product_title' => '"'.$productTitle.'"',
            'product_image'=> '"'.$productImageName.'"',
            'old_price' => '"'.$productPriceOld.'"',
            'new_price'=> '"'.$productPriceNew.'"',
            'items'=> '"'.$productItems.'"',
        ];
    }
        if(empty($productImage['name'])){
        $productArray = [
            'product_name' => '"'.ucwords($productName).'"',
            'product_title' => '"'.$productTitle.'"',
            'old_price' => '"'.$productPriceOld.'"',
            'new_price'=> '"'.$productPriceNew.'"',
            'items'=> '"'.$productItems.'"',
        ];
        }
        $updatedproduct = $user->update('products',$productArray,$edit_id);
        if($updatedproduct){
            echo json_encode(1);
        }
    }
    // get single topic 
   
    
    if($action==="deleteproduct"){
        $id  = (!empty($_GET['id'])) ? $_GET['id']:"";
        $table  = (!empty($_GET['tableName'])) ? $_GET['tableName']:"";
        $result = $user->deleteproduct($table,$id);
        echo json_encode($result);
        // rmdir("../categories/".$topic_table);
    }
    // get all orders
    if($action == "getAllOrder"){
            $allOrders  = $user->selectAllData('order_list');
            $productList   = array('orderLists' =>  $allOrders);
            echo json_encode($productList);
            exit();
        }
    if($action == "getAllCustomers"){
            $allCustomer  = $user->selectAllData('customers');
            $customerList   = array('customerList' =>  $allCustomer);
            echo json_encode($customerList);
            exit();
        }
        // get all getMessages 
        if($action="updateOrderStatus"){
        $edit_id  = (!empty($_GET['id'])) ? $_GET['id']:"";
        $statusTxt = "Delivered";
        $status = [
            'status' => '"'.ucwords($statusTxt).'"',
        ];
        $updateStatus = $user->update('allproducts',$status,$edit_id);
        if($updateStatus){
            echo json_encode(1);
        }
    }
?>