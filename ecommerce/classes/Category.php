<?php
include_once '../Lib/db.php';
include_once '../format/Format.php';
?>

<?php
class Category
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db   = new Database();
        $this->fm   = new Format();
    }

    public function insert_cate($cate_name)
    {
        $cate_name = $this->fm->validation($cate_name);
        $cate_name =  mysqli_real_escape_string($this->db->link, $cate_name);
        if (empty($cate_name)) {
            $msg = "Category name must not be empty";
            return $msg;
        } else {
            $query = "INSERT INTO category_table(category_name) VALUES ('$cate_name')";
            $result = $this->db->insert($query);
            if ($result) {
                $msg = "<span class='infomation'>Category add successfully !!</span>";
                return $msg;
            } else {
                $msg = "<span class='infomation'>Failed to add Category!!</span>";
                return $msg;
            }
        }
    }

    public function get_all_categories()
    {
        $query = "SELECT * FROM category_table ORDER BY category_id DESC";
        $result = $this->db->select($query);
        return $result;
    }

    public function get_cate_by_ID($id)
    {
        $query = "SELECT * FROM category_table WHERE category_id = '$id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function catUpdate($catName, $id)
    {
        $catName = $this->fm->validation($catName);
        $catName =  mysqli_real_escape_string($this->db->link, $catName);
        $id =  mysqli_real_escape_string($this->db->link, $id);
        if (empty($catName)) {
            $msg = "<span class='error'>Category Field Must Not be empty</span> ";
            return $msg;
        } else {
            $query = "UPDATE category_table
                   SET
                   category_name = '$catName'
                   WHERE category_id = '$id' ";
            $update_row  = $this->db->update($query);
            if ($update_row) {
                $msg = "<span class='success'>Category Updated Successfully.</span> ";
                return $msg;
            } else {
                $msg = "<span class='error'>Category Not Updated .</span> ";
                return $msg;
            }
        }
    }
}
?>