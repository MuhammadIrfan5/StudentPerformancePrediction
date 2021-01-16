<?php include "../includes/header.php";?>
<?php $a_details = $quiz->get_quiz_by_id($_GET["id"]); ?>
<!-- Single pro tab review Start-->
        <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a href="#description">Edit Quiz</a></li>
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
                                                                    <input name="quiz_title" value='<?php echo $a_details["quiz_title"]; ?>' type="text" class="form-control" placeholder="Quiz Title">
                                                                </div>
                                                                <!--<div class="form-group">
                                                                    <input name="finish" id="finish" type="text" class="form-control" placeholder="Course Start Date">
                                                                </div>-->
																<div class="form-group">
																<label>Quiz Timing</label>
                                                                    <input id="timing" name="quiz_time" value='<?php echo $a_details["quiz_time"]; ?>' type="time" class="form-control" placeholder="Time">
                                                                </div>
                                                                <div class="form-group">
																<label>Quiz Date</label>
                                                                    <input name="quiz_date" value='<?php echo $a_details["quiz_date"]; ?>' type="date" class="form-control">
                                                                </div>
																<div class="form-group">
                                                                    <input name="quiz_total_marks" type="number" value='<?php echo $a_details["quiz_total_marks"]; ?>' class="form-control" placeholder="Quiz Total Marks">
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
																	<select data-placeholder="Choose a Department..." value='<?php echo $a_details["dep_title"]; ?>' name="dep_title" class="chosen-select form-control" tabindex="-1">
																			<option selected><?php echo $a_details["dep_title"]; ?></option>
																			<?php echo $courses->list_department_dropdown(); ?>
																	</select>
																</div>
															
																
																<div class="form-group">
                                                                    <input name="inst_id" value='<?php echo $_SESSION["inst_fname"]; ?>'; type="text" disabled class="form-control" placeholder="Professor">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
																<select data-placeholder="Choose a Course..." name="course_id" class="chosen-select form-control" tabindex="-1">
																	<option selected><?php echo $a_details["course_name"]; ?></option>
																	<?php echo $courses->list_course_dropdown($_SESSION['inst_id']); ?>
																</select>
																<div class="form-group">
                                                                    <textarea name="quiz_desc" placeholder="Quiz Description"><?php echo $a_details["quiz_desc"]; ?></textarea>
                                                                </div>
															<div class="bt-df-checkbox pull-left">
																<div class="i-checks pull-left">
																	<input type="checkbox" value="1" name="quiz_sts" <?php echo $a_details['quiz_sts']==0?"":"checked"; ?>> <i></i> Visibility </label>
																</div>
															</div>	
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="payment-adress">
                                                                    <button type="submit" name="btn_edit_quiz" class="btn btn-primary waves-effect waves-light">Submit</button>
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
	if(isset($_POST["btn_edit_quiz"]))
	{
		// left side array name right side textfield name
		$quiz_array = array(  
					'id'               =>     $_GET["id"],
                     'quiz_title'     =>     $_POST["quiz_title"],
					 'quiz_time'     =>     $_POST["quiz_time"],  
                     'quiz_date'      =>     $_POST["quiz_date"],  
                     'quiz_desc'     =>     $_POST["quiz_desc"],
                     'quiz_total_marks'    =>     $_POST["quiz_total_marks"],
                     'course_id'    =>     $_POST["course_id"],
                     'dep_title'    =>     $_POST["dep_title"],
                     'quiz_sts'    =>     $_POST["quiz_sts"]
                ); 
		//echo $_POST["uloc"];
		$quiz->edit_quiz($quiz_array,$_SESSION["inst_id"]);
	}
?>

