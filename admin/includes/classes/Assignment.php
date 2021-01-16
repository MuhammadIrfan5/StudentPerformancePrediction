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
		$assign_total_marks = $assign["assign_total_marks"];
		$assign_sts = $assign["assign_sts"];
		$time=$timezone = date_default_timezone_get();
		$dates=date_parse(date("Y-m-d"));
		$abc=date_parse($assign_start_date);
		
		if($abc > $dates)
		{
				$query = "INSERT INTO `assignment`(`assign_title`, `assign_start_date`, `assign_end_date`, `dept_title`, `assign_time`, `inst_name`, `course_name`, `assign_desc`,`assign_total_marks`, `assign_sts`)
					VALUES('$assign_title','$assign_start_date','$assign_end_date','$dep_title','$assign_time','$inst_name','$course_name','$assign_desc','$assign_total_marks','$assign_sts')";
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
	
	public function list_assignment($c_id,$inst_id)
	{
		$return = "";
		//$query = "select * from tb_mn";
		//$course_name = $assign["course_name"];
		//$dep_title = $assign["dep_title"];
		$query= "select a.A_id,a.assign_title, a.assign_start_date,a.assign_sts,a.assign_end_date,a.assign_time, a.assign_desc, c.course_name, d.dep_title from assignment a INNER JOIN tbl_course c ON a.course_name=c.course_id INNER JOIN tbl_department d on a.dept_title=d.dep_id where a.course_name='$c_id' AND a.inst_name='$inst_id'"; 
		$r = $this->con->query($query);
		if(mysqli_num_rows($r)>0)
		{
			while($row =mysqli_fetch_assoc($r))
			{
				$on = ($row["assign_sts"])?"On":"Off";
				$return .= '
                                <div class="panel panel-default" id="delete_this">
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
											<p>Department: '.$row["dep_title"].'</p>
											<p>Visibility: '.$on.'</p>
											<p>Description: '.$row["assign_desc"].'</p>
											<p><a>Delete<i class="fa fa-trash btn_delete" id='.$row["A_id"].' onclick="delete_assignment(this.id,this);"></i></a></p>
											<p><a href="edit_assignment.php?id='.$row['A_id'].'" >Edit<i class="fa fa-pencil edit_assingment"></i></a></p>
											
										</div>
									
									</div>
                                </div> 
                            ';
							//<td><a href="profile.php?id='.$row['inst_id'].'" ><i class="fa fa-pencil edit_instructor"></i></a></td>
							//<td><i id = "'.$row['inst_id'].'" class = "fa fa-delete btn_delete" 								
			}
		}
		else
		{
			echo '<script>swal("Oops!","No Assignment!","error");</script>';
		}
		return $return;
	}
	
	
	public function delete_assignment($a_id)
	{
		$return = false;
		$query = "delete from assignment where A_id ='$a_id'";
		if($this->con->query($query))
		{
			echo '<script>swal("Good job!","Assignment Successfully Deleted!","success");</script>';
			$return = true;
		}
		return $return;
	}
	
	
	public function get_assignment_by_id($a_id)
	{
		$course="";
		$q="select *,c.course_name,d.dep_title from assignment a INNER JOIN tbl_course c on a.course_name=c.course_id INNER JOIN tbl_department d on a.dept_title=d.dep_id WHERE a.A_id='$a_id'";
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
						"dep_title" => $row["dep_title"],
						"assign_time" => $row["assign_time"],
						"inst_name" => $row["inst_name"],
						"course_name" => $row["course_name"],
						"assign_desc" => $row["assign_desc"],
						"assign_total_marks" => $row["assign_total_marks"],
						"assign_sts" => $row["assign_sts"],
				);
			}
		}
		return $course;
	}
	
	public function edit_assignment($assign,$inst_name)
	{
		$id = $assign["id"];
		$assign_title = $assign["assign_title"];
		$assign_start_date = $assign["assign_start_date"];
		$assign_end_date = $assign["assign_end_date"];
		$dep_title = $assign["dep_title"];
		$assign_time = $assign["assign_time"];
		$course_name = $assign["course_name"];
		$assign_desc = $assign["assign_desc"];
		$assign_total_marks = $assign["assign_total_marks"];
		$assign_sts = $assign["assign_sts"];
		$time=$timezone = date_default_timezone_get();
		$dates=date_parse(date("Y-m-d"));
		$abc=date_parse($assign_start_date);
		if($abc > $dates)
		{
			$query = "UPDATE `assignment` SET `assign_title`='$assign_title',`assign_start_date`='$assign_start_date',`assign_end_date`='$assign_end_date',`dept_title`='$dep_title',`assign_time`='$assign_time',`inst_name`='$inst_name',`course_name`='$course_name',`assign_desc`='$assign_desc',`assign_total_marks`='$assign_total_marks',`assign_sts`='$assign_sts' WHERE `A_id` ='$id'";
			if($this->con->query($query))
			{
				echo '<script>swal("Good job!","Assignment Successfully Updated!","success");</script>';
				
			}
			else
			{
				echo '<script>swal("Oops!","Assignment update failed!","error");</script>';
			}
		}
		else
		{
			echo '<script>swal("Oops!","Date Issue!","error");</script>';
		}
	}
		public function list_assignment_dropdown($inst_id,$c_id)
		{
			$return = "";
			$query="select * from assignment where inst_name='$inst_id' AND course_name='$c_id'";
			$result=$this->con->query($query);
			if(mysqli_num_rows($result) > 0)
			{
				while($r = mysqli_fetch_assoc($result))
				{
					$return .= "<option value='".$r['A_id']."'>".$r['assign_title']."</option>";
				}
			}
			return $return;
		}
		
		public function list_Student_dropdown($course_id)
		{
			$return = "";
			$query="select * from student s INNER jOIN studentclass sd ON s.std_id=sd.Std_id where sd.course_id='$course_id'";
			$result=$this->con->query($query);
			if(mysqli_num_rows($result) > 0)
			{
				while($r = mysqli_fetch_assoc($result))
				{
					$return .= "<option value='".$r['A_id']."'>".$r['assign_title']."</option>";
				}
			}
			return $return;
		}
		
	public function list_assignment_marks($A_id,$inst_id)
	{
		$return = "";
		//$query = "select * from tb_mn";
		$query= "SELECT a.A_id,s.std_id,c.course_id,c.course_name,a.assign_title,a.assign_total_marks,s.std_fname,s.std_lname,s.std_regno from assignment a INNER JOIN tbl_course c on a.course_name=c.course_id INNER JOIN studentclass sc on a.course_name=sc.course_id INNER JOIN student s on sc.Std_id=s.std_id where a.A_id='$A_id' AND a.inst_name='$inst_id'";
		$r = $this->con->query($query);
		if(mysqli_num_rows($r)>0)
		{
			while($row =mysqli_fetch_assoc($r))
			{
				$return .= '<tr>
								<td>'.$row["course_name"].'</td>
								<td>'.$row["assign_title"].'</td>
								<td>'.$row["std_fname"].'</td>
								<td>'.$row["std_lname"].'</td>
								<td>'.$row["std_regno"].'</td>
								<td>'.$row["assign_total_marks"].'</td>							
								<td class="datatable-ct">
									<input type="number" name="marks[]" class="form-control std_mark" placeholder="Marks">
                                </td>
							</tr>';
			}	
		}
		
		return $return;
	}
	//<td><button onclick="save_marks(this)" name="save"><i class="fa fa-user-circle-o" ></i>Save</button></td>
	public function save_marks($A_id,$c_id,$marks,$inst_id)
	{
		$marks_data="";
		$obt_marks=$marks;
		print_r($obt_marks);
		$query="SELECT a.A_id,s.std_id,c.course_id,c.course_name,a.assign_title,a.assign_total_marks,s.std_fname,s.std_lname,s.std_regno from assignment a INNER JOIN tbl_course c on a.course_name=c.course_id INNER JOIN studentclass sc on a.course_name=sc.course_id INNER JOIN student s on sc.Std_id=s.std_id where a.A_id='$A_id' AND a.inst_name='$inst_id'";
		$r = $this->con->query($query);
		if(mysqli_num_rows($r)>0)
		{
			while($row =mysqli_fetch_assoc($r))
			{
				$marks_data = array(
						"A_id" => $row["A_id"],
						"std_id" => $row["std_id"],
						"course_id" => $row["course_id"],
						"course_name" => $row["course_name"],
						"assign_title" => $row["assign_title"],
						"std_fname" => $row["std_fname"],
						"std_lname" => $row["std_lname"],
						"std_regno" => $row["std_regno"],
						"assign_total_marks" => $row["assign_total_marks"]
				);
			}
			foreach($obt_marks as $key => $value)
			{
				$query1="INSERT INTO `std_assignment`(`std_id`, `assign_id`, `course_id`, `assign_total_marks`, `assign_obt_marks`) VALUES ('".$marks_data['std_id']."','".$A_id."',''".$c_id."'',''".$marks_data['assign_total_marks']."'','".$value."')";
				if($this->con->query($query1))
				{
					echo '<script>swal("Good job!","Assignment Marks Saved!","success");</script>';
				}
				else
				{
					echo '<script>swal("Oops!","Failed To Upload Marks!","error");</script>';
				}
			}
		}	
	}
	
}
?>