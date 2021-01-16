<?php
	require_once realpath(__DIR__)."/../../../vendor/autoload.php";
	//require_once '../../vendor/autoload.php';
	//use Phpml\Classification\KNearestNeighbors;
	//use Phpml\Dataset\Demo\IrisDataset;
	use Phpml\Dataset\demo;
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

class prediction{
	
	private $con;

    function __construct()
	{
        global $DB;
        $this->con = $DB->connect();
    }
	
	public function sppm_regression()
	{
		$dataset = new sppmDataset();
		$split = new StratifiedRandomSplit($dataset);
		$regression = new LeastSquares();
		$regression->train($split->getTrainSamples(), $split->getTrainLabels());
		$mypredval=$regression->predict($split->getTestSamples());
		//print_r($split->getTrainSamples());
		//print_r($split->getTrainLabels());
		foreach ($mypredval as &$target) 
		{
			$target = round($target);
			if($target == 1)
			{
				echo "</br> A";
			}
			else if($target == 2)
			{
				echo "</br> B";
			}
			if($target == 3)
			{
				echo "</br> C+";
			}
			if($target == 4)
			{
				echo "</br> C";
			}
			if($target == 5)
			{
				echo "</br> F";
			}
			else
			{
				echo "</br> Hard To Judge";
			}
			
			//echo '</br>'.$target;
		}
	}
	
	public function getgeninfo()
	{
		$mystd="";
		$q="select * from tbl_prediction ";
		$result=$this->con->query($q);
		if(mysqli_num_rows($result) > 0)
		{
			while($row=mysqli_fetch_assoc($result))
			{
				$mystd = array(
				
						'gender',
						'age',
						'fam_size',
						'father_edu',
						'mother_edu' ,
						'father_emp' ,
						'mother_emp',
						'time_travel_uni',
						'hobby',
						'free_time_act',
						'go_out_fam',
						'health',
						'absence_last_sem',
						'board_edu',
						'plan_to_study',
						'plan_to_work' ,
						'any_addiction',
						'cgpa_last_sem',
						'percent_quiz_lastsem',
						'percent_sessional_lastsem',
						'clear_last_sem',
						'any_parttime_job',
						'student_id',
						'class'
				);
			}
		}
		return $mystd;
	}
	
	public function sppm_regression_new($std_id)
	{
		try
		{
			if($std_id != '')
			{
				$std="";
				//$row="";
				//$myid=json_encode($std_id,true);
				$q="SELECT * FROM tbl_prediction where student_id='$std_id'";
				//echo "std_id is ".$std_id;
				$result=$this->con->query($q);
				if(mysqli_num_rows($result) > 0)
				{
					while($row=mysqli_fetch_assoc($result))
					{
								$std=array(
								$row["gender"],
								$row["age"],
								$row["fam_size"],
								$row["father_edu"],
								$row["mother_edu"],
								$row["father_emp"],
								$row["mother_emp"],
								$row["time_travel_uni"],
								$row["hobby"],
								$row["free_time_act"],
								$row["go_out_fam"],
								$row["health"],
								$row["absence_last_sem"],
								$row["board_edu"],
								$row["plan_to_study"],
								$row["plan_to_work"],
								$row["any_addiction"],
								floatval($row["cgpa_last_sem"]),
								$row["percent_quiz_lastsem"],
								$row["percent_sessional_lastsem"],
								$row["clear_last_sem"],
								$row["any_parttime_job"],
								$row["student_id"]
						);
					}
				}
				if($std != '')
				{
					$myvalues=json_encode($std,true);
					//$myatt=json_encode($this->getgeninfo($row["student_id"]));
					$myatt=json_encode($this->getgeninfo());
					$dataset = new sppmDataset();
					$split = new StratifiedRandomSplit($dataset);
					$regression = new LeastSquares();
					$mydata=["2","22","5","1","1","1","1","15","1","1","2","1","1","1","1","1","1",3,"70","70","1","1","2"];
					$regression->train($split->getTrainSamples(), $split->getTrainLabels());			
					$mypredval=$regression->predict($std);
					$myroundval=(int)round($mypredval);
					//echo ' </br>The answer of prediction is </br>'.(int)round($mypredval);
					//print_r ($myvalues);
					//print_r ($mypredval);
					if($myroundval == 1)
					{
						echo "</br> A";
					}
					else if($myroundval == 2)
					{
						echo "</br> B";
					}
					else if($myroundval == 3)
					{
						echo "</br> C+";
					}
					else if($myroundval == 4)
					{
						echo "</br> C";
					}
					else
					{
						echo "</br> F";
					}
					//return (int)round($mypredval);
				}
				else
				{
					echo '<script>swal("Oops!","Student Have not provided data yet!","error");</script>';
				}
			}
			else
			{
				echo '<script>swal("Oops!","Please Select Student!","error");</script>';
			}
		}
		catch(Exception $e)
		{
			echo '<script>swal("Oops!","Error!"'.$e->getMessage().',"error");</script>';
		}
	}
	

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
	
	//sppm array for data
/*	function appm_array()
	{
		$return = "";
		$query="select * from instructor";
		$result=$this->con->query($query);
		if(mysqli_num_rows($result) > 0)
		{
			while($r = mysqli_fetch_assoc($result))
			{
				$return['gender']=$r['inst_gender'];
			}
		}
		return $return;
		$split = new StratifiedRandomSplit($return);
	}*/
	
}
?>