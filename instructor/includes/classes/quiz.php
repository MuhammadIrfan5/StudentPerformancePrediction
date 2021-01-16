<?php

class Quiz{
	
	private $con;

    function __construct() {
        global $DB;
        $this->con = $DB->connect();
    }
	
	public function add_quiz($quiz,$inst_id)
	{
		$quiz_title = $quiz["quiz_title"];
		$quiz_time = $quiz["quiz_time"];
		$quiz_date = $quiz["quiz_date"];
		$quiz_desc = $quiz["quiz_desc"];
		$quiz_total_marks = $quiz["quiz_total_marks"];
		$course_id = $quiz["course_id"];
		$dep_title = $quiz["dep_title"];
		$quiz_sts = $quiz["quiz_sts"];
		/*$time=$timezone = date_default_timezone_get();*/
		$dates=date_parse(date("Y-m-d"));
		$abc=date_parse($quiz_date);
		if($abc > $dates)
		{
			$query = "INSERT INTO `tbl_quiz`(`quiz_title`, `quiz_time`, `quiz_date`, `quiz_desc`, `quiz_total_marks`, `course_id`, `instructor_id`, `dept_id`, `quiz_sts`)
			VALUES('$quiz_title','$quiz_time','$quiz_date','$quiz_desc','$quiz_total_marks','$course_id','$inst_id','$dep_title','$quiz_sts')";
			if($this->con->query($query))
			{
				echo '<script>swal("Good job!","Quiz Posted!","success");</script>';
			}
			else
			{
				echo '<script>swal("Oops!","Quiz Post Failed!","error");</script>';
			}
		}
		else
		{
			echo '<script>swal("Oops!","Quiz Date Error!","error");</script>';
		}
	}
	
	public function list_quiz($c_id,$inst_id)
	{
		$return = "";
		//$query = "select * from tb_mn";
		//$course_name = $quiz["course_name"];
		//$dep_title = $quiz["dep_title"];
		$query= "SELECT q.quiz_id, q.quiz_title, q.quiz_time, q.quiz_date, q.quiz_desc,d.dep_title, q.quiz_total_marks,c.course_name,q.quiz_sts FROM tbl_quiz q INNER JOIN tbl_course c on q.course_id=c.course_id INNER JOIN tbl_department d on q.dept_id=d.dep_id where c.course_id='$c_id' AND q.instructor_id='$inst_id'"; 
		$r = $this->con->query($query);
		if(mysqli_num_rows($r)>0)
		{
			while($row =mysqli_fetch_assoc($r))
			{
				$on = ($row["quiz_sts"])?"On":"Off";
				$return .= '
                                <div class="panel panel-default">
                                    <div class="panel-heading accordion-head">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion2" href="#collapse4">
									 Quiz Title -> '.$row["quiz_title"].'</a>
                                        </h4>
										
                                    </div>
                                    <div id="collapse4" class="panel-collapse panel-ic collapse in">
                                        <div class="panel-body admin-panel-content animated flash">
                                            <p>Quiz Date: '.$row["quiz_date"].'</p>
											<p>Quiz Time '.$row["quiz_time"].'</p>
											<p>Quiz Total Marks: '.$row["quiz_total_marks"].'</p>
											<p>Course Name: '.$row["course_name"].'</p>
											<p>Department Title: '.$row["dep_title"].'</p>
											<p>Visibility: '.$on.'</p>
											<p>Description: '.$row["quiz_desc"].'</p>
											<p><a href="edit_quiz.php?id='.$row['quiz_id'].'" >edit <i class="fa fa-pencil edit_quiz"></i></a></p>
											<p><a>Delete<i class="fa fa-trash btn_delete" id='.$row["quiz_id"].' onclick="delete_quiz(this.id,this);"></i></a></p>
										</div>
									
                                    </div>
                                </div>
                            ';
							//<td><a href="profile.php?id='.$row['inst_id'].'" ><i class="fa fa-pencil edit_instructor"></i></a></td>
							//<td><i id = "'.$row['inst_id'].'" class = "fa fa-delete btn_delete" 								
			}
		}
		return $return;
	}
	
	
	public function get_quiz_by_id($quiz_id)
	{
		$quiz="";
		$q="SELECT *,c.course_name,d.dep_title FROM tbl_quiz q INNER JOIN tbl_course c on q.course_id=c.course_id INNER JOIN tbl_department d on q.dept_id=d.dep_id where q.quiz_id = '$quiz_id'";
		$result=$this->con->query($q);
		if(mysqli_num_rows($result) > 0)
		{
			while($row=mysqli_fetch_assoc($result))
			{
				$quiz = array(						
						"quiz_title" => $row["quiz_title"],
						"quiz_time" => $row["quiz_time"],
						"quiz_date" => $row["quiz_date"],
						"quiz_desc" => $row["quiz_desc"],
						"quiz_total_marks" => $row["quiz_total_marks"],
						"course_id" => $row["course_id"],
						"course_name" => $row["course_name"],
						"instructor_id" => $row["instructor_id"],
						"dept_id" => $row["dept_id"],
						"dep_title" => $row["dep_title"],
						"quiz_sts" => $row["quiz_sts"],
				);
			}
		}
		return $quiz;
	}
	
	//delete quiz
	public function delete_quiz($q_id)
	{
		$return = false;
		$query = "delete from tbl_quiz where quiz_id ='$q_id'";
		if($this->con->query($query))
		{
			echo '<script>swal("Good job!","Quiz Successfully Deleted!","success");</script>';
			$return = true;
		}
		return $return;
	}
	
	public function edit_quiz($quiz,$inst_id)
	{
		$id = $quiz["id"];
		$quiz_title = $quiz["quiz_title"];
		$quiz_time = $quiz["quiz_time"];
		$quiz_date = $quiz["quiz_date"];
		$quiz_desc = $quiz["quiz_desc"];
		$quiz_total_marks = $quiz["quiz_total_marks"];
		$course_id = $quiz["course_id"];
		$dep_title = $quiz["dep_title"];
		$quiz_sts = $quiz["quiz_sts"];
		/*$time=$timezone = date_default_timezone_get();*/
		$dates=date_parse(date("Y-m-d"));
		$abc=date_parse($quiz_date);
		if($abc > $dates)
		{
			$query = "UPDATE `tbl_quiz` SET `quiz_title`='$quiz_title',`quiz_time`='$quiz_time',`quiz_date`='$quiz_date',`quiz_desc`='$quiz_desc',`quiz_total_marks`='$quiz_total_marks',`course_id`='$course_id',`instructor_id`='$inst_id',`dept_id`='$dep_title',`quiz_sts`='$quiz_sts' WHERE `quiz_id` ='$id' ";
			if($this->con->query($query))
			{
				echo '<script>swal("Good job!","Quiz Posted!","success");</script>';
			}
			else
			{
				echo '<script>swal("Oops!","Quiz Post Failed!","error");</script>';
			}
		}
		else
		{
			echo '<script>swal("Oops!","Quiz Date Error!","error");</script>';
		}
	}
	
}
?>