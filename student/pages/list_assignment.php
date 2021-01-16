<?php include "../includes/header.php";?>
								
<form action="" method="POST" enctype="multipart/form-data" class="needsclick addcourse" id="demo1-upload">
	 <div class="edu-accordion-area mg-b-15">
		<div class="container-fluid">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<label>Select Course</label>
				<select data-placeholder="Choose a Course..." name="course_name" class="chosen-select form-control" tabindex="-1">
					<?php echo $courses->list_course_dropdown($_SESSION['inst_id']); ?>
				</select>
			<label>Select Department</label>
				<select data-placeholder="Choose a Course..." name="dep_title" class="chosen-select form-control" tabindex="-1">
					<?php echo $courses->list_department_dropdown(); ?>
				</select>
				
				<div class="payment-adress">
					<button type="submit" name="btn_list_assignment" class="btn btn-primary waves-effect waves-light">Submit</button>
				 </div>
				
						   <div class="admin-pro-accordion-wrap shadow-inner">
								<div class="alert-title">
									<!--<h2>Assignments of <?php //echo $courses->list_course_dropdown($_SESSION['inst_fname']); ?></h2>-->
								</div>
								<?php
										
										if(isset($_POST["btn_list_assignment"]))
										{
											// left side array name right side textfield name
											$assign_list_array = array(  
														 'course_name'     =>     $_POST["course_name"],
														 'dep_title'     =>     $_POST["dep_title"]
													); 
											//echo $_POST["uloc"];
											echo $assignments->list_assignment($assign_list_array,$_SESSION["inst_fname"]);
										}
										//echo $assignments->list_assignment($assign_list_array,$_SESSION["inst_fname"]);
								?>
								<?php  ?>
							</div>
						</div>
					</div>
				</div>
</div>
<?php include "../includes/footer.php";?>




