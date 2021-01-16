<?php
 class student
 {
	 private $con;

    function __construct() {
        global $DB;
        $this->con = $DB->connect();
    }

    public function ifLoggedIn()
    {
        if(isset($_SESSION['std_email']) && isset($_SESSION['std_id']))
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
        $stmt = $this->con->prepare("SELECT std_id,std_fname,std_lname,std_email,std_password,std_regno,std_gender,std_image_path FROM student WHERE std_email = ? AND std_password = ?");
        $stmt->bind_param("ss",$param['email'],$param['pass']);
        $stmt->execute();
		$result=array();
        $stmt->bind_result($result['std_id'],$result['std_fname'],$result['std_lname'],$result['std_email'],$result['std_password'],$result['std_regno'],$result['std_gender'],$result['std_image_path']);
        $stmt->store_result();
        $stmt->fetch();
        if($stmt->num_rows == 1)
        {
            $_SESSION["std_id"] = $result['std_id'];
            $_SESSION["std_fname"] = $result['std_fname'];
            $_SESSION["std_lname"] = $result['std_lname'];
            $_SESSION['std_email'] = $result['std_email'];
            $_SESSION['std_password'] = $result['std_password'];
            $_SESSION['std_regno'] = $result['std_regno'];
            $_SESSION['std_image_path'] = $result['std_image_path'];
            //echo "successfully loged in";
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
	
	public function student_course($course_code,$std_id)
	{
		$result;
		$course_code = $course_code;
		$query = "select * from tbl_course where course_code='$course_code' ";
		$result=$this->con->query($query);
		if(mysqli_num_rows($result)>0)
		{
			while($row=mysqli_fetch_assoc($result))
			{
				$course_id=$row['course_id'];
				$query = "INSERT INTO `studentclass`(`Std_id`, `course_id`) VALUES ('$std_id','$course_id')";
				$r=$this->con->query($query);
				if($r)
				{
					echo '<script>swal("Good job!","Course Successfully registered!","success");</script>';
				}
				else
				{
						echo '<script>swal("Opps!","Course Not registered!","error");</script>';
				}
					
			}
		}
		else
		{
			echo '<script>swal("Oops!","Registration Failed!","error");</script>';
		}
	}
	
	public function register_student($std)
	{
		$fname = $std["fname"];
		$lname = $std["lname"];
		$email = $std["email"];
		$pass = $std["pass"];
		$rpass = $std["rpass"];
		if($this->isvalid_email($email))
			{
				if($pass == $rpass)
					{
						$query = "INSERT INTO `student`(`std_fname`, `std_lname`, `std_email`, `std_password`, `dept_id`, `std_image_path`, `std_regno`, `std_gender`, `std_address`, `std_mobile`, `std_status`)
						VALUES('$fname','$lname','$email','$pass','','','','','','','1')";
						if($this->con->query($query))
						{
							echo '<script>swal("Good job!","Successfully Registered!","success");</script>';
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
		$query = "select * from student where std_email = '$email'";
		$r = $this->con->query($query);
		if(mysqli_num_rows($r)>0)
		{
			$return = false;
		}
		return $return;
	}
	function get_student_by_id($std_id)
	{
		$std="";
		$q="SELECT *,d.dep_title from student s INNER JOIN tbl_department d on s.dept_id = d.dep_id where std_id = '$std_id'";
		$result=$this->con->query($q);
		if(mysqli_num_rows($result) > 0)
		{
			while($row=mysqli_fetch_assoc($result))
			{
				$std = array(
						
						"std_fname" => $row["std_fname"],
						"std_lname" => $row["std_lname"],
						"std_email" => $row["std_email"],
						"std_password" => $row["std_password"],
						"dept_id" => $row["dept_id"],
						"dep_title" => $row["dep_title"],
						"std_regno" => $row["std_regno"],
						"std_image_path" => $row["std_image_path"],
						"std_gender" => $row["std_gender"],
						"std_address" => $row["std_address"],
						"std_mobile" => $row["std_mobile"],
						"std_status"=> $row['std_status']
				);
			}
		}
		return $std;
	}
	
	//edit_profile
	public function edit_profile($std,$id)
	{
		//$id=$std["std_id"];
		$std_fname = $std["std_fname"];
		$std_lname = $std["std_lname"];
		$std_email = $std["std_email"];
		$std_password=$std["std_password"];
		$dept_id=$std["dept_id"];
		$std_regno=$std["std_regno"];
		$std_gender=$std["std_gender"];
		$std_address=$std["std_address"];
		$std_mobile=$std["std_mobile"];
		$std_image_path = $std["std_image_path"];
		/*$imagetype=$_FILES['std_image_path'];
		$imagesize=$_FILES['std_image_path'];
		$tempname=$_FILES['std_image_path'];*/
		$std_image_path = $this->image_upload($std_image_path);
		   
		if(strlen($std_password) >= 8)
					{
						$query = "UPDATE `student` SET `std_fname`='$std_fname',`std_lname`='$std_lname',`std_email`='$std_email',`std_password`='$std_password',`dept_id`='$dept_id',`std_image_path`='$std_image_path',`std_regno`='$std_regno',`std_gender`='$std_gender',`std_address`='$std_address',`std_mobile`='$std_mobile',`std_status`='1' WHERE std_id='$id' ";
						if($this->con->query($query))
						{
							echo '<script>swal("Good job!","Successfully Edit!","success");</script>';
						}
						else
						{
							echo '<script>swal("Oops!","Edit Failed!","error");</script>';
						}
					}
					else
					{
							echo '<script>swal("Oops!","Password length to short","error");</script>';
					}
	}
	public function image_upload($std_image_path)
	{
		$target_dir = "../img/profile_pics/";
		if($std_image_path["name"] !="")
		{
			$target_file = $target_dir . basename($std_image_path["name"]);
			$uploadOk = true;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			move_uploaded_file($std_image_path["tmp_name"], $target_file);
		}
		else
		{
			$target_file = $target_dir."avatar4.png";
		}
		$target_file =''.$target_file;
		return $target_file;
	}
	public function delete_image_std($std_id)
	{
		$std="";
		$q="SELECT std_image_path FROM student where std_id = '$std_id'";
		$result=$this->con->query($q);
		if(mysqli_num_rows($result) > 0)
		{
			while($row=mysqli_fetch_assoc($result))
			{
				$std = array(
						"std_image_path" => $row["std_image_path"],
				);
			}
			$path=$std['std_image_path'];
			$query = "UPDATE `student` SET `std_image_path`='../img/profile_pics/blank-person-icon-9.jpg' where std_id = '$std_id'";
			if($this->con->query($query))
			{
				if(!unlink($path))
				{
					echo '<script>swal("Oops!","Error!","error");</script>';
				}
				else
				{
					echo '<script>swal("Good job!","Picture Successfully Deleted!","success");</script>';
				}
			}
			else
			{
				echo '<script>swal("Oops!","Error!","error");</script>';
			}	
		}
		return $std;
	}
	//image upload
	public function r_image_upload($std_image_path,$imagetype,$imagesize)
	{
		$target_dir = "img/profile_pics/";
		if($std_image_path["name"] !="")
		{
			if($imagetype == "image/jpeg" or $imagetype == "image/png" or $imagetype == "image/jpg"  )
		   {
			 if($imagesize <= 500000)
			 {
				//move_uploaded_file($tempname, "images/$postimage");
				$target_file = $target_dir . basename($std_image_path["name"]);
				$uploadOk = true;
				$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
				move_uploaded_file($std_image_path["tmp_name"], $target_file);
			 }
			 else
			 {
				 echo '<script>swal("Oops!","image is greater then 50kb !","error");</script>';
			 }
		   }
		   else
		   {
			   echo '<script>swal("Oops!","image type is invalid  !","error");</script>';
		   }
		}
		else
		{
			$target_file = $target_dir."c5.png";
		}
		$target_file ='fyp_new/student/'.$target_file;
		return $target_file;
		
	}

	//get genral_info by idat
	function get_gen_info_by_id($pred_id)
	{
		$std="";
		$q="SELECT * FROM tbl_prediction where pred_id = '$pred_id'";
		$result=$this->con->query($q);
		if(mysqli_num_rows($result) > 0)
		{
			while($row=mysqli_fetch_assoc($result))
			{
				$std = array(
						
						'gender' => $row["gender"],
						'age' => $row["age"],
						'fam_size' => $row["fam_size"],
						'father_edu' => $row["father_edu"],
						'mother_edu' => $row["mother_edu"],
						'father_emp' => $row["father_emp"],
						'mother_emp' => $row["mother_emp"],
						'time_travel_uni' => $row["time_travel_uni"],
						'hobby' => $row["hobby"],
						'free_time_act' => $row["free_time_act"],
						'go_out_fam' => $row["go_out_fam"],
						'health' => $row["health"],
						'absence_last_sem' => $row["absence_last_sem"],
						'board_edu' => $row["board_edu"],
						'plan_to_study' => $row["plan_to_study"],
						'plan_to_work' => $row["plan_to_work"],
						'any_addiction' => $row["any_addiction"],
						'cgpa_last_sem' => floatval($row["cgpa_last_sem"]),
						'percent_quiz_lastsem' => $row["percent_quiz_lastsem"],
						'percent_sessional_lastsem' => $row["percent_sessional_lastsem"],
						'clear_last_sem' => $row["clear_last_sem"],
						'any_parttime_job' => $row["any_parttime_job"]
				);
			}
		}
		return $std;
	}
	//user email checking
	function student_id_already_exist($student_id)
	{
		$return = true;
		$query = "select * from tbl_prediction where student_id = '$student_id'";
		$r = $this->con->query($query);
		if(mysqli_num_rows($r)>0)
		{
			$return = false;
		}
		return $return;
	}
	public function student_genral_info($std,$student_id)
	{
		(int)$gender = $std["gender"];
		(int)$age = $std["age"];
		(int)$fam_size = $std["fam_size"];
		(int)$father_edu = $std["father_edu"];
		(int)$mother_edu = $std["mother_edu"];
		(int)$father_emp = $std["father_emp"];
		(int)$mother_emp = $std["mother_emp"];
		(int)$time_travel_uni = $std["time_travel_uni"];
		(int)$hobby = $std["hobby"];
		(int)$free_time_act = $std["free_time_act"];
		(int)$go_out_fam = $std["go_out_fam"];
		(int)$health = $std["health"];
		(int)$absence_last_sem = $std["absence_last_sem"];
		(int)$board_edu = $std["board_edu"];
		(int)$plan_to_study = $std["plan_to_study"];
		(int)$plan_to_work = $std["plan_to_work"];
		(int)$any_addiction = $std["any_addiction"];
		$cgpa_last_sem = $std["cgpa_last_sem"];
		(int)$percent_quiz_lastsem = $std["percent_quiz_lastsem"];
		(int)$percent_sessional_lastsem = $std["percent_sessional_lastsem"];
		(int)$clear_last_sem = $std["clear_last_sem"];
		(int)$any_parttime_job = $std["any_parttime_job"];
		$std_id=$_SESSION['std_id'];
		
			$query = "INSERT INTO `tbl_prediction`(`gender`, `age`, `fam_size`, `father_edu`, `mother_edu`, `father_emp`, `mother_emp`, `time_travel_uni`, `hobby`, `free_time_act`, `go_out_fam`, `health`, `absence_last_sem`, `board_edu`, `plan_to_study`, `plan_to_work`, `any_addiction`, `cgpa_last_sem`, `percent_quiz_lastsem`, `percent_sessional_lastsem`, `clear_last_sem`, `any_parttime_job`, `student_id`)
			VALUES('$gender','$age','$fam_size','$father_edu','$mother_edu','$father_emp','$mother_emp','$time_travel_uni','$hobby','$free_time_act','$go_out_fam','$health','$absence_last_sem','$board_edu','$plan_to_study','$plan_to_work','$any_addiction','$cgpa_last_sem','$percent_quiz_lastsem','$percent_sessional_lastsem','$clear_last_sem','$any_parttime_job','$student_id')";
			if($this->con->query($query))
			{
				echo '<script>swal("Good job!","Successfully Filled!","success");</script>';
			}
			else
			{
				echo '<script>swal("Oops!","Failed!","error");</script>';
			}
			
	}
	
	public function edit_gen_info($std,$student_id)
	{
		$id = $std["id"];
		(int)$gender = $std["gender"];
		(int)$age = $std["age"];
		(int)$fam_size = $std["fam_size"];
		(int)$father_edu = $std["father_edu"];
		(int)$mother_edu = $std["mother_edu"];
		(int)$father_emp = $std["father_emp"];
		(int)$mother_emp = $std["mother_emp"];
		(int)$time_travel_uni = $std["time_travel_uni"];
		(int)$hobby = $std["hobby"];
		(int)$free_time_act = $std["free_time_act"];
		(int)$go_out_fam = $std["go_out_fam"];
		(int)$health = $std["health"];
		(int)$absence_last_sem = $std["absence_last_sem"];
		(int)$board_edu = $std["board_edu"];
		(int)$plan_to_study = $std["plan_to_study"];
		(int)$plan_to_work = $std["plan_to_work"];
		(int)$any_addiction = $std["any_addiction"];
		$cgpa_last_sem = $std["cgpa_last_sem"];
		(int)$percent_quiz_lastsem = $std["percent_quiz_lastsem"];
		(int)$percent_sessional_lastsem = $std["percent_sessional_lastsem"];
		(int)$clear_last_sem = $std["clear_last_sem"];
		(int)$any_parttime_job = $std["any_parttime_job"];
		$std_id=$_SESSION['std_id'];
			
			$query="UPDATE `tbl_prediction` SET `gender`='$gender',`age`='$age',`fam_size`='$fam_size',`father_edu`='$father_edu',`mother_edu`='$mother_edu',`father_emp`='father_emp',`mother_emp`='$mother_emp',`time_travel_uni`='$time_travel_uni',`hobby`='$hobby',`free_time_act`='$free_time_act',`go_out_fam`='$go_out_fam',`health`='$health',`absence_last_sem`='$absence_last_sem',`board_edu`='$board_edu',`plan_to_study`='$plan_to_study',`plan_to_work`='$plan_to_work',`any_addiction`='$any_addiction',`cgpa_last_sem`='$cgpa_last_sem',`percent_quiz_lastsem`='$percent_quiz_lastsem',`percent_sessional_lastsem`='$percent_sessional_lastsem',`clear_last_sem`='$clear_last_sem',`any_parttime_job`='$any_parttime_job',`student_id`='$student_id' WHERE pred_id='$id'";
			if($this->con->query($query))
			{
				echo '<script>swal("Good job!","Successfully Updated!","success");</script>';
			}
			else
			{
				echo '<script>swal("Oops!","Failed to update!","error");</script>';
			}
	}
	
	/*public function view_genral_info_by_id($std_id)
	{
		$return =""; 
		$query="select * from tbl_prediction where student_id='$std_id'";
		$r = $this->con->query($query);
		if(mysqli_num_rows($r)>0)
		{
			while($row =mysqli_fetch_assoc($r))
			{
				$return .= 
				'
				<h4>Student Name:</h4></h3> '.$_SESSION['std_fname'].'</h3>
				<p>age: '.$row["age"].'</p>
				'
				
				if($row["mother_edu"] == 1)
				{
						'<p>Mother Education: Primary Education </p>'
				}
				else if($row["father_edu"] == 1)
				{
					'<p>Father Education: Primary Education </p>'
				}
				else
				{
					'<p>Father Education: Secondary Education </p>'
				}
				'
				;								
			}
		}
		return $return;
	}*/
	//email validate and sanitize
	function sanitize_my_email($email) {
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
		} else {
			return false;
		}
	}
	
	//forgot password
	public function forgot_password($email)
	{
		$std="";
		$q="SELECT * FROM student where std_email = '$email'";
		$result=$this->con->query($q);
		if(mysqli_num_rows($result) > 0)
		{
			while($row=mysqli_fetch_assoc($result))
			{
				$std = array(
						"std_email" => $row["std_email"],
						"std_password" => $row["std_password"]
				);
			}
				$to_email =$email;
				$subject = 'Testing PHP Mail';
				$message = $row["std_password"];
				$headers = 'From: muhammadirfan5891@gmail.com';
				//check if the email address is invalid $secure_check
				$secure_check = $this->sanitize_my_email($to_email);
				if ($secure_check == false)
				{
					echo '<script>swal("Oops!","Invalid input!","error");</script>';
				} 
				else
				{ //send email 
					mail($to_email, $subject, $message, $headers);
					echo '<script>swal("Good job!","Password has been mailed to your email.","success");</script>';
				}
		}
		return $std;
	}
	
}
 
?>