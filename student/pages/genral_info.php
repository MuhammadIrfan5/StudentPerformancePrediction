<?php include realpath(__DIR__.'/..')."/includes/header.php";?>

<!-- Single pro tab review Start-->
        <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a href="#description">Student Genral Information</a></li>
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
                                                                <div class="chosen-select-single mg-b-20">
																	<select data-placeholder="" required  name="gender" class="chosen-select form-control" tabindex="-1">
																			<option disabled selected >Select Your Gender ...</option>
																			<option value="1">Male</option>
																			<option value="2">Female</option>
																	</select>
																</div>
																<div class="form-group">
                                                                    <input name="age" type="number" class="form-control" placeholder="Age" required>
                                                                </div>
																<div class="form-group">
                                                                    <input name="fam_size" type="number" class="form-control" placeholder="Family size" required>
                                                                </div>
																<div class="chosen-select-single mg-b-20">
																<label>Choose a Father Highest Education </label>
																	<select name="father_edu" class="chosen-select form-control" tabindex="-1" required>
																			<option disabled selected >Select Your Father Education ...</option>
																			<option value="1">Primary Education</option>
																			<option value="2">Secondary Education</option>
																			<option value="3">Collage Education</option>
																			<option value="4">Bachelors Education</option>
																			<option value="5">Diploma Education</option>
																			<option value="6">Master's Education</option>
																			<option value="7">MPhill Education</option>
																			<option value="8">PHD Education</option>
																	</select>
																</div>
																<div class="chosen-select-single mg-b-20">
																<label>Choose a Mother Highest Education </label>
																	<select name="mother_edu" class="chosen-select form-control" tabindex="-1" required>
																			<option disabled selected >Select Your Mother Education ...</option>
																			<option value="1">Primary Education</option>
																			<option value="2">Secondary Education</option>
																			<option value="3">Collage Education</option>
																			<option value="4">Bachelors Education</option>
																			<option value="5">Diploma Education</option>
																			<option value="6">Master's Education</option>
																			<option value="7">MPhill Education</option>
																			<option value="8">PHD Education</option>
																	</select>
																</div>
																<div class="chosen-select-single mg-b-20">
																<label>Father Employement </label>
																	<select name="father_emp" class="chosen-select form-control" tabindex="-1" required>
																	<option disabled selected >Select Your Father Employement ...</option>
																			<option value="1">Employed</option>
																			<option value="2">Unemployed</option>
																			<option value="3">Other</option>
																	</select>
																</div>
																<div class="chosen-select-single mg-b-20">
																	<label>Mother Employement </label>
																		<select name="mother_emp" class="chosen-select form-control" tabindex="-1" required>
																		<option disabled selected >Select Your Mother Education ...</option>
																				<option value="1">Employed</option>
																				<option value="2">Unemployed</option>
																				<option value="3">House Wife</option>
																				<option value="4">Other</option>
																		</select>
																</div>
																<div class="form-group">
                                                                    <input name="time_travel_uni" type="number" class="form-control" required placeholder="Time Travel to University in minutes">
                                                                </div>
																<div class="chosen-select-single mg-b-20">
																	<label>Hobby</label>
																		<select name="hobby" class="chosen-select form-control" tabindex="-1"required>
																		<option disabled selected >Select Your Hobby ...</option>
																				<option value="1">Arts</option>
																				<option value="2">Games</option>
																				<option value="3">Sports</option>
																				<option value="4">Reading Novels/Books</option>
																				<option value="5">Gardening</option>
																				<option value="6">Other</option>
																		</select>
																</div>
																<div class="chosen-select-single mg-b-20">
																	<label>Have Any Free Time Acitvity</label>
																		<select name="free_time_act" class="chosen-select form-control" tabindex="-1" required>
																		<option disabled selected >Do You have any Free time activity ...</option>
																				<option value="1">Yes</option>
																				<option value="2">No</option>
																		</select>
																</div>
																<div class="chosen-select-single mg-b-20">
																	<label>Go Out With Family</label>
																		<select name="go_out_fam" class="chosen-select form-control" tabindex="-1" required>
																		<option disabled selected >Do you go out with family...</option> 
																				<option value="1">Yes a lot</option>
																				<option value="2">Often</option>
																				<option value="3">Not at all</option>
																		</select>
																</div>
																<div class="chosen-select-single mg-b-20">
																	<label>Your Health</label>
																		<select name="health" class="chosen-select form-control" tabindex="-1" required>
																		<option disabled selected >Select Your health status ...</option>
																				<option value="1">Healthy</option>
																				<option value="2">Chronic Disease</option>
																				<option value="3">Not Well most of the time</option>
																				<option value="4">Allergy</option>
																		</select>
																</div>
                                                            </div>
															<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
																
																<div class="chosen-select-single mg-b-20">
																	<label>Highest number of absence in last semester</label>
																		<select name="absence_last_sem" class="chosen-select form-control" tabindex="-1" required>
																		<option disabled selected >Select Your Absents ...</option>
																				<option value="1">none</option>
																				<option value="2">Less than 3</option>
																				<option value="3">greater than 3 less than 5</option>
																				<option value="4">Maximum allowed</option>
																				<option value="5">Exceed Limit</option>
																		</select>
																</div>
																<div class="chosen-select-single mg-b-20">
																	<label>Choose Your Inter Board</label>
																		<select name="board_edu" class="chosen-select form-control" tabindex="-1" required>
																		<option disabled selected >Select Your Educational Board...</option>
																				<option value="1">Sindh Board</option>
																				<option value="2">Punjab Board</option>
																				<option value="3">Balochistan Board</option>
																				<option value="4">KPK board</option>
																				<option value="5">Fedral Board</option>
																				<option value="6">Agha Khan Board</option>
																				<option value="7">Any International Board</option>
																		</select>
																</div>
																<div class="chosen-select-single mg-b-20">
																	<label>plan to study more after bachelors</label>
																		<select name="plan_to_study" class="chosen-select form-control" tabindex="-1" required>
																		<option disabled selected >Do you wanna study more after bachelors ...</option>
																				<option value="1">Yes i want to study more</option>
																				<option value="2">No, not at all</option>
																		</select>
																</div>
																<div class="chosen-select-single mg-b-20">
																	<label>Plan to work after study</label>
																	<select name="plan_to_work" class="chosen-select form-control" tabindex="-1" required>
																	<option disabled selected >Do you wanna work after bachelors ...</option>
																		<option value="1">Yes i want to work</option>
																		<option value="2">No, not at all</option>
																	</select>
																</div>
																<div class="chosen-select-single mg-b-20">
																	<label>Any Addiction</label>
																	<select  name="any_addiction" class="chosen-select form-control" tabindex="-1" required>
																	<option disabled selected >Do you have any Addiction ...</option>
																		<option value="1">Yes</option>
																		<option value="2">No</option>
																	</select>
																</div>
																<div class="chosen-select-single mg-b-20">
																	<div class="form-group">
																		<input name="cgpa_last_sem" type="number" class="form-control" placeholder="Cgpa In Last Semester" required>
																	</div>
																</div>
																<div class="chosen-select-single mg-b-20">
																	<div class="form-group">
																		<input name="percent_quiz_lastsem" type="number" class="form-control" placeholder="Percentage Scored in quiz In Last Semester.eg:50%" required>
																	</div>
																</div>
																<div class="chosen-select-single mg-b-20">
																	<div class="form-group">
																		<input name="percent_sessional_lastsem" type="number" class="form-control" placeholder="Percentage Scored in Seessionals In Last Semester.eg:50%" required>
																	</div>
																</div>
																<div class="chosen-select-single mg-b-20">
																	<label>Did You clear all subject in previous semester</label>
																	<select  name="clear_last_sem" class="chosen-select form-control" tabindex="-1" required>
																	<option disabled selected >Did You clear all subject in previous semester ...</option>
																		<option value="1">Yes</option>
																		<option value="2">No</option>
																	</select>
																</div>
																<div class="chosen-select-single mg-b-20">
																	<label>Any Part Time Job</label>
																	<select  name="any_parttime_job" class="chosen-select form-control" tabindex="-1" required>
																	<option disabled selected >Doing any part time job right now...</option>
																		<option value="1">Yes</option>
																		<option value="2">No</option>
																	</select>
																</div>
															</div>
                                                        </div>
														
														<div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="payment-adress">
                                                                    <button type="submit" name="btn_add_info" class="btn btn-primary waves-effect waves-light">Submit</button>
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

