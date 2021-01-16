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
	
	function add_announce($announce,$inst_name)
	{
		$ann_title = $announce["ann_title"];
		$cur_date=date("Y-m-d h:i:sa");
		$dep_title = $announce["dep_title"];
		$course_id = $announce["course_id"];
		$ann_desc = $announce["ann_desc"];
		$query = "INSERT INTO `announcement`(`ann_title`, `ann_date`, `dep_title`, `course_id`, `ann_desc`, `inst_name`)
		VALUES('$ann_title','$cur_date','$dep_title','$course_id','$ann_desc','$inst_name')";
		if($this->con->query($query))
		{
			echo '<script>swal("Good job!","Announcement Posted!","success");</script>';
		}
		else
		{
			echo '<script>swal("Oops!","Post Failed!","error");</script>';
		}
	}
	
	public function list_announce($assign,$inst_name)
	{
		$return = "";
		//$query = "select * from tb_mn";
		$course_name = $assign["course_name"];
		$dep_title = $assign["dep_title"];
		$query= "select a.ann_title, a.ann_date,a.dep_title,a.ann_desc,a.inst_name, c.course_name from announcement a INNER JOIN tbl_course c ON a.course_id=c.course_id WHERE c.course_id='$course_name' AND a.dep_title='$dep_title' AND a.inst_name='$inst_name' ";
		$r = $this->con->query($query);
		if(mysqli_num_rows($r)>0)
		{
			while($row =mysqli_fetch_assoc($r))
			{
				
				$return .= '<div class="panel-group edu-custon-design" id="accordion2">
                                <div class="panel panel-default">
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
	
	public function list_announce_student($std_id,$course_id)
	{
		$return = "";
		$query= "select c.course_id,a.ann_title,a.ann_date,a.ann_desc,dep.dep_title,c.course_name,i.inst_fname,i.inst_lname from announcement a INNER JOIN tbl_course c on a.course_id=c.course_id INNER JOIN tbl_department dep on a.dep_title=dep.dep_id INNER JOIN instructor i on a.inst_name=i.inst_id INNER join studentclass sc on sc.course_id=c.course_id where sc.Std_id='$std_id' and a.course_id='$course_id'
";
		$r = $this->con->query($query);
		if(mysqli_num_rows($r)>0)
		{
			while($row =mysqli_fetch_assoc($r))
			{
				
				$return .= '
				<h2>------- Announcement ------</h2>
				<p>Course Name: '.$row["course_name"].'</p>
				<p>Instructor Name: '.$row["inst_fname"].$row["inst_lname"].'</p>
				<p>Announcement Title: '.$row["ann_title"].'</p>
				<p>Announcement Date: '.$row["ann_date"].'</p>
				<p>Department Title: '.$row["dep_title"].'</p>
				<p>Announcement Desciption: '.$row["ann_desc"].'</p>
				
				';								
			}
		}
		else
		{
			echo '<script>swal("Oops!","No Announcement Post!","error");</script>';
		}
		return $return;
	}
	//list student mid detail
	public function list_mid_student($std_id,$course_id)
	{
		$return = "";
		$query= "select m.mid_title,m.mid_date,m.mid_time,m.mid_desc,m.mid_total_marks,dep.dep_title,c.course_name,i.inst_fname,i.inst_lname from tbl_mid m INNER JOIN tbl_course c on m.course_id=c.course_id INNER JOIN tbl_department dep on m.dept_name=dep.dep_id INNER JOIN instructor i on m.inst_id=i.inst_id INNER JOIN studentclass sc on sc.course_id=c.course_id where sc.Std_id='$std_id' and m.course_id='$course_id'";
		$r = $this->con->query($query);
		if(mysqli_num_rows($r)>0)
		{
			while($row =mysqli_fetch_assoc($r))
			{
				
				$return .= '
				<h2>------- Mid ------</h2>
				<p>Course Name: '.$row["course_name"].'</p>
				<p>Instructor Name: '.$row["inst_fname"].$row["inst_lname"].'</p>
				<p>MidTerm Title: '.$row["mid_title"].'</p>
				<p>MidTerm Date: '.$row["mid_date"].'</p>
				<p>MidTerm Date: '.$row["mid_time"].'</p>
				<p>MidTerm Title: '.$row["dep_title"].'</p>
				<p>MidTerm Title: '.$row["mid_total_marks"].'</p>
				<p>MidTerm Desciption: '.$row["mid_desc"].'</p>
				
				';								
			}
		}
		else
		{
			echo '<script>swal("Oops!","No Midterm Post!","error");</script>';
		}
		return $return;
	}
	
	public function restrict_announcements($course_id,$std_session)
	{
		$query= "select course_id from studentclass WHERE Std_id='$std_session'";
		$r = $this->con->query($query);
		if(mysqli_num_rows($r)>0)
		{
			while($row =mysqli_fetch_assoc($r))
			{
				if($row["course_id"] != $course_id)
				{
					$msg = header("location:../pages/home.php");
				}
				else
				{
					
				}
			}
		}
	}
/*	
	public function mypred_function()
	{
		$dataset = new IrisDataset();
	    $classifier = new KNearestNeighbors($k=4);
		$classifier = new KNearestNeighbors($k=3, new Minkowski($lambda=4));
		$samples = [[1, 3], [1, 4], [2, 4], [3, 1], [4, 1], [4, 2]];
		$labels = ['a', 'a', 'a', 'b', 'b', 'b'];

		$classifier = new KNearestNeighbors();
		$classifier->train($samples, $labels);
		
		$usename=$classifier->predict([1, 8]);
		echo $usename;
	}
	public function mypred_regression()
	{
		$dataset = new WineDataset();
		$split = new StratifiedRandomSplit($dataset);
		//$samples = [[60], [61], [62], [63], [65]];
		//$targets = [3.1, 3.6, 3.8, 4, 4.1];
		$regression = new LeastSquares();
		$regression->train($split->getTrainSamples(), $split->getTrainLabels());
		//$regression->train($samples, $targets);
		$mypredval=$regression->predict($split->getTestSamples());
		//$mypredval=$regression->predict([64]);
		foreach ($mypredval as &$target) 
		{
			$target = round($target);
			echo '</br>'.$target;
		}
	}
	public function sppm_regression()
	{
		$dataset = new sppmDataset();
		$split = new StratifiedRandomSplit($dataset);
		$regression = new LeastSquares();
		$regression->train($split->getTrainSamples(), $split->getTrainLabels());
		$mypredval=$regression->predict($split->getTestSamples());
		foreach ($mypredval as &$target) 
		{
			$target = round($target);
			echo '</br>'.$target;
		}
	}*/
}
?>