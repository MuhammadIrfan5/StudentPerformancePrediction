<?php
	//require_once '../../vendor/autoload.php';
	//use Phpml\Classification\KNearestNeighbors;
	//use Phpml\Dataset\Demo\IrisDataset;
	use Phpml\Classification\KNearestNeighbors;
	use Phpml\Math\Distance\Minkowski;
	use Phpml\CrossValidation\StratifiedRandomSplit;
	use Phpml\Dataset\Demo\WineDataset;
	use Phpml\Dataset\Demo\sppmDataset;
	use Phpml\Metric\Accuracy;
	use Phpml\Regression\SVR;
	use Phpml\SupportVectorMachine\Kernel;
	use Phpml\Regression\LeastSquares;
	use Phpml\Dataset\CsvDataset;
 ?>
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
				$return .= "<option value='".$r['dep_id']."'>".$r['dep_title']."</option>";
			}
		}
		return $return;
	}
	
	//list semester in dropdwon
	// listing department in  drop down
	function list_semester_dropdown()
	{
		$return = "";
		$query="select * from tbl_semester";
		$result=$this->con->query($query);
		if(mysqli_num_rows($result) > 0)
		{
			while($r = mysqli_fetch_assoc($result))
			{
				$return .= "<option value='".$r['sem_type']."'>".$r['sem_type']."</option>";
			}
		}
		return $return;
	}
	
	// listing department in  drop down
	function list_instructor_dropdown()
	{
		$return = "";
		$query="select * from instructor";
		$result=$this->con->query($query);
		if(mysqli_num_rows($result) > 0)
		{
			while($r = mysqli_fetch_assoc($result))
			{
				$return .= "<option value='".$r['inst_id']."'>".$r['inst_fname']." ".$r['inst_lname']."</option>";
			}
		}
		return $return;
	}
	function list_student_wrtCourse_dropdown($inst_id,$s_id)
	{
		$return = "";
		//$inst_id=$_SESSION['inst_id'];
		$query="select c.course_id,s.std_fname,s.std_lname,s.std_id from studentclass sc INNER JOIN tbl_course c on sc.course_id=c.course_id INNER JOIN student s on sc.Std_id=s.std_id WHERE c.course_prof='$inst_id' AND c.course_id='$s_id'";
		$result=$this->con->query($query);
		if(mysqli_num_rows($result) > 0)
		{
			while($r = mysqli_fetch_assoc($result))
			{
				$return .= "<option value='".$r['std_id']."'>".$r['std_fname']." ".$r['std_lname']."</option>";
			}
		}
		return $return;
	}
	
	
	
	// listing course w.r.t instructor in  drop down
	/*public function inst_course()
	{
		$query = "SELECT inst_id,inst_fname,inst_lname FROM instructor";
		$result = $this->con->query($query);
		while($row = mysqli_fetch_assoc($result))
		{
			$inst[] = array("inst_id" => $row['inst_id'], "val" => $row['inst_fname']);
		}
		$query = "SELECT course_id,course_prof,course_name, subcat FROM tbl_course";
	    $result = $this->con->query($query);
		 while($row = mysqli_fetch_assoc($result))
		 {
			$course[$row['course_prof']][] = array("course_id" => $row['course_id'], "val" => $row['course_name']);
		 }

		  $jsoninst = json_encode($inst);
		  $jsoncourse = json_encode($course);
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
	public function add_course($cour,$inst_id,$course_year)
	{
		$coursename = $cour["coursename"];
		$coursecode = $cour["coursecode"];
		$dep_title = $cour["dep_title"];
		$coursetime = $cour["coursetime"];
		$course_days = implode(',',$cour["course_days"]);
		$sem_type = $cour["sem_type"];
		//$course_year = $cour["course_year"];
		//$loc = $user["location"];
		if($this->isvalid_time($coursetime,$course_days,$coursecode))
		{
				$query = "INSERT INTO `tbl_course`(`course_name`, `course_code`, `course_dep`, `course_time`, `course_prof`, `course_days`,`sem_type`, `course_year`)
					VALUES('$coursename','$coursecode','$dep_title','$coursetime','$inst_id','$course_days','$sem_type','$course_year')";
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
			echo '<script>swal("Oops!","Time and days Clash OR Course Code!","error");</script>';
		}
	}
	
	function isvalid_time($time,$course_days,$coursecode)
	{
		$inst_id=$_SESSION['inst_id'];
		$return = true;
		$query = "select * from tbl_course where course_time= '$time' AND course_days='$course_days' AND course_code='$coursecode' AND course_prof='$inst_id' ";
		$r = $this->con->query($query);
		if(mysqli_num_rows($r)>0)
		{
			$return = false;
		}
		return $return;
	}
	
	
	public function list_course($session_id)
	{
		$return = "";
		//$query = "select * from tb_mn";
		$query= "SELECT `course_id`, `course_name`, `course_code`,d.dep_title, `course_time`, i.inst_fname , `course_days`,`sem_type` FROM tbl_course t INNER JOIN instructor i on t.course_prof=i.inst_id INNER JOIN tbl_department d on course_dep=d.dep_id Where t.course_prof='$session_id'";
		$r = $this->con->query($query);
		if(mysqli_num_rows($r)>0)
		{
			while($row =mysqli_fetch_assoc($r))
			{
				$return .= '<tr>
								<td>'.$row["course_name"].'</td>
								<td>'.$row["course_code"].'</td>
								<td>'.$row["inst_fname"].'</td>
								<td>'.$row["dep_title"].'</td>
								<td>'.$row["course_time"].'</td>
								<td>'.$row["course_days"].'</td>									
								<td>'.$row["sem_type"].'</td>									
								<td class="datatable-ct"><a href="edit_course.php?id='.$row['course_id'].'" ><i class="fa fa-check"></i></a></td>
								<td class="datatable-ct"><button id="'.$row['course_id'].'" class="btn_delete"><i class="fa fa-trash"><i/></button></td>
							</tr>';
							//<td><a href="profile.php?id='.$row['inst_id'].'" ><i class="fa fa-pencil edit_instructor"></i></a></td>
							//<td><i id = "'.$row['inst_id'].'" class = "fa fa-delete btn_delete" 		
							//
			}
		}
		return $return;
	}
	
	//delete course
	public function delete_course($course_id)
	{
		$return = false;
		$query = "delete from tbl_course where course_id = '$course_id'";
		if($this->con->query($query))
		{
			$return = true;
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
						"course_days" => explode(',',$row["course_days"],1),
						"sem_type" => $row["sem_type"],
						"course_year" => $row["course_year"],
						
				);
			}
		}
		return $course;
	}
	
	public function edit_course($cour,$inst_name,$course_year)
	{
		$id = $cour["id"];
		$coursename = $cour["coursename"];
		$coursecode = $cour["coursecode"];
		$dep_title = $cour["dep_title"];
		$coursetime = $cour["coursetime"];
		$sem_type = $cour["sem_type"];
		//$inst_name = $cour["inst_name"];
		$course_days = implode(',',$cour["course_days"]);
		if($this->isvalid_time($coursetime,$course_days,$coursecode))
		{
			$query = "UPDATE `tbl_course` SET `course_name`='$coursename',`course_code`='$coursecode',`course_dep`='$dep_title ',`course_time`='$coursetime',`course_prof`='$inst_name',`course_days`='$course_days',`sem_type`='$sem_type',`course_year`='$course_year' WHERE `course_id` ='$id'";
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
			$query = "UPDATE `tbl_course` SET `course_name`='$coursename',`course_code`='$coursecode',`course_dep`='$dep_title ',`course_time`='$coursetime',`course_prof`='$inst_name',`course_days`='$course_days',`sem_type`='$sem_type',`course_year`='$course_year' WHERE `course_id` ='$id'";
			if($this->con->query($query))
			{
				echo '<script>swal("Good job!","Course Successfully Updated!","success");</script>';
				
			}
			else
			{
				echo '<script>swal("Oops!","Course update failed!","error");</script>';
			}
			echo '<script>swal("Oops!","Already have same time and date!","error");</script>';
		}
	}
	
	public function course_reg_list($inst_id,$c_id)
	{
		$return = "";
		//$query = "select * from tb_mn";
		//$query= "select c.course_id,c.course_name,c.course_code,c.course_days,c.course_dep,s.std_id,s.std_fname,s.std_lname,s.std_regno from studentclass sc INNER JOIN tbl_course c on sc.course_id=c.course_id INNER JOIN student s on sc.Std_id=s.std_id WHERE c.course_prof='$inst_id' ";
		$query= "select sc.std_clas_id,c.course_id,c.course_name,c.course_code,c.course_days,d.dep_title,c.course_dep,s.std_id,s.std_fname,s.std_lname,s.std_regno from studentclass sc INNER JOIN tbl_course c on sc.course_id=c.course_id INNER JOIN tbl_department d on c.course_dep=d.dep_id INNER JOIN student s on sc.Std_id=s.std_id WHERE c.course_prof='$inst_id' AND c.course_id='$c_id' ";
		$r = $this->con->query($query);
		if(mysqli_num_rows($r)>0)
		{
			while($row =mysqli_fetch_assoc($r))
			{
				$return .= '<tr>
								<td>'.$row["course_name"].'</td>
								<td>'.$row["course_code"].'</td>
								<td>'.$row["course_days"].'</td>
								<td>'.$row["dep_title"].'</td>
								<td>'.$row["std_fname"].'</td>
								<td>'.$row["std_lname"].'</td>									
								<td>'.$row["std_regno"].'</td>									
								<td class="datatable-ct"><a href="edit_course.php?id='.$row['course_id'].'" ><i class="fa fa-check"></i></a></td>
								<td><p><a>Delete<i class="fa fa-trash btn_delete" id='.$row['std_clas_id'].'" onclick="unregister_student(this.id,this);"></i></a></p>	
							</tr>';
							//<td><a href="profile.php?id='.$row['inst_id'].'" ><i class="fa fa-pencil edit_instructor"></i></a></td>
							//<td><i id = "'.$row['inst_id'].'" class = "fa fa-delete btn_delete" 					
			}
		}
		return $return;
	}
	
	//Unregister a particular student form course
	public function unregister_student_course($std_clas_id)
	{
		$return = false;
		$query = "delete from studentclass where std_clas_id='$std_clas_id'";
		if($this->con->query($query))
		{
			$return = true;
		}
		return $return;
	}
	
	public function getcourses_student($id,$c_id)
	{
		$return = "";
		//$inst_id=$_SESSION['inst_id'];
		$query= "select c.course_id,c.course_name,c.course_code,c.course_days,d.dep_title,s.std_id,s.std_fname,s.std_lname,s.std_regno from studentclass sc INNER JOIN tbl_course c on sc.course_id=c.course_id INNER JOIN student s on sc.Std_id=s.std_id INNER JOIN tbl_department d on d.dep_id=c.course_dep WHERE s.std_id='$id' AND c.course_id='$c_id'  ";
		$r = $this->con->query($query);
		if(mysqli_num_rows($r)>0)
		{
			while($row =mysqli_fetch_assoc($r))
			{
				$return .= '<tr>
								<td>'.$row["course_name"].'</td>
								<td>'.$row["course_code"].'</td>
								<td>'.$row["course_days"].'</td>
								<td>'.$row["dep_title"].'</td>
								<td>'.$row["std_fname"].'</td>
								<td>'.$row["std_lname"].'</td>									
								<td>'.$row["std_regno"].'</td>									
								</tr>';
							//<td><button onclick="predictstudent(this)" name="predict"><i class="fa fa-user-circle-o" ></i>Predict</button></td>
							//<td><a href="profile.php?id='.$row['inst_id'].'" ><i class="fa fa-pencil edit_instructor"></i></a></td>
							//<td><i id = "'.$row['inst_id'].'" class = "fa fa-delete btn_delete" 								
			}
		}
		return $return;
	}
	
	function list_course_wrtDep_dropdown($inst_id,$dep_id)
	{
		$return = "";
		//$inst_id=$_SESSION['inst_id'];
		$query="Select c.course_id,c.course_name,c.course_prof from tbl_course c where c.course_dep='$dep_id' AND c.course_prof='$inst_id'";
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
		
}

