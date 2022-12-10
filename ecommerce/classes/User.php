<?php
include_once "$_SERVER[DOCUMENT_ROOT]/ecommerce/Lib/db.php";
include_once "$_SERVER[DOCUMENT_ROOT]/ecommerce/format/Format.php";
?>

<?php
class User
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db   = new Database();
        $this->fm   = new Format();
    }

    public function user_register($data)
    {
        $name        =  mysqli_real_escape_string($this->db->link, $data['name']);
        $address     =  mysqli_real_escape_string($this->db->link, $data['address']);
        $city        =  mysqli_real_escape_string($this->db->link, $data['city']);
        $country     =  mysqli_real_escape_string($this->db->link, $data['country']);
        $zip         =  mysqli_real_escape_string($this->db->link, $data['zip_code']);
        $phone       =  mysqli_real_escape_string($this->db->link, $data['phone_number']);
        $email       =  mysqli_real_escape_string($this->db->link, $data['email']);
        $pass        =  mysqli_real_escape_string($this->db->link, md5($data['password']));
        if ($name == "" || $address == "" || $city == "" || $country == "" || $zip == "" || $phone == ""  || $email == ""  || $pass == "") {
            $msg = "<span class='error'>Field Must Not Be Empty</span>";
            return $msg;
        }
        $mailquery = "SELECT * FROM user_table WHERE email='$email' LIMIT 1";
        $mailchk = $this->db->select($mailquery);
        if ($mailchk != false) {
            $msg = "<span class='error'>Email Already Exist</span> ";
            return $msg;
        } else {
            $query =    "INSERT INTO user_table(name, address, city, country, zip_code, phone_number, email, password) 
                        VALUES ('$name','$address','$city','$country','$zip','$phone','$email','$pass')";
            $inserted_row = $this->db->insert($query);
            if ($inserted_row) {
                $msg = "<span class='success'>Registation Successfully</span>";
                header("Location:login.php");
                return $msg;
            } else {
                $msg = "<span class='error'>Registation Failed</span> ";
                return $msg;
            }
        }
    }

    public function user_login($data)
    {
        $email       =  mysqli_real_escape_string($this->db->link, $data['email']);
        $pass        =  mysqli_real_escape_string($this->db->link, md5($data['password']));
        if (empty($email) || empty($pass)) {
            $msg = "<span class='error'>Field Must Not be empty</span> ";
            return $msg;
        }
        $query = "SELECT * FROM user_table WHERE email = '$email' AND password = '$pass'";
        $result = $this->db->select($query);
        if ($result != false) {
            $value = $result->fetch_assoc();
            Session::set("user_login", true);
            Session::set("user_id", $value['user_id']);
            Session::set("user_name", $value['name']);
            header("Location:index.php");
        } else {
            $msg = "<span class='error'>Email Or Password Incorrect</span> ";
            return $msg;
        }
    }
    public function get_all_user(){
        $query = "SELECT * FROM user_table";
        $result = $this->db->select($query);
        return $result;
    }

    public function get_user_data($id)
    {
        $id = mysqli_real_escape_string($this->db->link, $id);
        $query = "SELECT * FROM user_table WHERE user_id = '$id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function user_update($data, $id)
    {
        $id          =  mysqli_real_escape_string($this->db->link, $id);
        $name        =  mysqli_real_escape_string($this->db->link, $data['name']);
        $address     =  mysqli_real_escape_string($this->db->link, $data['address']);
        $city        =  mysqli_real_escape_string($this->db->link, $data['city']);
        $country     =  mysqli_real_escape_string($this->db->link, $data['country']);
        $zip         =  mysqli_real_escape_string($this->db->link, $data['zip_code']);
        $phone       =  mysqli_real_escape_string($this->db->link, $data['phone_number']);

        if ($name == "" || $address == "" || $city == "" || $country == "" || $zip == "" || $phone == "") {
            $msg = "<span class='error'>Field Must Not be empty</span>";
            return $msg;
        } else {
            $query = "UPDATE user_table
                SET
                name 		= '$name',
                address 	= '$address',
                city 		= '$city',
                country 	= '$country',
                zip_code 		= '$zip',
                phone_number		= '$phone'
                WHERE user_id    = '$id'";
            $update_row  = $this->db->update($query);
            if ($update_row) {
                $msg = "<span class='success'>User Data Updated Successfully</span> ";
                header("Location:profile.php");
                return $msg;
            } else {
                $msg = "<span class='error'>User Data Not Updated</span>";
                return $msg;
            }
        }
    }
}
?>