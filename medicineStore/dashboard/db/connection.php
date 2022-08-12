<?php
    class Connection{
        public $host = 'localhost';
        public $username = 'root';
        public $password = '';
        public $dbName = 'medicine_store';
        protected $conn;
        public function __construct(){
            $this->conn = new Mysqli($this->host,$this->username,$this->password,$this->dbName);
            if($this->conn->connect_errno){
                 echo "Failed to connect to MySQL: ";
                exit();
            }
        }
    }
    $connection = new Connection();
?>