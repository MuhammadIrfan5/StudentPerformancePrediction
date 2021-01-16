<?php include "../includes/header.php";?>
<!-- Single pro tab review Start-->
        <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a href="#description">Courses Details</a></li>
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
                                                                    <input name="coursename" type="text" class="form-control" placeholder="Course Name" >
                                                                </div>
                                                                <!--<div class="form-group">
                                                                    <input name="finish" id="finish" type="text" class="form-control" placeholder="Course Start Date">
                                                                </div>-->
                                                               
                                                                <div class="form-group">
                                                                    <input name="coursecode" type="text" class="form-control" placeholder="Course Code">
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
																	<select data-placeholder="Choose a Department..." name="dep_title" class="chosen-select form-control" tabindex="-1">
																			<?php echo $courses->list_department_dropdown(); ?>
																	</select>
																</div>
															
																<div class="form-group">
																<label>Course Timing</label>
                                                                    <input id="timing" name="coursetime" type="time" class="form-control" placeholder="Time">
                                                                </div>
																<div class="form-group">
                                                                    <input name="inst_name" value='<?php echo $_SESSION["inst_fname"]; ?>'; type="text" disabled class="form-control" placeholder="Professor">
                                                                </div>
																<div class="chosen-select-single mg-b-20">
																		<select data-placeholder="Choose a Semester..." name="sem_type" class="chosen-select form-control" tabindex="-1">
																				<?php echo $courses->list_semester_dropdown(); ?>
																		</select>
																</div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
																<div class="chosen-select-single">																	
																	<select data-placeholder="Choose Days..." name="course_days[]" class="chosen-select" multiple="" tabindex="-1">
																		<option value="">Select</option>
																		<option value="Monday">Monday</option>
																		<option value="Tuesday">Tuesday</option>
																		<option value="Wednesday">Wednesday</option>
																		<option value="Thursday">Thursday</option>
																		<option value="Friday">Friday</option>
																		<option value="Saturday">Saturday</option>
																		<option value="Sunday">Sunday</option>
																	</select>
																</div>
																<div class="form-group">
																<label>Course Year</label>
                                                                    <input id="timing" name="course_year" type="text" value='<?php echo date("Y"); ?>'; disabled class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="payment-adress">
                                                                    <button type="submit" name="btn_add_course" class="btn btn-primary waves-effect waves-light">Submit</button>
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
	if(isset($_POST["btn_add_course"]))
	{
		// left side array name right side textfield name
		$cour_array = array(  
                     'coursename'     =>     $_POST["coursename"],
					 'coursecode'     =>     $_POST["coursecode"],  
                     'dep_title'      =>     $_POST["dep_title"],  
                     'coursetime'     =>     $_POST["coursetime"],
                     'course_days'    =>     $_POST["course_days"],
                     'sem_type'    =>     $_POST["sem_type"],
                     
                ); 
		//echo $_POST["uloc"];
		$courses->add_course($cour_array,$_SESSION["inst_id"],date("Y"));
	}
?>
