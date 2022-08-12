 <?php
    require('./db/user.php');
    $user =  new User();
    $action = $_REQUEST['action'];
    // get all category 
        if($action == "getAllOrders"){
            $rows = $user->selectAllData('orders');
            $customerArray   = array('allOrders' =>  $rows);
            echo json_encode($customerArray);
            exit();
        }
    // accept order
    if($action == "acceptOrder"){
        $edit_id = $_POST['edit_id'];
        $statusArray = [
            'status' => '"'.ucwords(1).'"',
        ];
    $updatedOrderStatus = $user->update('orders',$statusArray,$edit_id);
    if($updatedOrderStatus){
        echo json_encode($updatedOrderStatus);
    }
    }
    if($action == "rejectOrder"){
        $edit_id = $_POST['edit_id'];
        $statusArray = [
            'status' => '"'.ucwords(0).'"',
        ];
    $updatedOrderStatus = $user->update('orders',$statusArray,$edit_id);
    if($updatedOrderStatus){
        echo json_encode($updatedOrderStatus);
    }
    }
?>