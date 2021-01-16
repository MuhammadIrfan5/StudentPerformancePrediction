<?php

class Mid
{
	private $con;

    function __construct() {
        global $DB;
        $this->con = $DB->connect();
    }
	
	public function add_mid($mid,$inst_id)
	{
		$mid_title = $mid["mid_title"];
		$mid_time = $mid["mid_time"];
		$mid_date = $mid["mid_date"];
		$mid_desc = $mid["mid_desc"];
		$mid_total_marks = $mid["mid_total_marks"];
		$course_id = $mid["course_id"];
		$dep_title = $mid["dep_title"];
		$mid_sts = $mid["mid_sts"];
		/*$time=$timezone = date_default_timezone_get();*/
		$dates=date_parse(date("Y-m-d"));
		$abc=date_parse($mid_date);
		if($abc > $dates)
		{
			$query = "INSERT INTO `tbl_mid`(`mid_title`, `mid_date`, `mid_time`, `mid_desc`, `course_id`, `inst_id`, `dept_name`, `mid_total_marks`, `mid_sts`)
			VALUES('$mid_title','$mid_date','$mid_time','$mid_desc','$course_id','$inst_id','$dep_title','$mid_total_marks','$mid_sts')";
			
			if($this->con->query($query))
			{
				echo '<script>swal("Good job!","Mid Posted!","success");</script>';
			}
			else
			{
				echo '<script>swal("Oops!","Mid Post Failed!","error");</script>';
			}
		}
		else
		{
			echo '<script>swal("Oops!","Mid Date Error!","error");</script>';
		}
	}
	
	public function list_mid($inst_id,$c_id)
	{
		$return = "";
		//$course_name = $mid["course_name"];
		//$dep_title = $mid["dep_title"];
		$query= "SELECT m.mid_id,m.mid_title,m.mid_date,m.mid_time,m.mid_desc,m.mid_total_marks,m.mid_sts,c.course_name,d.dep_title FROM tbl_mid m INNER JOIN tbl_course c on c.course_id=m.course_id INNER JOIN tbl_department d on d.dep_id=c.course_dep WHERE m.inst_id='$inst_id' AND m.course_id='$c_id'"; 
		$r = $this->con->query($query);
		if(mysqli_num_rows($r)>0)
		{
			while($row =mysqli_fetch_assoc($r))
			{
				$on = ($row["mid_sts"])?"On":"Off";
				$return .= '
                                <div class="panel panel-default">
                                    <div class="panel-heading accordion-head">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion2" href="#collapse4">
									 Mid Title -> '.$row["mid_title"].'</a>
                                        </h4>
										
                                    </div>
                                    <div id="collapse4" class="panel-collapse panel-ic collapse in">
                                        <div class="panel-body admin-panel-content animated flash">
                                            <p>Mid Date: '.$row["mid_date"].'</p>
											<p>Mid Time '.$row["mid_time"].'</p>
											<p>Mid Total Marks: '.$row["mid_total_marks"].'</p>
											<p>Course Name: '.$row["course_name"].'</p>
											<p>Department Title: '.$row["dep_title"].'</p>
											<p>Visibility: '.$on.'</p>
											<p>Description: '.$row["mid_desc"].'</p>
											<p><a href="edit_mid.php?id='.$row['mid_id'].'" >Edit<i class="fa fa-pencil edit_quiz"></i></a></p>									
											<p><a>Delete<i class="fa fa-trash btn_delete" id='.$row["mid_id"].' onclick="delete_mid(this.id,this);"></i></a></p>
									</div>
									
                                    </div>
                                </div>
                                
                            </div>';
							//<td><a href="profile.php?id='.$row['inst_id'].'" ><i class="fa fa-pencil edit_instructor"></i></a></td>
							//<td><i id = "'.$row['inst_id'].'" class = "fa fa-delete btn_delete" 								
			}
		}
		return $return;
	}
	
	//delete mid
	public function delete_mid($m_id)
	{
		$return = false;
		$query = "delete from tbl_mid where mid_id ='$m_id'";
		if($this->con->query($query))
		{
			echo '<script>swal("Good job!","mids Successfully Deleted!","success");</script>';
			$return = true;
		}
		return $return;
	}
	
	public function get_mid_by_id($mid_id)
	{
		$mid="";
		$q="SELECT *,c.course_name,d.dep_title FROM tbl_mid m INNER join tbl_course c on m.course_id=c.course_id inner join tbl_department d on m.dept_name=d.dep_id where m.mid_id = '$mid_id'";
		$result=$this->con->query($q);
		if(mysqli_num_rows($result) > 0)
		{
			while($row=mysqli_fetch_assoc($result))
			{
				$mid = array(						
						"mid_title" => $row["mid_title"],
						"mid_date" => $row["mid_date"],
						"mid_time" => $row["mid_time"],
						"mid_desc" => $row["mid_desc"],
						"course_id" => $row["course_id"],
						"course_name" => $row["course_name"],
						"inst_id" => $row["inst_id"],
						"dept_name" => $row["dept_name"],
						"dep_title" => $row["dep_title"],
						"mid_total_marks" => $row["mid_total_marks"],
						"mid_sts" => $row["mid_sts"],
				);
			}
		}
		return $mid;
	}
	
	public function edit_mid($mid,$inst_id)
	{
		$id = $mid["id"];
		$mid_title = $mid["mid_title"];
		$mid_time = $mid["mid_time"];
		$mid_date = $mid["mid_date"];
		$mid_desc = $mid["mid_desc"];
		$mid_total_marks = $mid["mid_total_marks"];
		$course_id = $mid["course_id"];
		$dep_title = $mid["dep_title"];
		$mid_sts = $mid["mid_sts"];
		/*$time=$timezone = date_default_timezone_get();*/
		$dates=date_parse(date("Y-m-d"));
		$abc=date_parse($mid_date);
		if($abc > $dates)
		{
			$query = "UPDATE `tbl_mid` SET `mid_title`='$mid_title',`mid_date`='$mid_date',`mid_time`='$mid_time',`mid_desc`='$mid_desc',`course_id`='$course_id',`inst_id`='$inst_id',`dept_name`='$dep_title',`mid_total_marks`='$mid_total_marks',`mid_sts`='$mid_sts' WHERE `mid_id`='$id' ";
			if($this->con->query($query))
			{
				echo '<script>swal("Good job!","Mid UPDATE Posted!","success");</script>';
			}
			else
			{
				echo '<script>swal("Oops!","Mid UPDATE Post Failed!","error");</script>';
			}
		}
		else
		{
			echo '<script>swal("Oops!","Mid Date Error!","error");</script>';
		}
	}
	
	
}


?>