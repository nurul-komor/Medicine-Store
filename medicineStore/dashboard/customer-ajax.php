 <?php
    require('./db/user.php');
    $user =  new User();
    $action = $_REQUEST['action'];
    // get all category 
        if($action == "getAllCustomers"){
            $rows = $user->selectAllData('customers');
            $customerArray   = array('allCustomers' =>  $rows);
            echo json_encode($customerArray);
            exit();
        }
?>