<?php include "../includes/header.php";?>
<?php
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
	//use Phpml\Metric\Accuracy;
 ?>
<?php
/*if(isset($_POST["predict"]))
	{
		$answer=$predict->sppm_regression_new();
	}*/
	?>
<div class="form-group">
	<label name="predict_title"> <?php //$predict->sppm_regression(); //if(!empty($answer)){print_r($answer);}?></label>
</div>
<!-- Single pro tab review Start-->
        <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a href="#description">Student Profile</a></li>
                                <!--<li><a href="#reviews"> Acount Information</a></li>
                                <li><a href="#INFORMATION">Social Information</a></li>-->
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
									<div class="row">
										<div class="col-sm-3 col-sm-3 col-sm-3 col-sm-3">
											<div class="profile-img">
												<!--<img src="<?php //echo $s_details["std_image_path"]; ?>" />-->
											</div>
										</div>
									</div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
													<div id="dropzone1" class="pro-ad addcoursepro">
														<form action="" method="POST" enctype="multipart/form-data" class="needsclick addcourse" id="demo1-upload">
																<div class="row">
																	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
																		<select data-placeholder="Choose a Course..." id="c_select_id" name="course_name" OnChange="loadstudent(this.value,this)" class="chosen-select form-control" tabindex="-1">
																				<option value='' disabled selected>Choose Course</option>
																			<?php echo $courses->list_course_dropdown($_SESSION['inst_id']); ?>
																		</select>
																	</div>
																	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="leveldiv" >
																		<select id="s_id" data-placeholder="Choose a Course..."  name="student_names" OnChange="loadtable(this.value,document.getElementById('c_select_id').value,this)"  class="chosen-select form-control" tabindex="-1">
																				<option value='' disabled selected>Choose Student</option>
																			
																		</select>
																	</div>
																</div><?php //echo $courses->list_student_wrtCourse_dropdown($_SESSION['inst_id']); ?>
																
																<div class="row">
																<div class="col-lg-12">
																	<div class="data-table-area mg-b-15">
																		<div class="container-fluid">
																			<div class="row">
																				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
																					<div class="sparkline13-list">
																						<div class="sparkline13-hd">
																							<div class="main-sparkline13-hd">
																								<h1>Courses <span class="table-project-n">Data</span> Table</h1>
																							</div>
																						</div>
																						<div class="sparkline13-graph">
																							<div class="datatable-dashv1-list custom-datatable-overright">
																								<div id="toolbar">
																									<select class="form-control dt-tb">
																										<option value="">Export Basic</option>
																										<option value="all">Export All</option>
																										<option value="selected">Export Selected</option>
																									</select>
																								</div>
																								<table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
																									data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
																									<thead>
																										<tr>
																											
																											<th  data-editable="false">Course Name</th>
																											<th  data-editable="false">Course Code</th>
																											<th  data-editable="false">Course Days</th>
																											<th  data-editable="false">Course Department</th>
																											<th  data-editable="false">Student First Name</th>
																											<th  data-editable="false">Student Last Name</th>
																											<th  data-editable="false">Registration No</th>
																											<!--<th>Predict</th>
																											<th>Answer</th>-->
																										</tr>
																									</thead>
																									<tbody id="tbody">
																										
																									</tbody>
																								</table>
																							</div>
																						</div>
																					</div>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
															</div></br>
															<div class="row">
																	<div class="col-lg-12">
																		<div class="payment-adress">
																		  </br>  <!--<button type="submit" name="" class="btn btn-primary waves-effect waves-light">LoadStudent</button>-->
																			<label>The Predition With Respect to data of this student is &nbsp</label> <label id="lbl_answer"> </label>%
																		</div>
																	</div>
																	<div class="col-lg-12">
																		<div class="payment-adress">
																		  </br>  <!--<button type="submit" name="" class="btn btn-primary waves-effect waves-light">LoadStudent</button>-->
																			<button type="submit" name="predict" onclick="predictstudent(event);" id="btn_pre" class="btn btn-primary waves-effect waves-light" >Predict </button>
																		</div>
																	</div>
																	
															</div>
														</form>
													</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



<?php include "../includes/footer.php";?>
<?php //if(isset($_POST["LoadStudent"])) { echo $courses->getcourses_student($_SESSION['inst_id']);} ?>

<script type="type/javascript">
  /*function ajaxGetInfo(id)
  {
   a = ajax();
   if(a!=null)
   {
    a.onreadystatechange = function { if(a.readyState == 4) document.getElementById('c_select_id').value = a.responseText; }
    a.open("GET", "../includes/classes/ajax_delete.php?id="+id+"&cases=predict_table", true);
    a.send(null);
   }
   else document.getElementById('c_select_id').value = "Error retrieving data!";
  }
  function ajax()
  {
   if(window.XMLHttpRequest) return new XMLHttpRequest();
   if(window.ActiveXObject) return new ActiveXObject("Microsoft.XMLHTTP");
   return null;
  }*/
  </script>
  

  <script>
function loadstudent(id,obj){
	var status=false;
	//alert("1");
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
	if (this.readyState == 4 && this.status == 200) {
		//var id=document.getElementById('c_select_id').value;
		//alert("count is 2 and id is "+id);
		//alert(this.responseText);
		document.getElementById('s_id').innerHTML=this.responseText;
		 $("#s_id").trigger("liszt:updated");
		$("#s_id").trigger("chosen:updated");
	}
};
		//alert("count is 3 and id is "+id);
        xmlhttp.open("GET", "../includes/classes/ajax_delete.php?id="+id+"&cases=list_student_wrtCourse_dropdown",false);
        xmlhttp.send();//alert("count is 5 and id is "+id);
		return status;
    }

</script>
  <script>
function loadtable(id,id_cid,obj){
	//var id_cid=document.getElementById('c_select_id').value;
	var status=false;
	//alert("1");
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
	if (this.readyState == 4 && this.status == 200) {
		
		//alert("count is 2 and id is "+id_cid);
		//alert(this.responseText);
		document.getElementById('tbody').innerHTML=this.responseText;
	}
};
		//alert("count is 3 and id is "+id);
        xmlhttp.open("GET", "../includes/classes/ajax_delete.php?id="+id+"&c_id="+id_cid+"&cases=predict_table",false);//alert("count is 4 and id is "+id);
        xmlhttp.send();//alert("count is 5 and id is "+id +id_cid);
		return status;
    }

</script>
<!--ajax for predict button onlick on ajax-->
<script>
function predictstudent(e){
	  e.preventDefault();
	var id=document.getElementById('s_id').value;
	var status=false;
	//alert("std_id=="+id);
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
	if (this.readyState == 4 && this.status == 200) {
		//alert(this.responseText);
		//alert("count is 2 and std_id is "+id);
		document.getElementById('lbl_answer').innerHTML=this.responseText;
		
	}
};
		//alert("count is 3 and std_id is "+id);
		//alert(this.responseText);
        xmlhttp.open("GET", "../includes/classes/ajax_delete.php?id="+id+"&cases=predict_student",false);//alert("count is 4 and id is "+id);
        xmlhttp.send();
		//alert("count is 5 and std_id is "+id);
		return status;
    }

</script>
<script>/*
$(function() {
  $('#s_id').change(function(){
    $('#btn_pre').show();
  });
  $('#btn_pre').click(function(){
    if($('#lbl_answer').text() != '')
	{
		$('#btn_pre').hide();
	}
	else
	{
		$('#btn_pre').show();
	}	style="display:none;"
  });
});*/
</script>

