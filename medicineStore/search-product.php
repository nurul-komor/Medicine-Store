<?php 
    require('dashboard/db/user.php');
	$obj = new User();
    $query = $_POST['search_query'];
        if(!empty($query)){
            $result= $obj->searchProducts($query);
		    $resultArr = array('searchResult'=>$result);
		    echo json_encode($resultArr);
		    exit();
        }
?>