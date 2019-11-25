<?php 
require_once("./../config/config.php");
Class Database{
    protected $host = DB_HOST;
    protected $user = DB_USER;
    protected $pass = DB_PASS;
    protected $dbname = DB_NAME;
    public $conn;
    public $error;
    public function __construct(){
        $this->connectDB();
    }
    private function connectDB(){
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
        if(!$this->conn){
            $this->error = "Connection fail". $this->conn->connect_error;
            return false;
        }
    }
    // Select or Read data
    public function select($query){
        $result = $this->conn->query($query) or die($this->conn->error.__LINE__);
        if($result->num_rows >0){
            return $result;
        }
        else{
            return false;
        }
    }
    // Insert data
    public function insert($query){
        $insert_row = $this->conn->query($query) or die($this->conn->error.__LINE__);
        if($insert_row){
            return $insert_row;
        }else{
            return false;
        }
    }
    // Update data
    public function update($query){
        $update_row = $this->conn->query($query) or die($this->conn->error.__LINE__);
        if($update_row){
            return $update_row;
        }
        else{
            return false;
        }
    }
    // Delete data
    public function delete($query){
        $delete_row = $this->conn->query($query) or die($this->conn->error.__LINE__);
        if($delete_row){
            return $delete_row;
        }else{
            return false;
        }
    }
}

?>