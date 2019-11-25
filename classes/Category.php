<?php 
    require_once "./../lib/Database.php"; 
    require_once "./../helpers/Format.php"; 
?>
<?php
class Category
{
    private $db;
    private $fm;
    function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function catInsert($catName){
        $catName = $this->fm->validation($catName);
        $cateName = mysqli_real_escape_string($this->db->conn, $catName);
        if(empty($cateName)) {
            $catmsg = "Category Name must not be empty!";
            return $catmsg;
        }else{
            $query = "INSERT INTO tbl_category(catName) VALUES ('$cateName')";
            $result = $this->db->insert($query);
           if($result){
                $catmsg = "<span class='success'>Category Inserted Successfully.</span>";
                return $catmsg;
           }else{
                $catmsg = "<span class='error'>Category Not Inserted.</span>";
                return $catmsg;
           }
        }
    }

}



?>