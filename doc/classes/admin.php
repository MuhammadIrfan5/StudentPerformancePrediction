<?php


class admin
{
	private $conn;

    function __construct() {
        global $link;
        $this->conn = $link->connect();
    }

    public function ifLoggedIn()
    {
        if(isset($_SESSION['ad_email']) && isset($_SESSION['ad_id']))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
	    public function loginAdmin($param)
    {
        $stmt = $this->conn->prepare("SELECT ad_id,ad_fname,ad_email,ad_pass FROM tbl_adm WHERE ad_email = ? AND ad_pass = ?");
        $stmt->bind_param("ss",$param['email'],$param['pass']);
        $stmt->execute();
        $stmt->bind_result($param['id'],$param['name'],$param['email'],$param['pass']);
        $stmt->store_result();
        $stmt->fetch();
        if($stmt->num_rows == 1)
        {
            $_SESSION["ad_id"] = $param['id'];
            $_SESSION["ad_fname"] = $param['name'];
            $_SESSION['ad_email'] = $param['email'];
            $msg = header("location:pages/home.php");
			$msg = '<script>swal("Good job!", "Successfully Login!", "success");</script>';
        }
        else
        {
            $msg = '<script>swal("Oops!", "Invalid Login Detail.", "error");</script>';
        }
        $stmt->close();
        return $msg;
    }
	
}

?>