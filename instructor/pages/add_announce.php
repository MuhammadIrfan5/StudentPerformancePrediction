<?php include realpath(__DIR__.'/..')."/includes/header.php";?>
<!-- Single pro tab review Start-->
        <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a href="#description">Announcement Details</a></li>
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
                                                                    <input name="ann_title" type="text" class="form-control" placeholder="Announcement Title">
                                                                </div>
																<div class="chosen-select-single mg-b-20">
																	<select data-placeholder="Choose a Department..." OnChange="loadcourse(this.value,this)"  name="dep_title" class="chosen-select form-control" tabindex="-1">
																			<option value='' disabled selected>Choose Department</option>
																			<?php echo $courses->list_department_dropdown(); ?>
																	</select>
																</div>
																<div class="chosen-select-single mg-b-20">
																	<select data-placeholder="Choose a Course..." id="c_id" name="course_id" class="chosen-select form-control" tabindex="-1">
																			<option value='' disabled selected>Choose Course</option>
																			<?php //echo $courses->list_course_dropdown($_SESSION['inst_id']); ?>
																	</select>
																</div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
																<div class="form-group">
                                                                    <textarea name="ann_desc" placeholder="Announcement Description"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="payment-adress">
                                                                    <button type="submit" name="btn_add_announce" class="btn btn-primary waves-effect waves-light">Submit</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
													<!--<div class="form-group">
                                                         <label name="predict_title"> <?php //echo $announcements->mypred_function(); ?></label>
                                                    </div>
													<div class="form-group">
                                                         <label name="predict_title"> <?php //echo $announcements->sppm_regression(); ?></label>
                                                    </div>-->
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
	if(isset($_POST["btn_add_announce"]))
	{
		// left side array name right side textfield name
		$announce_array = array(  
                     'ann_title'     =>     $_POST["ann_title"],
                     'dep_title'     =>     $_POST["dep_title"],
                     'course_id'     =>     $_POST["course_id"],
                     'ann_desc'     =>     $_POST["ann_desc"]
                     
                ); 
		//echo $_POST["uloc"];
		$announcements->add_announce($announce_array,$_SESSION["inst_id"]);
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
