<?php

class course
{
	private $con;

    function __construct() {
        global $DB;
        $this->con = $DB->connect();
    }
	
	// listing department in  drop down
	function list_department_dropdown()
	{
		$return = "";
		$query="select * from tbl_department";
		$result=$this->con->query($query);
		if(mysqli_num_rows($result) > 0)
		{
			while($r = mysqli_fetch_assoc($result))
			{
				$return .= "<option value='".$r['dep_title']."'>".$r['dep_title']."</option>";
			}
		}
		return $return;
	}
	
	// listing department w.r.t course in  drop down
	/*function list_department_course_dropdown($dep_title)
	{
		$return = "";
		$query="SELECT d.dep_title from tbl_department d INNER JOIN tbl_course c ON d.dep_title='$dep_title'";
		$result=$this->con->query($query);
		if(mysqli_num_rows($result) > 0)
		{
			while($r = mysqli_fetch_assoc($result))
			{
				$return .= "<option value='".$r['dep_title']."'>".$r['dep_title']."</option>";
			}
		}
		return $return;
	}*/
	
	// listing Course by professor id in  drop down
	function list_course_dropdown($prof_id)
	{
		$return = "";
		$query="select * from tbl_course where course_prof='$prof_id'";
		$result=$this->con->query($query);
		if(mysqli_num_rows($result) > 0)
		{
			while($r = mysqli_fetch_assoc($result))
			{
				$return .= "<option value='".$r['course_id']."'>".$r['course_name']."</option>";
			}
		}
		return $return;
	}
	
	//adding course
	/*public function add_course($cour,$inst_id)
	{
		$coursename = $cour["coursename"];
		$coursecode = $cour["coursecode"];
		$dep_title = $cour["dep_title"];
		$coursetime = $cour["coursetime"];
		//$inst_name = $cour["inst_name"];
		$course_days = implode(',',$cour["course_days"]);
		//$loc = $user["location"];
		if($this->isvalid_time($coursetime,$course_days,$coursecode))
		{
				$query = "INSERT INTO `tbl_course`(`course_name`, `course_code`, `course_dep`, `course_time`, `course_prof`, `course_days`)
					VALUES('$coursename','$coursecode','$dep_title','$coursetime','$inst_id','$course_days')";
					if($this->con->query($query))
					{
						echo '<script>swal("Good job!","Course Registered!","success");</script>';
					}
					else
					{
						echo '<script>swal("Oops!","Registration Failed!","error");</script>';
					}
		}
		else
		{
			echo '<script>swal("Oops!","Time and days Clash!","error");</script>';
		}
	}*/
	
	/*function isvalid_time($time,$course_days,$coursecode)
	{
		$return = true;
		$query = "select * from tbl_course where course_time= '$time' AND course_days='$course_days' AND course_code='$coursecode'";
		$r = $this->con->query($query);
		if(mysqli_num_rows($r)>0)
		{
			$return = false;
		}
		return $return;
	}
	*/
	public function list_my_course($std_id)
	{
		$return = "";
		//$query = "select * from tb_mn";
		$query= "select sc.course_id,c.course_name from studentclass sc INNER JOIN tbl_course c on sc.course_id=c.course_id where sc.Std_id='$std_id' ";
		$r = $this->con->query($query);
		if(mysqli_num_rows($r)>0)
		{
			
			while($row =mysqli_fetch_assoc($r))
			{
				$return .= '
				<li>
                            <a class="has-arrow" href="my_courses.php?id='.$row['course_id'].'" aria-expanded="false"><span class="educate-icon educate-interface icon-wrap"></span> <span class="mini-click-non">'.$row["course_name"].'</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="Announcements" href="announcement_student.php?id='.$row['course_id'].'"><span class="mini-sub-pro">Announcements</span></a></li>
                                <li><a title="Quiz" href="quiz_student.php?id='.$row['course_id'].'"><span class="mini-sub-pro">Quiz</span></a></li>
                                <li><a title="MidTerm" href="mid_student.php?id='.$row['course_id'].'"><span class="mini-sub-pro">MidTerm</span></a></li>
                                <li><a title="Assignments" href="assignment_student.php?id='.$row['course_id'].'"><span class="mini-sub-pro">Assignments</span></a></li>
                                <li><a title="Emails" href=""><span class="mini-sub-pro">Emails</span></a></li>
                             </ul>
                        </li>
	
				';
			}
		}
		return $return;
	}
	
	public function get_course_by_id($c_id)
	{
		$course="";
		$q="SELECT * FROM tbl_course where course_id = '$c_id'";
		$result=$this->con->query($q);
		if(mysqli_num_rows($result) > 0)
		{
			while($row=mysqli_fetch_assoc($result))
			{
				$course = array(
						
						"course_name" => $row["course_name"],
						"course_code" => $row["course_code"],
						"course_dep" => $row["course_dep"],
						"course_time" => $row["course_time"],
						"course_prof" => $row["course_prof"],
						"course_days" => explode(',',$row["course_days"],1)
				);
			}
		}
		return $course;
	}
	
	/*public function edit_course($cour,$inst_name)
	{
		$id = $cour["id"];
		$coursename = $cour["coursename"];
		$coursecode = $cour["coursecode"];
		$dep_title = $cour["dep_title"];
		$coursetime = $cour["coursetime"];
		//$inst_name = $cour["inst_name"];
		$course_days = implode(',',$cour["course_days"]);
		if($this->isvalid_time($coursetime,$course_days,$coursecode))
		{
			$query = "UPDATE `tbl_course` SET `course_name`='$coursename',`course_code`='$coursecode',`course_dep`='$dep_title ',`course_time`='$coursetime',`course_prof`='$inst_name',`course_days`='$course_days' WHERE `course_id` ='$id'";
			if($this->con->query($query))
			{
				echo '<script>swal("Good job!","Course Successfully Updated!","success");</script>';
				
			}
			else
			{
				echo '<script>swal("Oops!","Course update failed!","error");</script>';
			}
		}
		else
		{
			echo '<script>swal("Oops!","Time and days Clash!","error");</script>';
		}
	}*/
		
}

