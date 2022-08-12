 <?php
	/* session_start();
	if(!$_SESSION['username']){
     	header('location:page-login.php');
     	exit;
 	} */
?>
 <?php
    require('./db/user.php');
    $user =  new User();
    $action = $_REQUEST['action'];
    // create dynamic file 
    // insert topic 
    if($action=="addCategory" && !empty($action)){
        $categoryName = $_POST['categoryName'];
        $status = $_POST['status'];
        $categoryArray = [
            'category' =>   $categoryName,
            'status'=>  $status,
        ];
     $user->insertData('categories',$categoryArray);
    
    }
    // get all category 
        if($action == "getAllRows"){
            $rows = $user->selectAllData('categories');
            $categorieArr   = array('allCategories' =>  $rows);
            echo json_encode($categorieArr);
            exit();
        }
    // Edit category 
    if($action==="editCategory"){
        $edit_id  = (!empty($_POST['edit_id'])) ? $_POST['edit_id']:"";
        $categoryName  = (!empty($_POST['category'])) ? $_POST['category']:"";
        $status  = (!empty($_POST['status'])) ? $_POST['status']:"";
            $categoryArray = [
                'category' => '"'.ucwords($categoryName).'"',
                'status' => '"'.ucwords($status).'"',
            ];
        $updatedCategory = $user->update('categories',$categoryArray,$edit_id);
        if($updatedCategory){

            echo json_encode($updatedCategory);
        }
    }
    if($action==="deleteCategory"){
        $categoryId  = (!empty($_GET['id'])) ? $_GET['id']:"";
        $result = $user->delete('categories',$categoryId);
        echo json_encode($result);
        // rmdir("../categories/".$topic_table);
    }
?>