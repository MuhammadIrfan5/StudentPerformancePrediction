<?php

class department
{
	private $con;

    function __construct() {
        global $DB;
        $this->con = $DB->connect();
    }
	
	public function add_depart($depart)
	{
		$dep_title = $depart["dep_title"];
		$dep_code = $depart["dep_code"];
		$dep_sts = $depart["dep_sts"];
		$cur_date=date("Y-m-d");
		//date("j-n-Y:a")
		
			$query = "INSERT INTO `tbl_department`(`dep_title`, `dep_code`, `dep_reg_date`, `dep_sts`)
			VALUES('$dep_title','$dep_code','$cur_date','$dep_sts')";
			if($this->con->query($query))
			{
				echo '<script>swal("Good job!","Department Add Sucessfully!","success");</script>';
			}
			else
			{
				echo '<script>swal("Oops!","Failed to Add!","error");</script>';
			}
	}
	
	public function edit_depart($depart)
	{
		$id = $depart["id"];
		$dep_title = $depart["dep_title"];
		$dep_code = $depart["dep_code"];
		$dep_sts = $depart["dep_sts"];
		$cur_date=date("Y-m-d");
		//date("j-n-Y:a")
		
			$query = "UPDATE `tbl_department` SET `dep_title`='$dep_title',`dep_code`='$dep_code',`dep_reg_date`='$cur_date',`dep_sts`='$dep_sts' WHERE dep_id='$id'";
			if($this->con->query($query))
			{
				echo '<script>swal("Good job!","Department Sucessfully Edit!'.$depart["dep_sts"].'","success");</script>';
			}
			else
			{
				echo '<script>swal("Oops!","Failed to Edit!","error");</script>';
			}
	}
	
	public function list_depart()
	{
		$return = "";
		$query= "SELECT * from tbl_department";
		$r = $this->con->query($query);
		if(mysqli_num_rows($r)>0)
		{
			while($row =mysqli_fetch_assoc($r))
			{
				$on = ($row["dep_sts"])?"On":"Off";
				$return .= '<tr>
								<td>'.$row["dep_title"].'</td>
								<td>'.$row["dep_code"].'</td>
								<td>'.$row["dep_reg_date"].'</td>
								<td>'.$on.'</td>							
								<td class="datatable-ct"><a href="edit_depart.php?id='.$row['dep_id'].'" ><i class="fa fa-check"></i></a></td>
								<td class="datatable-ct"><button id="'.$row['dep_id'].'" class="btn_delete"><i class="fa fa-trash"><i/></button></td>
							</tr>';
			}
		}
		return $return;
	}
	
	public function get_depart_by_id($dep_id)
	{
		$depart="";
		$q="SELECT * FROM tbl_department where dep_id = '$dep_id'";
		$result=$this->con->query($q);
		if(mysqli_num_rows($result) > 0)
		{
			while($row=mysqli_fetch_assoc($result))
			{
				$depart = array(
						
						"dep_id" => $row["dep_id"],
						"dep_title" => $row["dep_title"],
						"dep_code" => $row["dep_code"],
						"dep_reg_date" => $row["dep_reg_date"],
						"dep_sts" => $row["dep_sts"]
				);
			}
		}
		return $depart;
	}
}
?>