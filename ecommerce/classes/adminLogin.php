<?php
    include_once '../Lib/Session.php';
    include_once '../Lib/db.php';
    include_once '../format/Format.php';
	Session::init();
?>

<?php

class Adminlogin {
	private $db;
	private $fm;

    public	function __construct(){
       $this->db   = new Database();
       $this->fm   = new Format();		 
	}

    public function adminLogin($admin_user, $admin_password){
    	$admin_user = $this->fm->validation($admin_user);
    	$admin_password = $this->fm->validation($admin_password);

    	$admin_user =  mysqli_real_escape_string($this->db->link, $admin_user);
    	$admin_password =  mysqli_real_escape_string($this->db->link, $admin_password);

    	if (empty($admin_user) || empty($admin_password)){
            $loginmsg = "Username or Password must not be empty";
            return $loginmsg;
    	}
		else {
    		$query = "SELECT * FROM admin_table WHERE admin_user='$admin_user' AND admin_passwd='$admin_password'";
    		$result = $this->db->select($query);
    		if ($result != false) {
    			$value = $result->fetch_assoc();
    			Session::set("adminlogin", true);
    			Session::set("admin_id", $value['admin_id']);
    			Session::set("admin_user", $value['admin_user']);
    			Session::set("admin_name", $value['admin_name']);
    			header("Location:dashboard.php");
    		}
			else {
    			$login_msg = "Username or password is incorrect !!";
    			return $login_msg;
    		}
    	}

    }
}
?>