<?php include "../includes/header.php";?>
<?php $a_details = $assignments->get_assignment_by_id($_GET["id"]); ?>
<!-- Single pro tab review Start-->
        <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a href="#description">Add Assignment</a></li>
                                <!--<li><a href="#reviews"> Acount Information</a></li>
                                <li><a href="#INFORMATION">Social Information</a></li>-->
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div id="dropzone1" class="pro-ad addcoursepro">
                                                    <form action="" method="POST" enctype="multipart/form-data" class="needsclick addcourse" id="demo1-upload">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
                                                                    <input name="assign_title" value='<?php echo $a_details["assign_title"]; ?>' type="text" class="form-control" placeholder="Assignment Title">
                                                                </div>
                                                                <!--<div class="form-group">
                                                                    <input name="finish" id="finish" type="text" class="form-control" placeholder="Course Start Date">
                                                                </div>-->
                                                               
                                                                <div class="form-group">
																<label>Starts From</label>
                                                                    <input name="assign_start_date" type="date" value='<?php echo $a_details["assign_start_date"]; ?>' class="form-control">
                                                                </div>
																<div class="form-group">
																<label>Ends At</label>
                                                                    <input name="assign_end_date" value='<?php echo $a_details["assign_end_date"]; ?>' type="date" class="form-control">
                                                                </div>
                                                                <!--<div class="form-group alert-up-pd">
                                                                    <div class="dz-message needsclick download-custom">
                                                                        <i class="fa fa-download edudropnone" aria-hidden="true"></i>
                                                                        <h2 class="edudropnone">Drop image here or click to upload.</h2>
                                                                        <p class="edudropnone"><span class="note needsclick">(This is just a demo dropzone. Selected image is <strong>not</strong> actually uploaded.)</span>
                                                                        </p>
                                                                        <input name="imageico" class="hd-pro-img" type="text" />
                                                                    </div>
                                                                </div>-->
																<div class="chosen-select-single mg-b-20">
																	<select data-placeholder="Choose a Department..." name="dep_title" value='<?php echo $a_details["dept_title"]; ?>' OnChange="loadcourse(this.value,this)" class="chosen-select form-control" tabindex="-1">
																			<option selected><?php echo $a_details["dep_title"]; ?></option>
																			<?php echo $courses->list_department_dropdown(); ?>
																	</select>
																</div>
															
																<div class="form-group">
																<label>Ends at Timing</label>
                                                                    <input id="timing" name="assign_time" value='<?php echo $a_details["assign_time"]; ?>' type="time" class="form-control" placeholder="Time">
                                                                </div>
																<div class="form-group">
                                                                    <input name="inst_name" value='<?php echo $_SESSION["inst_fname"]; ?>'; type="text" disabled class="form-control" placeholder="Professor">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
																<select data-placeholder="Choose a Course..." id="c_id" value='<?php echo $a_details["course_name"]; ?>' name="course_name" class="chosen-select form-control" tabindex="-1">
																	<option selected><?php echo $a_details["course_name"]; ?></option>
																	<?php //echo $courses->list_course_dropdown($_SESSION['inst_id']); ?>
																</select>
																<div class="form-group">
                                                                    <textarea name="assign_desc" placeholder="Assignment Description"><?php echo $a_details["assign_desc"];?></textarea>
                                                                </div>
																<div class="form-group">
                                                                    <input name="assign_total_marks" type="number" class="form-control" value='<?php echo $a_details["assign_total_marks"]; ?>' placeholder="Assignment Total Marks">
                                                                </div>
															<div class="bt-df-checkbox pull-left">
																<div class="i-checks pull-left">
																	<input type="checkbox" value="1" name="assign_sts" <?php echo $a_details['assign_sts']==0?"":"checked"; ?>> <i></i><label> Visibility </label>
																</div>
															</div>	
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="payment-adress">
                                                                    <button type="submit" name="btn_edt_assignment" class="btn btn-primary waves-effect waves-light">Submit</button>
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


<?php include "../includes/footer.php";?>

<?php
	if(isset($_POST["btn_edt_assignment"]))
	{
		// left side array name right side textfield name
		$assign_array = array(  
					'id'               =>     $_GET["id"],
                     'assign_title'     =>     $_POST["assign_title"],
					 'assign_start_date'     =>     $_POST["assign_start_date"],  
                     'assign_end_date'      =>     $_POST["assign_end_date"],  
                     'dep_title'     =>     $_POST["dep_title"],
                     'assign_time'    =>     $_POST["assign_time"],
                     'course_name'    =>     $_POST["course_name"],
                     'assign_desc'    =>     $_POST["assign_desc"],
					 'assign_total_marks'    =>     $_POST["assign_total_marks"],
                     'assign_sts'    =>     $_POST["assign_sts"]
                ); 
		//echo $_POST["uloc"];
		$assignments->edit_assignment($assign_array,$_SESSION["inst_id"]);
	}
?>

<script>
function loadcourse(id,obj){
	var status=false;
	//alert("1");
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
	if (this.readyState == 4 && this.status == 200) {
		//var id=document.getElementById('c_select_id').value;
	//	alert("count is 2 and id is "+id);
		//alert(this.responseText);
		document.getElementById('c_id').innerHTML=this.responseText;
		 $("#c_id").trigger("liszt:updated");
		$("#c_id").trigger("chosen:updated");
	}
};
		//alert("count is 3 and id is "+id);
        xmlhttp.open("GET", "../includes/classes/ajax_delete.php?id="+id+"&cases=list_course_wrtDep_dropdown",false);
        xmlhttp.send();//alert("count is 5 and id is "+id);
		return status;
    }

</script>




