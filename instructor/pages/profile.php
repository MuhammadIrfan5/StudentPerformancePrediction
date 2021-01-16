<?php include "../includes/header.php";?>
<?php
$i_details = $instructors->get_instructor_by_id($_GET["id"]);
?>
<?php
if(!empty($_GET['id']))
{
	if($_SESSION["inst_id"] == $_GET["id"])
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
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="profile-info-inner">
                            <div class="profile-img">
								<img src="<?php echo $i_details["inst_image_path"]; ?>" alt="" />
							</div>
							<div class="profile-details-hr">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                        <div class="address-hr">
                                            <p><b>Name</b><br/><?php echo $i_details["inst_fname"].'-'.$i_details["inst_lname"]; ?></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                        <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                            <p><b>Password</b><br /> <?php echo $i_details["inst_password"]; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                        <div class="address-hr">
                                            <p><b>Email ID</b><br /><?php echo $i_details["inst_email"]; ?></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                        <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                            <p><b>Registration No</b><br /> <?php echo $i_details["inst_regno"]; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="address-hr">
                                            <p><b>Address</b><br /><?php echo $i_details["inst_address"]; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                        <div class="address-hr">
                                            <a href="#"><i class="fa fa-facebook"></i></a>
                                            <h3>500</h3>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                        <div class="address-hr">
                                            <a href="#"><i class="fa fa-twitter"></i></a>
                                            <h3>900</h3>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                        <div class="address-hr">
                                            <a href="#"><i class="fa fa-google-plus"></i></a>
                                            <h3>600</h3>
                                        </div>
                                    </div>
									    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
						 <div class="product-payment-inner-st res-mg-t-30 analysis-progrebar-ctn">
								<ul id="myTabedu1" class="tab-review-design">
									<!--<li class="active"><a href="#description">Activity</a></li>-->
									
									<li><a href="#INFORMATION">Update Details</a></li>
								</ul>
								<div id="myTabContent" class="tab-content custom-product-edit">
									<!--<div class="product-tab-list tab-pane fade active in" id="description">
										<div class="row">
										   <div class="static-table-list">
										<table class="table">
											<thead>
												<tr>
													<th>First Name</th>
													<th>Last Name</th>
													<th>Email</th>
													<th>Password</th>
													<th>Registration No</th>
													<th>Address</th>
													<th>Gender</th>
													<th>Dob</th>
													<th>Edit</th>
												</tr>
											</thead>
											<tbody>
												<?php //echo $instructors->list_instructor($_SESSION["inst_id"]); ?>
											</tbody>
										</table>
									</div>

										</div>
									</div>-->
								   
									<div class="product-tab-list tab-pane fade active in" id="INFORMATION">
										<div class="row">
											<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
												<div class="review-content-section">
													<form method="POST" enctype="multipart/form-data" id="editinst">
														<div class="row">
															<div class="col-lg-6">
																<div class="form-group">
																	<input name="inst_fname" type="text" value='<?php echo $i_details["inst_fname"]; ?>' class="form-control" placeholder="First Name">
																</div>
																<div class="form-group">
																	<input type="text" name="inst_lname" value='<?php echo $i_details["inst_lname"]; ?>' class="form-control" placeholder="Last Name">
																</div>
																<div class="form-group">
																	<input type="text" name="inst_address" value='<?php echo $i_details["inst_address"]; ?>' class="form-control" placeholder="Address">
																</div>
																<div class="form-group">
																	<input type="date" name="inst_dob" value='<?php echo $i_details["inst_dob"]; ?>' class="form-control" placeholder="Date of Birth">
																</div>
																<div class="form-group">
																	<input type="number" name="inst_regno" value='<?php echo $i_details["inst_regno"]; ?>' class="form-control" placeholder="registration No">
																</div>
																<div class="file-upload-inner ts-forms">
																	<div class="input prepend-big-btn">
																		<label class="icon-right" for="prepend-big-btn">
																				<i class="fa fa-download"></i>
																			</label>
																		<div class="input-group">
																			<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
																			<input type="file" class="form-control" name="inst_image_path" id="username"  placeholder="Choose Post Image"/>
																		</div>
																	</div>
																</div>
															</div>
															<div class="col-lg-6">
																
																<div class="form-group">
																	<select class="form-control" name="inst_gender" 
																	<?php if($i_details["inst_gender"] == "Male"){?> value =<?php echo $i_details["inst_gender"];} else{?> value=<?php echo $i_details["inst_gender"];}?> >
																		<option value="Male">Male</option>
																		<option value="Female">Female</option>
																	</select>
																</div>
																<div class="form-group">
																	<input type="email" name="inst_email"  value='<?php echo $i_details["inst_email"]; ?>' class="form-control" placeholder="Email" disabled>
																</div>
																<div class="form-group">
																	<input type="password" name="inst_password" value='<?php echo $i_details["inst_password"]; ?>' class="form-control" placeholder="Password">
																</div>
																<input type="number" name="inst_mobile" value='<?php echo $i_details["inst_mobile"]; ?>' class="form-control" placeholder="Mobile no.">
															</div>
														</div>
													
														<div class="row">
															<div class="col-lg-12">
																<div class="payment-adress mg-t-15">
																	<button type="submit" name="btn_inst" class="btn btn-primary waves-effect waves-light mg-b-15">Edit</button>
																</div>
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
<?php include "../includes/footer.php";?>

<?php
//left side array name right side textfield name
	if(isset($_POST["btn_inst"]))
	{
		$edt_inst_array = array(  
                     //'fname'               =>     $_FILES["r_image"],
					 //'session_id_inst'               =>     $_SESSION['inst_id'],
                     'inst_fname'               =>     $_POST["inst_fname"],
					 'inst_lname'               =>     $_POST["inst_lname"],   
                     'inst_password'          =>     $_POST["inst_password"],
					 'inst_regno'               =>     $_POST["inst_regno"], 
					 'inst_dob'               =>     $_POST["inst_dob"], 
					'inst_gender'          =>     $_POST["inst_gender"],
                     'inst_mobile'          =>     $_POST["inst_mobile"],
					 'inst_address'               =>     $_POST["inst_address"],
					 'inst_image_path'               =>     $_FILES["inst_image_path"],
					 
                ); 
		$instructors->edit_instructor($edt_inst_array,$_SESSION["inst_id"],$_SESSION["inst_email"]);
	}
?>
<?php
if(isset($_POST["delete_img"]))
	{
		$instructors->delete_image_inst($_SESSION["inst_id"]);
	}
?>

