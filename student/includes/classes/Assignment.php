<?php

class Assignment{
	
	private $con;

    function __construct() {
        global $DB;
        $this->con = $DB->connect();
    }
	
	public function add_assignment($assign,$inst_name)
	{
		$assign_title = $assign["assign_title"];
		$assign_start_date = $assign["assign_start_date"];
		$assign_end_date = $assign["assign_end_date"];
		$dep_title = $assign["dep_title"];
		$assign_time = $assign["assign_time"];
		$course_name = $assign["course_name"];
		$assign_desc = $assign["assign_desc"];
		$assign_sts = $assign["assign_sts"];
		$time=$timezone = date_default_timezone_get();
		$dates=date_parse(date("Y-m-d"));
		$abc=date_parse($assign_start_date);
		
		if($abc > $dates)
		{
				$query = "INSERT INTO `assignment`(`assign_title`, `assign_start_date`, `assign_end_date`, `dept_title`, `assign_time`, `inst_name`, `course_name`, `assign_desc`, `assign_sts`)
					VALUES('$assign_title','$assign_start_date','$assign_end_date','$dep_title','$assign_time','$inst_name','$course_name','$assign_desc','$assign_sts')";
					if($this->con->query($query))
					{
						echo '<script>swal("Good job!","Assignment Posted!","success");</script>';
					}
					else
					{
						echo '<script>swal("Oops!","Assignment Post Failed!","error");</script>';
					}
		}
		else
		{
			echo '<script>swal("Oops!","Date Issue!","error");</script>';
		}
	}
	
	public function list_assignment($assign,$inst_name)
	{
		$return = "";
		//$query = "select * from tb_mn";
		$course_name = $assign["course_name"];
		$dep_title = $assign["dep_title"];
		$query= "select a.A_id,a.assign_title, a.assign_start_date,a.assign_sts,a.assign_end_date,a.assign_time, a.assign_desc, c.course_name, a.dept_title from assignment a INNER JOIN tbl_course c ON a.course_name=c.course_id WHERE c.course_id='$course_name' AND a.dept_title='$dep_title' AND a.inst_name='$inst_name' "; 
		$r = $this->con->query($query);
		if(mysqli_num_rows($r)>0)
		{
			while($row =mysqli_fetch_assoc($r))
			{
				$on = ($row["assign_sts"])?"On":"Off";
				$return .= '<div class="panel-group edu-custon-design" id="accordion2">
                                <div class="panel panel-default">
                                    <div class="panel-heading accordion-head">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion2" href="#collapse4">
									 Assignment Title -> '.$row["assign_title"].'</a>
                                        </h4>
										
                                    </div>
                                    <div id="collapse4" class="panel-collapse panel-ic collapse in">
                                        <div class="panel-body admin-panel-content animated flash">
                                            <p>Start Date: '.$row["assign_start_date"].'</p>
											<p>End Date: '.$row["assign_end_date"].'</p>
											<p>Assignment Time: '.$row["assign_time"].'</p>
											<p>Department: '.$row["dept_title"].'</p>
											<p>Visibility: '.$on.'</p>
											<p>Description: '.$row["assign_desc"].'</p>
										</div>
									<a href="edit_assignment.php?id='.$row['A_id'].'" ><i class="fa fa-pencil edit_assingment"></i></a>
                                    </div>
                                </div>
                                
                            </div>';
							//<td><a href="profile.php?id='.$row['inst_id'].'" ><i class="fa fa-pencil edit_instructor"></i></a></td>
							//<td><i id = "'.$row['inst_id'].'" class = "fa fa-delete btn_delete" 								
			}
		}
		return $return;
	}
	
	public function get_assignment_by_id($a_id)
	{
		$course="";
		$q="SELECT * FROM assignment where A_id = '$a_id'";
		$result=$this->con->query($q);
		if(mysqli_num_rows($result) > 0)
		{
			while($row=mysqli_fetch_assoc($result))
			{
				$course = array(
						
						"assign_title" => $row["assign_title"],
						"assign_start_date" => $row["assign_start_date"],
						"assign_end_date" => $row["assign_end_date"],
						"dept_title" => $row["dept_title"],
						"assign_time" => $row["assign_time"],
						"inst_name" => $row["inst_name"],
						"course_name" => $row["course_name"],
						"assign_desc" => $row["assign_desc"],
						"assign_sts" => $row["assign_sts"],
				);
			}
		}
		return $course;
	}
	public function student_assignment($std_id,$course_id)
	{
		$return =""; 
		$query="select a.assign_title,a.assign_start_date,a.assign_end_date,a.assign_time,c.course_name,a.assign_total_marks,a.assign_desc,i.inst_fname,i.inst_lname from assignment a INNER JOIN tbl_course c on a.course_name=c.course_id INNER JOIN instructor i on i.inst_id=a.inst_name INNER JOIN studentclass sc on sc.course_id=a.course_name where sc.Std_id='$std_id' and a.course_name='$course_id'";
		$r = $this->con->query($query);
		if(mysqli_num_rows($r)>0)
		{
			while($row =mysqli_fetch_assoc($r))
			{
				
				$return .= '
				<h4>Course Name:</h4></h3> '.$row["course_name"].'</h3>
				<h4>Instructor Name:</h4> </h3>'.$row["inst_fname"].$row["inst_lname"].'</h3>
				<p>Assignment Title: '.$row["assign_title"].'</p>
				<p>Assignment Start Date: '.$row["assign_start_date"].'</p>
				<p>Assignment End Date: '.$row["assign_end_date"].'</p>
				<p>Assignment Time: '.$row["assign_time"].'</p>
				<p>Assignment Total Marks: '.$row["assign_total_marks"].'</p>
				<p>Assignment Desciption: '.$row["assign_desc"].'</p>
				';								
			}
		}
		else
		{
			echo '<script>swal("Oops!","No Assignment Post!","error");</script>';
		}
		return $return;
	}
	
}
?>