<?php
class admin
{
	private $con;

    function __construct() {
        global $DB;
        $this->con = $DB->connect();
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
	
	public function loginAdmin($params)
    {
        $stmt = $this->con->prepare("select ad_id,ad_fname,ad_lname,ad_email,gender,ad_title,ad_img,ad_pass,ad_sts from tbl_adm WHERE ad_email = ? AND ad_pass = ?");
		//if($this->sanitize_my_email($param['ad_email']))
		//{
			$stmt->bind_param("ss",$params['email'],$params['pass']);
			$stmt->execute();
			//$param=array();
			$stmt->bind_result($param['ad_id'],$param['ad_fname'],$param['ad_lname'],$param['ad_email'],$param['gender'],$param['ad_title'],$param['ad_img'],$param['ad_pass'],$param['ad_sts']);
			$stmt->store_result();
			$stmt->fetch();
			if($stmt->num_rows == 1)
			{
				$_SESSION["ad_id"] = $param['ad_id'];
				$_SESSION["ad_fname"] = $param['ad_fname'];
				$_SESSION["ad_lname"] = $param['ad_lname'];
				$_SESSION['ad_email'] = $param['ad_email'];
				$_SESSION['ad_pass'] = $param['ad_pass'];
				$_SESSION['ad_title'] = $param['ad_title'];
				$_SESSION['ad_img'] = $param['ad_img'];
				$msg = header("location:pages/home.php");
				$msg = '<script>swal("Good job!", "Successfully Login!'.$param['ad_email'].'", "success");</script>';
			}
			else
			{
				$msg = '<script>swal("Oops!", "Invalid Login Detail.", "error");</script>';
			}
		/*}
		else
		{
			$msg = '<script>swal("Oops!", "Invalid Email.", "error");</script>';
		}*/
        $stmt->close();
        return $msg;
    }
	
	//email validate and sanitize
	function sanitize_my_email($ad_email) {
    $ad_email = filter_var($ad_email, FILTER_SANITIZE_EMAIL);
    if (filter_var($ad_email, FILTER_VALIDATE_EMAIL)) {
        return true;
		} else {
			return false;
		}
	}
	
}

?>