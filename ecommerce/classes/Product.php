<?php
include_once "$_SERVER[DOCUMENT_ROOT]/ecommerce/Lib/db.php";
include_once "$_SERVER[DOCUMENT_ROOT]/ecommerce/format/Format.php";
?>

<?php
class Product
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db   = new Database();
        $this->fm   = new Format();
    }
    public function insert_Product($data, $file)
    {
        $product_name   =  mysqli_real_escape_string($this->db->link, $data['product_name']);
        $category_id     =  mysqli_real_escape_string($this->db->link, $data['category_id']);
        $body             =  mysqli_real_escape_string($this->db->link, $data['body']);
        $price          =  mysqli_real_escape_string($this->db->link, $data['price']);
        $type             =  mysqli_real_escape_string($this->db->link, $data['type']);

        $permited = array('jpg', 'png', 'jpeg', 'gif');
        $file_name = $file["image"]["name"];
        $file_size = $file["image"]["size"];
        $file_temp = $file["image"]["tmp_name"];

        // var_dump($file);
        // die();

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = "upload/" . $unique_image;
        if ($product_name == "" || $category_id == "" || $body == "" || $price == "" || $type == "") {
            $msg = "<span class='error'>Field Must Not be empty .</span> ";
            return $msg;
        } elseif ($price < 0) {
            $msg = "<span class='error'>Price Must Not Be Negative</span>";
            return $msg;
        } else {
            move_uploaded_file($file_temp, $uploaded_image);
            $query = "INSERT INTO products_table(product_name, cate_id, body, price, image, type) VALUES ('$product_name','$category_id','$body','$price','$uploaded_image','$type')";
            $inserted_row = $this->db->insert($query);
            if ($inserted_row) {
                $msg = "<span class='success'>Product Inserted Successfully.</span> ";
                return $msg;
            } else {
                $msg = "<span class='error'>Product Not Inserted .</span> ";
                return $msg;
            }
        }
    }

    public function get_all_products()
    {
        $query = "SELECT products_table.*, category_table.category_name FROM products_table INNER JOIN category_table ON products_table.cate_id = category_table.category_id ORDER BY products_table.product_id DESC";
        $result = $this->db->select($query);
        return $result;
    }

    public function productUpdate($data, $file, $id)
    {
        $product_name   =  mysqli_real_escape_string($this->db->link, $data['product_name']);
        $category_id    =  mysqli_real_escape_string($this->db->link, $data['category_id']);
        $body           =  mysqli_real_escape_string($this->db->link, $data['body']);
        $price          =  mysqli_real_escape_string($this->db->link, $data['price']);
        $type           =  mysqli_real_escape_string($this->db->link, $data['type']);

        $id             =  mysqli_real_escape_string($this->db->link, $data['id']);
        $id             = $this->fm->validation($id);

        $permited = array('jpg', 'png', 'jpeg', 'gif');
        $file_name = $file["image"]["name"];
        $file_size = $file["image"]["size"];
        $file_temp = $file["image"]["tmp_name"];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = "upload/" . $unique_image;

        if ($product_name == "" || $category_id == "" || $body == "" || $price == "" || $type == "") {
            $msg = "<span class='error'>Field Must Not be empty .</span> ";
            return $msg;
        } else {
            if (!empty($file_name)) {
                if ($file_size > 1054589) {
                    echo "<span class='error'>Image Size should be less then 1MB</span>";
                } elseif (in_array($file_ext, $permited) === false) {
                    echo "<span class='error'> You can Upload Only" . implode(',', $permited) . "</span>";
                } elseif ($price < 0) {
                    echo "<span class='error'>Price must not negative </span>";
                } else {
                    move_uploaded_file($file_temp, $uploaded_image);
                    $query = "  UPDATE products_table
                                SET 
                                product_name 	= '$product_name',
                                cate_id 	    = '$category_id',
                                body 			= '$body',
                                price 		= '$price',
                                image 		= '$uploaded_image',
                                type 			= '$type'
                                WHERE product_id = '$id'";
                    $updated_row = $this->db->update($query);
                    if ($updated_row) {
                        $msg = "<span class='success'>Product Updated Successfully !!</span> ";
                        return $msg;
                    } else {
                        $msg = "<span class='error'>Product Not Updated Failed !!</span> ";
                        return $msg;
                    }
                }
            }
        }
    }
    public function getProById($id)
    {
        $query = "SELECT * FROM products_table WHERE product_id ='$id' ";
        $result = $this->db->select($query);
        return $result;
    }
    public function delete_product_by_id($id)
    {
        $query = "SELECT * FROM products_table WHERE product_id = '$id'";
        $getData = $this->db->select($query);
        if ($getData) {
            while ($delImg = $getData->fetch_assoc()) {
                $dellink = $delImg['image'];
                unlink($dellink);
            }
        }

        $delquery = "DELETE FROM products_table WHERE product_id = '$id' ";
        $deldata = $this->db->delete($delquery);
        if ($deldata) {
            $msg = "<span class='success'>Product Deleted Successfully</span> ";
            return $msg;
        } else {
            $msg = "<span class='error'>Delete Product Failed</span> ";
            return $msg;
        }
    }

    public function get_all_product()
    {
        $query = "SELECT * FROM products_table ORDER BY product_id DESC";
        $result = $this->db->select($query);
        return $result;
    }
    public function get_product_details($id)
    {
        $query = "SELECT products_table.*, category_table.category_name FROM products_table INNER JOIN category_table ON products_table.cate_id = category_table.category_id AND products_table.product_id = '$id' ORDER BY products_table.product_id DESC";
        $result = $this->db->select($query);
        return $result;
    }

    public function productBySearch($search)
    {
        $query = "SELECT * FROM products_table WHERE product_name LIKE '%$search%' OR body LIKE '%$search%' ";
        $result = $this->db->select($query);
        return $result;
    }
}

?>