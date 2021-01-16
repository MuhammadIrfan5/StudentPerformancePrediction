<?php

class instructor{
	
	private $con;

    function __construct() {
        global $DB;
        $this->con = $DB->connect();
    }

    public function ifLoggedIn()
    {
        if(isset($_SESSION['inst_email']) && isset($_SESSION['inst_id']))
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
		//global $DB;
        $stmt = $this->con->prepare("SELECT inst_id,inst_fname,inst_email,inst_password,inst_lname,inst_regno,inst_gender FROM instructor WHERE inst_email = ? AND inst_password = ?");
        $stmt->bind_param("ss",$param['email'],$param['pass']);
        $stmt->execute();
        $stmt->bind_result($param['id'],$param['name'],$param['email'],$param['pass'],$param['lname'],$param['regno'],$param['gender']);
        $stmt->store_result();
        $stmt->fetch();
        if($stmt->num_rows == 1)
        {
            $_SESSION["inst_id"] = $param['id'];
            $_SESSION["inst_fname"] = $param['name'];
            $_SESSION["inst_lname"] = $param['lname'];
            $_SESSION['inst_email'] = $param['email'];
            $_SESSION['inst_password'] = $param['pass'];
            $_SESSION['inst_regno'] = $param['regno'];
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
	
	public function add_instructor($inst){
		$fname = $inst["fname"];
		$lname = $inst["lname"];
		$email = $inst["email"];
		$pass = $inst["pass"];
		$rpass = $inst["rpass"];
		//$loc = $user["location"];
		if($this->isvalid_email($email))
			{
				if(strcmp($pass,$rpass))
					{
						$query = "INSERT INTO `instructor`(`inst_fname`, `inst_lname`, `inst_email`, `inst_password`, `inst_regno`, `inst_gender`, `inst_status`, `inst_image_path`)
						VALUES('$fname','$lname','$email','$pass','','','1','')";
						if($this->con->query($query))
						{
							echo '<script>swal("Good job!","Instructor Registered!","success");</script>';
						}
						else
						{
							echo '<script>swal("Oops!","Registration Failed!","error");</script>';
						}
					}
					else
					{
							echo '<script>swal("Oops!","Password Does not match","error");</script>';
					}
			}
			else
			{
				echo '<script>swal("Oops!","Email Already Exist!","error");</script>';
			}
	}
	//user email checking
	function isvalid_email($email)
	{
		$return = true;
		$query = "select * from instructor where inst_email = '$email'";
		$r = $this->con->query($query);
		if(mysqli_num_rows($r)>0)
		{
			$return = false;
		}
		return $return;
	}
	
	//email already exist
	function isalready_email($con,$email)
	{
	    $return = true;
		$query = "select * from instructor where inst_email = '$email'";
		$r = $con->query($query);
		if(mysqli_num_rows($r)>0)
		{
			$return = false;
		}
		return $return;
	}
	
	function notify($msg,$succ)
	{
		$notif = '<script>$.notify("'.$msg.'", "'.$succ.'");</script>';
		echo $notif;
	}
	
	function get_instructor_by_id($i_id)
	{
		$inst="";
		$q="SELECT * FROM instructor where inst_id = '$i_id'";
		$result=$this->con->query($q);
		if(mysqli_num_rows($result) > 0)
		{
			while($row=mysqli_fetch_assoc($result))
			{
				$inst = array(
						
						"inst_fname" => $row["inst_fname"],
						"inst_lname" => $row["inst_lname"],
						"inst_email" => $row["inst_email"],
						"inst_password" => $row["inst_password"],
						"inst_regno" => $row["inst_regno"],
						"inst_gender" => $row["inst_gender"],
						"inst_address" => $row["inst_address"],
						"inst_status" => $row["inst_status"],
						"inst_mobile" => $row["inst_mobile"],
						"inst_image_path"=> $row['inst_image_path']
				);
			}
		}
		return $inst;
	}
	
	public function edit_instructor($inst,$session_id)
	{
		$inst_fname = $inst["inst_fname"];
		$inst_lname = $inst["inst_lname"];
		$inst_email = $inst["inst_email"];
		$inst_password = $inst["inst_password"];
		$inst_regno = $inst["inst_regno"];
		$inst_gender = $inst["inst_gender"];
		$inst_mobile = $inst["inst_mobile"];
		$inst_dob = $inst["inst_dob"];
		$inst_address = $inst["inst_address"];
		
			$query = "UPDATE `instructor` SET `inst_fname`='$inst_fname',`inst_lname`='$inst_lname',`inst_email`='$inst_email ',`inst_password`='$inst_password',`inst_regno`='$inst_regno',`inst_gender`='$inst_gender',`inst_mobile`='$inst_mobile',`inst_dob`='$inst_dob',`inst_address`='$inst_address',`inst_sts`='1',`inst_image_path`='abc' WHERE `inst_id`='$session_id'";
			if($this->con->query($query))
			{
				echo '<script>swal("Good job!","Profile Successfully Updated!","success");</script>';
				
			}
			else
			{
				echo '<script>swal("Oops!","profile update failed!","error");</script>';
			}
	}
	
	public function list_instructor($session_id)
	{
		$return = "";
		//$query = "select * from tb_mn";
		$query= "SELECT `inst_id`, `inst_fname`, `inst_lname`, `inst_email`, `inst_password`, `inst_regno`, `inst_gender`, `inst_mobile`, `inst_dob`, `inst_address`, `inst_status`, `inst_image_path` FROM `instructor` WHERE inst_id='$session_id'";
		$r = $this->con->query($query);
		if(mysqli_num_rows($r)>0)
		{
			while($row =mysqli_fetch_assoc($r))
			{
				$return .= '<tr>
								<td>'.$row["inst_fname"].'</td>
								<td>'.$row["inst_lname"].'</td>
								<td>'.$row["inst_email"].'</td>
								<td>'.$row["inst_password"].'</td>
								<td>'.$row["inst_regno"].'</td>
								<td>'.$row["inst_gender"].'</td>
								<td>'.$row["inst_mobile"].'</td>
								<td>'.$row["inst_dob"].'</td>
								<td>'.$row["inst_address"].'</td>	
								<td class="datatable-ct"><a href="profile.php?id='.$row['inst_id'].'" ><i class="fa fa-check"></i></a></td>
							</tr>';
							//<td><a href="profile.php?id='.$row['inst_id'].'" ><i class="fa fa-pencil edit_instructor"></i></a></td>
							//<td><i id = "'.$row['inst_id'].'" class = "fa fa-delete btn_delete" 								
			}
		}
		return $return;
	}
	
}
?>