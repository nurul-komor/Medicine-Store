<?php 
session_start();
require("dashboard/db/user.php");
    $action = $_REQUEST['action'];
    if($action=="createSession"){
        $key = $_POST['spm'];
        $qty = $_POST['qty'];
        $img = $_POST['image'];
        $due = $_POST['due'];
        if(isset($_SESSION['allProducts'])){
            if(array_key_exists($key,$_SESSION['allProducts'])){
            $quantity = $_SESSION['allProducts'][$key]['qty'];
            if(($quantity + $qty)<=$due && ($quantity + $qty)<= 5){
                $_SESSION['allProducts'][$key]['qty'] = $quantity + $qty;
                 echo "1";
                exit();
            }
            
        }else{
             $_SESSION['allProducts'][$key] = [
                'productName' => $_POST['productName'],
                'productPrice' => $_POST['productPrice'],
                'image' => $_POST['image'],
                'productId' => $key,
                'qty' => $_POST['qty']
        ];
        echo "1";
         exit();
        }
        }
        else{
        $_SESSION['allProducts'][$key] = [
            'productName' => $_POST['productName'],
            'productPrice' => $_POST['productPrice'],
            'image' => $_POST['image'],
            'productId' => $key,
            'qty' => $_POST['qty']
        ];
        echo "1";
         exit();
        }
       

    }
    if($action=="getCartNum"){
        $totalQuantity = 0;
        if(isset($_SESSION['allProducts'])){
            foreach ($_SESSION['allProducts'] as $key => $value) {
                $totalQuantity += $value['qty'];
            }
            echo $totalQuantity;
        }
    }
    if($action=="createUser"){
        $fName = $_POST['fName'];
        $customerId =  $fName.time();
        $email = $_POST['email'];
        $pass = md5($_POST['pass']);
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $customerArray = [
            'customer_name' =>   $fName,
            'customerId' =>$customerId,
            'customer_email'=>  $email,
            'password'=>  $pass,
            'phone'=>  $phone,
            'address'=>  $address,
        ];
     $user->insertData('customers',$customerArray);
    }
    if($action=="UpdateUser"){
        $edit_id  = $_POST['edit_id'];
        $fName = $_POST['fName'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
     $result = $user->updateCustomer('customers',$fName,$email,$phone,$address,$edit_id);
      if($result){
            echo json_encode($result);
        }
    }
    if($action=="getUser"){
      $userId = "'".$_SESSION['customerId']."'";
       $result = $user->SingleCustomer('customers',$userId);
       if($result){
            echo json_encode($result);
       }
    }
    if($action=="logout"){
        session_destroy();
        echo "1";
    }
    // get all products 
        if($action == "getAllCustomers"){
            $rows = $user->selectAllData('products');
            $searchArray   = array('allSearchProduct' =>  $rows);
            echo json_encode($searchArray);
            exit();
        }
?>