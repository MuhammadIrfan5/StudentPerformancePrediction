<?php include "../includes/header.php";?>
<?php $s_details = $students->get_student_by_id($_GET["id"]); ?>
<?php
if(!empty($_GET['id']))
{
	if($_SESSION["std_id"] == $_GET["id"])
	{
		//return true;
	}
	else
	{
		header('location:../pages/home.php');
	}
}
?>
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
											<img src="<?php echo $s_details["std_image_path"]; ?>" />
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
                                                                <div class="form-group">
                                                                    <input name="std_fname" value='<?php echo $s_details["std_fname"]; ?>' type="text" class="form-control" placeholder="First Name">
                                                                </div>
																<div class="form-group">
                                                                    <input name="std_lname" value='<?php echo $s_details["std_lname"]; ?>' type="text" class="form-control" placeholder="last Name">
                                                                </div>
																<div class="form-group">
                                                                    <input name="std_email" value='<?php echo $s_details["std_email"]; ?>' type="email" class="form-control" placeholder="Email">
                                                                </div>
																<div class="form-group">
                                                                    <input name="std_password" value='<?php echo $s_details["std_password"]; ?>' type="password" class="form-control" placeholder="Password">
                                                                </div>
																<div class="form-group">
                                                                    <input name="std_regno" value='<?php echo $s_details["std_regno"]; ?>' type="number" class="form-control" placeholder="Registration Number">
                                                                </div>
																<div class="file-upload-inner ts-forms">
																	<div class="input prepend-big-btn">
																		<label class="icon-right" for="prepend-big-btn">
																				<i class="fa fa-download"></i>
																			</label>
																		<div class="input-group">
																			<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
																			<input type="file" class="form-control" name="std_image_path" id="username"  placeholder="Choose Post Image"/>
																		</div>
																	</div>
																</div>
															</div>
															<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="chosen-select-single mg-b-20">
																	<select data-placeholder="Choose a Department..." value='<?php echo $s_details["dept_id"]; ?>' name="dept_id" class="chosen-select form-control" tabindex="-1">
																			<option disabled selected value='<?php echo $s_details["dept_id"]; ?>'><?php echo $s_details["dep_title"]; ?></option>
																			<?php echo $courses->list_department_dropdown(); ?>
																	</select>
																</div>
																<div class="chosen-select-single mg-b-20">
																	<select data-placeholder="Choose a Gender..." <?php echo $s_details["std_gender"]; ?>  name="std_gender" class="chosen-select form-control" tabindex="-1">
																			<option disabled selected value='<?php echo $s_details["std_gender"]; ?>'><?php echo $s_details["std_gender"]; ?></option>
																			<option value="Male">Male</option>
																			<option value="Female">Female</option>
																	</select>
																</div>
																<div class="form-group">
                                                                    <input name="std_mobile" value='<?php echo $s_details["std_mobile"]; ?>' type="number" class="form-control" placeholder="Mobile No">
                                                                </div>
																<div class="form-group">
                                                                    <textarea placeholder="Enter Address" name="std_address"><?php echo $s_details["std_address"]; ?></textarea>
                                                                </div>
																
																
															</div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="payment-adress">
                                                                    <button type="submit" name="btn_edit_profile" class="btn btn-primary waves-effect waves-light">Edit</button>
                                                                </div>
                                                            </div>
														</div></br>
														<div class="row">
															<div class="col-lg-12">
																<div class="payment-adress mg-t-15">
																	<button type="submit" name="delete_img" class="btn btn-primary waves-effect waves-light mg-b-15">Delete Image  <i class="fa fa-trash-o"></i></button>
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
if(isset($_POST['btn_edit_profile']))
{
    $std_array = array(  
                     //'fname'               =>     $_FILES["r_image"],
                     'std_fname'               =>     $_POST["std_fname"],
					 'std_lname'               =>     $_POST["std_lname"],  
                     'std_email'               =>     $_POST["std_email"],  
                     'std_password'          =>     $_POST["std_password"],
                     'dept_id'          =>     $_POST["dept_id"],
                     'std_regno'          =>     $_POST["std_regno"],
                     'std_image_path'          =>     $_FILES["std_image_path"],
                     'std_gender'          =>     $_POST["std_gender"],
                     'std_address'          =>     $_POST["std_address"],
                     'std_mobile'          =>     $_POST["std_mobile"]
				); 
    echo $students->edit_profile($std_array,$_SESSION['std_id']);
}
?>
<?php
if(isset($_POST["delete_img"]))
	{
		$students->delete_image_std($_SESSION["std_id"]);
	}
?>