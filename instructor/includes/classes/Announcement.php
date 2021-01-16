<?php //require_once '../../vendor/autoload.php';
//use Phpml\Classification\KNearestNeighbors;
	use Phpml\Classification\KNearestNeighbors;
	use Phpml\Math\Distance\Minkowski;
	//use Phpml\Dataset\Demo\IrisDataset;
	use Phpml\CrossValidation\StratifiedRandomSplit;
	use Phpml\Dataset\Demo\WineDataset;
	use Phpml\Dataset\Demo\sppmDataset;
	use Phpml\Metric\Accuracy;
	use Phpml\Regression\SVR;
	use Phpml\SupportVectorMachine\Kernel;
	use Phpml\Regression\LeastSquares;
 ?>
<?php

class announcement{
	
	private $con;

    function __construct() {
        global $DB;
        $this->con = $DB->connect();
    }
	
	function add_announce($announce,$inst_id)
	{
		$ann_title = $announce["ann_title"];
		$cur_date=date("Y-m-d h:i:sa");
		$dep_title = $announce["dep_title"];
		$course_id = $announce["course_id"];
		$ann_desc = $announce["ann_desc"];
		$query = "INSERT INTO `announcement`(`ann_title`, `ann_date`, `dep_title`, `course_id`, `ann_desc`, `inst_name`)
		VALUES('$ann_title','$cur_date','$dep_title','$course_id','$ann_desc','$inst_id')";
		if($this->con->query($query))
		{
			echo '<script>swal("Good job!","Announcement Posted!","success");</script>';
		}
		else
		{
			echo '<script>swal("Oops!","Post Failed!","error");</script>';
		}
	}
	
	public function list_announce($c_id,$inst_name)
	{
		$return = "";
		//$query = "select * from tb_mn";
		/*$course_name = $assign["course_name"];
		$dep_title = $assign["dep_title"];*/
		$query= "select ann_id,a.ann_title, a.ann_date,a.dep_title,a.ann_desc,a.inst_name, c.course_name from announcement a INNER JOIN tbl_course c ON a.course_id=c.course_id WHERE c.course_id='$c_id' AND a.inst_name='$inst_name' ";
		$r = $this->con->query($query);
		if(mysqli_num_rows($r)>0)
		{
			while($row =mysqli_fetch_assoc($r))
			{
				
				$return .= '
                                <div class="panel panel-default" id="delete_this">
                                    <div class="panel-heading accordion-head">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion2" href="#collapse4">
									 Announcement Title -> '.$row["ann_title"].'</a>
                                        </h4>
										
                                    </div>
                                    <div id="collapse4" class="panel-collapse panel-ic collapse in">
                                        <div class="panel-body admin-panel-content animated flash">
                                            <p>Announcement Date: '.$row["ann_date"].'</p>
											<p>Announcement Title: '.$row["ann_title"].'</p>
											<p>Instructor Name: '.$row["inst_name"].'</p>
											<p>Course Name: '.$row["course_name"].'</p>
											<p>Announcement Description: '.$row["ann_desc"].'</p>
											<p><a href="edit_announcement.php?id='.$row['ann_id'].'" >edit<i class="fa fa-pencil edit_instructor"></i></a></p>
											<p><a>Delete<i class="fa fa-trash btn_delete" id='.$row["ann_id"].' onclick="delete_announcement(this.id,this);"></i></a></p>
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
	
	//get announce by id
	public function get_announce_by_id($ann_id)
	{
		$announce="";
		$q="SELECT *,c.course_name,d.dep_title FROM announcement a INNER JOIN tbl_course c on a.course_id=c.course_id Inner join tbl_department d on a.dep_title=d.dep_id where a.ann_id = '$ann_id'";
		$result=$this->con->query($q);
		if(mysqli_num_rows($result) > 0)
		{
			while($row=mysqli_fetch_assoc($result))
			{
				$announce = array(						
						"ann_title" => $row["ann_title"],
						"ann_date" => $row["ann_date"],
						"dep_title" => $row["dep_title"],
						"course_id" => $row["course_id"],
						"course_name" => $row["course_name"],
						"ann_desc" => $row["ann_desc"],
						"inst_name" => $row["inst_name"],
				);
			}
		}
		return $announce;
	}
	//Delete Announcement
	public function delete_announcement($ann_id)
	{
		$return = false;
		$query = "delete from announcement where ann_id ='$ann_id'";
		if($this->con->query($query))
		{
			echo '<script>swal("Good job!","Assignment Successfully Deleted!","success");</script>';
			$return = true;
		}
		return $return;
	}
	
	///edit announcements
	public function edit_announcement($announce,$inst_id)
	{
		$id=$announce["id"];
		$ann_title = $announce["ann_title"];
		$cur_date=date("Y-m-d h:i:sa");
		$dep_title = $announce["dep_title"];
		$course_id = $announce["course_id"];
		$ann_desc = $announce["ann_desc"];
		$ann_date=date("Y-m-d h:i:sa");
		$query="UPDATE `announcement` SET `ann_title`='$ann_title',`ann_date`='$ann_date',`dep_title`='$dep_title',`course_id`='$course_id',`ann_desc`='$ann_desc',`inst_name`='$inst_id' WHERE `ann_id`='$id' ";
		if($this->con->query($query))
		{
			echo '<script>swal("Good job!","Announcement Updtaed!","success");</script>';
		}
		else
		{
			echo '<script>swal("Oops!","Update Failed!","error");</script>';
		}
	}
}
?>