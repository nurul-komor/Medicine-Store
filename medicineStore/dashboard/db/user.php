<?php
    require('connection.php');
    class User extends Connection{
        public function insertData($table,$arrayName){
            if(!empty($arrayName)){
                $fields=$placeholders=[];
                foreach($arrayName as $field => $value){
                $fields[]       = $field;
                $placeholders[] = '"'.$value.'"';
            }
            }
            $sql = "insert into $table (".implode(',',$fields).") values (".implode(',',$placeholders).")";
            // echo $sql;
            $result=mysqli_query($this->conn, $sql);
            if($result) {
                echo json_encode($this->conn->insert_id);
            }
        }
        public function searchQuery($query,$table,$field){
            $sql = "select * from $table where $field like '%{$query}%'";
            $result=mysqli_query($this->conn, $sql);
            if($result->num_rows>0){
                $results = $result->fetch_all(MYSQLI_ASSOC);
            }
            else{
                $results =  [];
            }
            return $results;
        }
        public function getRows($table){
        $sql = "select * from $table order by id desc";
        $result=mysqli_query($this->conn, $sql);
        if($result->num_rows > 0){
            $results = $result->fetch_all(MYSQLI_ASSOC);
        }else{
            $results = [];
        }
        return $results;
    }
        public function upload_file($data){
            $dir = '../uploads/';
            $ext = pathinfo($data['name'],PATHINFO_EXTENSION);
            $fileName = uniqid()."_".time().".".$ext;
            move_uploaded_file($data["tmp_name"],$dir.$fileName);
            return $fileName;
        }
        public function createTable($table){
            $sql = "CREATE TABLE $table (
                    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    bookName VARCHAR(100) NOT NULL,
                    book_img VARCHAR(100) NOT NULL,
                    book_url VARCHAR(100) NOT NULL,
                    book_file VARCHAR(100) NOT NULL,
                    description TEXT NOT NULL,
                    topic_id VARCHAR(11) NOT NULL
                )";
                // echo $sql;die;
            $result = mysqli_query($this->conn,$sql) or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);
            
            
        }
        
        /* public function SingleBook($table,$id){
            $sql = "SELECT * FROM $table WHERE id=$id";
            $result = mysqli_query($this->conn,$sql);
            if($result->num_rows>0){
                $results = $result->fetch_assoc();
                return $results;
            }
        } */
        public function SingleCustomer($table,$id){
            $sql = "SELECT * FROM $table WHERE customerId=$id";
            $result = mysqli_query($this->conn,$sql);
            if($result->num_rows>0){
                $results = $result->fetch_assoc();
                if($results){
                    unset($results['password']);
                    return $results;
                }
                // return $results;
            }
        }
        // update category
        public function update($table,$array, $id)
        {
            $sql = "UPDATE $table SET ";
            $sql .= urldecode(http_build_query($array,'',', '));
            $sql .= " WHERE id='".$id."'";
            // echo $sql;
            $result = mysqli_query($this->conn,$sql);
            if($result){
                return $result;
            }
        }
        public function updateCustomer($table,$fName,$email,$phone,$address,$edit_id)
        {
            $sql = "UPDATE $table  SET customer_name = $fName, customer_email = $email, phone = $phone,address= $address  where customerId=$edit_id";
            echo $sql;die;
            $result = mysqli_query($this->conn,$sql);
            // echo stripcslashes($sql);
            if($result){
                return $result;
            }
        }
        public function deleteTopic($table,$id,$topic_table,$topic_img){
            $sql1 = "DELETE FROM $table WHERE id=$id";
            $sql2 = "DROP TABLE $topic_table";
            mysqli_query($this->conn,$sql1);
            mysqli_query($this->conn,$sql2);
            $dirPath = "../categories/$topic_table";
            if (!is_dir($dirPath)) {
                throw new InvalidArgumentException("$dirPath must be a directory");
            }
            if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
                $dirPath .= '/';
            }
            $files = glob($dirPath . '*', GLOB_MARK);
            foreach ($files as $file) {
                if (is_dir($file)) {
                    self::deleteDir($file);
                } 
                else {
                    unlink($file);
                }
            }
            rmdir($dirPath);
            $img_dir = "../uploads/$topic_img";
            unlink($img_dir);
        }
            // search topic 
            public function searchProducts($query){
            $sql = "select * from allProducts where product_name like '%{$query}%' order by id desc";
            // echo $sql;
            $result = mysqli_query($this->conn,$sql);
            if($result->num_rows>0){
                $results = $result->fetch_all(MYSQLI_ASSOC);
            }
            return $results;
        }
        public function login($table,$username,$pass){
            $sql = "select * from $table where username like '{$username}' and password like '{$pass}'";
            $result = mysqli_query($this->conn,$sql);
            
            if($result->num_rows>0){
                $result = $result->fetch_assoc();
                if($result['status']=="1"){
                    return  1;
                }
                if($result['status']=="0"){
                    return  'banned';
                }
            }
            else{
               return 0;
            }
        }
        public function customerLogin($email,$pass){
            $sql = "select * from customers where customer_email like '{$email}' and password like '{$pass}'";
            $result = mysqli_query($this->conn,$sql);
            if($result->num_rows>0){
                $result = $result->fetch_assoc();
                if($result){
                    return  $result;
                }
            }
        }
        public function selectAllData($table){
            $sql = "select * from $table order by id desc";
             $result = mysqli_query($this->conn,$sql);
            if($result->num_rows>0){
                $results = $result->fetch_all(MYSQLI_ASSOC);
            }
            else{
                $results = [];
            }
            return $results;
        }
        public function tableSelection($id){
            $sql = "SELECT `folder_name` FROM `topics` WHERE id=$id";
            // echo $sql; die;
            $result = mysqli_query($this->conn,$sql);
            if($result->num_rows>0){
                // print_r($result);
                return $result->fetch_assoc();
            }
        }
        public function getAllBooks($table){
            $sql = "select * from topics inner join $table on  topics.id = $table.topic_id";
            // echo $sql;
            $result = mysqli_query($this->conn,$sql);
            if($result->num_rows>0){
                return $result->fetch_all(MYSQLI_ASSOC);
            }
        }
        public function delete($table,$Id){
            $sql = "DELETE FROM $table WHERE id=$Id";
            $result = mysqli_query($this->conn,$sql);
            if($result){
                return $result;
            }
        }
        public function getSingleProduct($table,$productId){
            $sql = "select * from `$table` where productId='$productId'";
            $result = mysqli_query($this->conn,$sql);
            if($result){
                return $result->fetch_assoc();
            }
        }
        public function updateOrderStatus($status,$id){
            $sql = "update orders set status='$status' where id='$id'";
        }
    };
    $user = new User();
?>