<?php

class quiz{
	
	private $con;

    function __construct() {
        global $DB;
        $this->con = $DB->connect();
    }
	
	public function quiz_student($std_id,$course_id)
	{
		$return =""; 
		$query="select q.quiz_title,q.quiz_time,q.quiz_date,q.quiz_total_marks,c.course_name,i.inst_fname,i.inst_lname,q.quiz_desc from tbl_quiz q INNER JOIN tbl_course c on q.course_id=c.course_id INNER join instructor i on i.inst_id=q.instructor_id INNER join studentclass sc on sc.course_id=c.course_id where sc.Std_id='$std_id' and q.course_id='$course_id'";
		$r = $this->con->query($query);
		if(mysqli_num_rows($r)>0)
		{
			while($row =mysqli_fetch_assoc($r))
			{
				
				$return .= '
				<p>Course Name: '.$row["course_name"].'</p>
				<p>Instructor Name: '.$row["inst_fname"].$row["inst_lname"].'</p>
				<p>Quiz Title: '.$row["quiz_title"].'</p>
				<p>Quiz Date: '.$row["quiz_date"].'</p>
				<p>Quiz Time: '.$row["quiz_time"].'</p>
				<p>Quiz Total Marks: '.$row["quiz_total_marks"].'</p>
				<p>Quiz Desciption: '.$row["quiz_desc"].'</p>
				';								
			}
		}
		else
		{
			echo '<script>swal("Oops!","No Quiz Post!","error");</script>';
		}
		return $return;
	}
	
}