<?php include realpath(__DIR__.'/..')."/includes/footer.php";?>

<?php
	if(isset($_POST["btn_add_info"]))
	{
		// left side array name right side textfield name
		$std_array = array(  
                     //'fname'               =>     $_FILES["r_image"],
						'gender' => $_POST["gender"],
						'age' => $_POST["age"],
						'fam_size' => $_POST["fam_size"],
						'father_edu' => $_POST["father_edu"],
						'mother_edu' => $_POST["mother_edu"],
						'father_emp' => $_POST["father_emp"],
						'mother_emp' => $_POST["mother_emp"],
						'time_travel_uni' => $_POST["time_travel_uni"],
						'hobby' => $_POST["hobby"],
						'free_time_act' => $_POST["free_time_act"],
						'go_out_fam' => $_POST["go_out_fam"],
						'health' => $_POST["health"],
						'absence_last_sem' => $_POST["absence_last_sem"],
						'board_edu' => $_POST["board_edu"],
						'plan_to_study' => $_POST["plan_to_study"],
						'plan_to_work' => $_POST["plan_to_work"],
						'any_addiction' => $_POST["any_addiction"],
						'cgpa_last_sem' => floatval($_POST["cgpa_last_sem"]),
						'percent_quiz_lastsem' => $_POST["percent_quiz_lastsem"],
						'percent_sessional_lastsem' => $_POST["percent_sessional_lastsem"],
						'clear_last_sem' => $_POST["clear_last_sem"],
						'any_parttime_job' => $_POST["any_parttime_job"]
						); 
						$students->student_genral_info($std_array,$_SESSION["std_id"]);
	}
?>
