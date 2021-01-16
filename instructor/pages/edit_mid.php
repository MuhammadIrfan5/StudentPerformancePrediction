<?php include "../includes/header.php";?>
<?php $a_details = $mids->get_mid_by_id($_GET["id"]); ?>
<!-- Single pro tab review Start-->
        <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a href="#description">Edit Mid</a></li>
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
                                                                    <input name="mid_title" value='<?php echo $a_details["mid_title"]; ?>' type="text" class="form-control" placeholder="Mid Title">
                                                                </div>
                                                                <!--<div class="form-group">
                                                                    <input name="finish" id="finish" type="text" class="form-control" placeholder="Course Start Date">
                                                                </div>-->
																<div class="form-group">
																<label>Mid Timing</label>
                                                                    <input id="timing" name="mid_time" value='<?php echo $a_details["mid_time"]; ?>' type="time" class="form-control" placeholder="Time">
                                                                </div>
                                                                <div class="form-group">
																<label>Mid Date</label>
                                                                    <input name="mid_date" value='<?php echo $a_details["mid_date"]; ?>' type="date" class="form-control">
                                                                </div>
																<div class="form-group">
                                                                    <input name="mid_total_marks" value='<?php echo $a_details["mid_total_marks"]; ?>' type="number" class="form-control" placeholder="Mid Total Marks">
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
																	<select data-placeholder="Choose a Department..." value='<?php echo $a_details["dep_title"]; ?>' OnChange="loadcourse(this.value,this)" name="dep_title" class="chosen-select form-control" tabindex="-1">
																			<option disabled selected><?php echo $a_details["dep_title"]; ?></option>
																			<?php echo $courses->list_department_dropdown(); ?>
																	</select>
																</div>
															
																
																<div class="form-group">
                                                                    <input name="inst_id" value='<?php echo $_SESSION["inst_fname"]; ?>';  type="text" disabled class="form-control" placeholder="Professor">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
																<select data-placeholder="Choose a Course..." id="c_id" value='<?php echo $a_details["course_id"]; ?>' name="course_id" class="chosen-select form-control" tabindex="-1">
																	<option disabled selected><?php echo $a_details["course_name"]; ?></option>
																</select>
																<div class="form-group">
                                                                    <textarea name="mid_desc" placeholder="Mid Description"><?php echo $a_details["mid_desc"]; ?></textarea>
                                                                </div>
															<div class="bt-df-checkbox pull-left">
																<div class="i-checks pull-left">
																	<input type="checkbox" value="1" name="mid_sts" <?php echo $a_details['mid_sts']==0?"":"checked"; ?>> <i></i> Visibility </label>
																</div>
															</div>	
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="payment-adress">
                                                                    <button type="submit" name="btn_edit_mid" class="btn btn-primary waves-effect waves-light">Submit</button>
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
	if(isset($_POST["btn_edit_mid"]))
	{
		// left side array name right side textfield name
		$mid_array = array(  
					 'id'               =>     $_GET["id"],
                     'mid_title'     =>     $_POST["mid_title"],
					 'mid_date'      =>     $_POST["mid_date"],  
					 'mid_time'     =>     $_POST["mid_time"],  
                     'mid_desc'     =>     $_POST["mid_desc"],
                     'course_id'    =>     $_POST["course_id"],
                     'dep_title'    =>     $_POST["dep_title"],
                     'mid_total_marks'    =>     $_POST["mid_total_marks"],
                     'mid_sts'    =>     $_POST["mid_sts"]
                ); 
		//echo $_POST["uloc"];
		$mids->edit_mid($mid_array,$_SESSION["inst_id"]);
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


