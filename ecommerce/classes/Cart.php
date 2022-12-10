<?php
include_once "$_SERVER[DOCUMENT_ROOT]/ecommerce/Lib/Session.php";
include_once "$_SERVER[DOCUMENT_ROOT]/ecommerce/format/Format.php";
?>

<?php
class Cart
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db   = new Database();
        $this->fm   = new Format();
    }

    public function add_to_cart($quantity, $id)
    {
        $quantity = $this->fm->validation($quantity);
        $quantity =  mysqli_real_escape_string($this->db->link, $quantity);
        $product_id =  mysqli_real_escape_string($this->db->link, $id);
        $session_id = session_id();

        $squery = "SELECT * FROM products_table WHERE product_id = '$product_id'";
        $result = $this->db->select($squery)->fetch_assoc();

        $product_name = $result['product_name'];
        $price = $result['price'];
        $image = $result['image'];

        $chquery = "SELECT * FROM cart_table WHERE product_id = '$product_id' AND session_id ='$session_id'";
        $get_product = $this->db->select($chquery);
        if ($get_product) {
            $msg = "Product Already Added!";
            return $msg;
        } else {
            $query =    "INSERT INTO cart_table(session_id, product_id, product_name, price, quantity, image) 
                        VALUES ('$session_id','$product_id','$product_name','$price','$quantity','$image')";

            $inserted_row = $this->db->insert($query);
            if ($inserted_row) {
                header("Location:cart.php");
            } else {
                header("Location:404.php");
            }
        }
    }

    public function get_cart_items()
    {
        $sess_id = session_id();
        $query = "SELECT * FROM cart_table WHERE session_id = '$sess_id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function del_cart_items($id)
    {
        $id =  mysqli_real_escape_string($this->db->link, $id);
        $query = "DELETE FROM cart_table WHERE product_id ='$id'";
        $deldata = $this->db->delete($query);
        if ($deldata) {
            echo "<script>window.location = 'cart.php';</script> ";
        } else {
            $msg = "<span class='error'>Product Not Deleted .</span> ";
            return $msg;
        }
    }

    public function clear_user_cart()
    {
        $session_id = session_id();
        $query = "DELETE FROM cart_table WHERE session_id ='$session_id'";
        $this->db->delete($query);
    }
    public function add_to_order($user_id)
    {
        $session_id = session_id();
        $query = "SELECT * FROM cart_table WHERE session_id ='$session_id' ";
        $getPro = $this->db->select($query);
        if ($getPro) {
            while ($result = $getPro->fetch_assoc()) {
                $product_id     = $result['product_id'];
                $product_name   = $result['product_name'];
                $quantity      = $result['quantity'];
                $price         = $result['price'];
                $image         = $result['image'];
                $query = "INSERT INTO order_table(user_id, product_id, product_name, quantity, price, image) 
                        VALUES ('$user_id','$product_id','$product_name','$quantity','$price','$image')";

                $inserted_row = $this->db->insert($query);
            }
        }
    }

    public function get_order_detail($user_id)
    {
        $query = "SELECT * FROM order_table WHERE user_id ='$user_id' ORDER BY product_id DESC ";
        $result = $this->db->select($query);
        return $result;
    }

    public function get_all_ordered()
    {
        $query = "SELECT * FROM order_table ORDER BY id";
        $result = $this->db->select($query);
        return $result;
    }


    public function productShifted($id, $price)
    {
        $id =  mysqli_real_escape_string($this->db->link, $id);
        $price =  mysqli_real_escape_string($this->db->link, $price);
        $query = "UPDATE order_table
                      SET
                      status = '1'
                      WHERE user_id = '$id' AND price='$price'";
        $update_row  = $this->db->update($query);
        if ($update_row) {
            $msg = "<span class='success'>Updated Successfully.</span> ";
            return $msg;
        } else {
            $msg = "<span class='error'>Not Updated .</span> ";
            return $msg;
        }
    }

    public function delproductShifted($id, $price)
    {
        $id =  mysqli_real_escape_string($this->db->link, $id);
        $price =  mysqli_real_escape_string($this->db->link, $price);
        $query = "DELETE FROM order_table WHERE user_id = '$id' AND price='$price'";
        $deldata = $this->db->delete($query);
        if ($deldata) {
            $msg = "<span class='success'>Data Deleted Successfully</span> ";
            return $msg;
        } else {
            $msg = "<span class='error'>Data Not Deleted</span> ";
            return $msg;
        }
    }
}
?>