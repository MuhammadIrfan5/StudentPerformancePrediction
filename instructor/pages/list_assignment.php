<?php include "../includes/header.php";?>
								
<form action="" method="POST" enctype="multipart/form-data" class="needsclick addcourse" id="demo1-upload">
<div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a href="#description">Assignments List</a></li>
                                <!--<li><a href="#reviews"> Acount Information</a></li>
                                <li><a href="#INFORMATION">Social Information</a></li>-->
                            </ul>
						</div>
					</div>	
				</div>
			</div>
</div>		
	<div class="edu-accordion-area mg-b-15">
		<div class="container-fluid">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			
			<label>Select Department</label>
				<select data-placeholder="Choose a Department..." OnChange="loadcourse(this.value,this)" name="dep_title" class="chosen-select form-control" tabindex="-1">
					<option value='' disabled selected>Choose Department</option>
					<?php echo $courses->list_department_dropdown(); ?>
				</select>
			<label>Select Course</label>
				<select data-placeholder="Choose a Course..." id="c_id" OnChange="loadAssign(this.value,this)" name="course_name" class="chosen-select form-control" tabindex="-1">
					<option value='' disabled selected>Choose Course</option>
					<?php //echo $courses->list_course_dropdown($_SESSION['inst_id']); ?>
				</select>	
				<!--<div class="payment-adress">
					<button type="submit" name="btn_list_assignment" class="btn btn-primary waves-effect waves-light">Submit</button>
				 </div>-->
				
						   <div class="admin-pro-accordion-wrap shadow-inner please_delete" id="tbody">
								<div class="panel-group edu-custon-design" id="accordion2">
									<!--<h2>Assignments of <?php //echo $courses->list_course_dropdown($_SESSION['inst_fname']); ?></h2>-->
								
									<?php
										/*	
											if(isset($_POST["btn_list_assignment"]))
											{
												// left side array name right side textfield name
												$assign_list_array = array(  
															 'course_name'     =>     $_POST["course_name"],
															 'dep_title'     =>     $_POST["dep_title"]
														); 
												//echo $_POST["uloc"];
												echo $assignments->list_assignment($assign_list_array,$_SESSION["inst_id"]);
											}*/
											//echo $assignments->list_assignment($assign_list_array,$_SESSION["inst_fname"]);
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
				
</div>
<?php include "../includes/footer.php";?>
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

 <script>
function loadAssign(id,obj){
	var status=false;
	//alert("1");
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
	if (this.readyState == 4 && this.status == 200) {
		//var id=document.getElementById('c_select_id').value;
	//	alert("count is 2 and id is "+id);
		//alert(this.responseText);
		document.getElementById('accordion2').innerHTML=this.responseText;
	}
};
		//alert("count is 3 and id is "+id);
        xmlhttp.open("GET", "../includes/classes/ajax_delete.php?id="+id+"&cases=loadAssign",false);//alert("count is 4 and id is "+id);
        xmlhttp.send();//alert("count is 5 and id is "+id);
		return status;
    }

</script>
<script>
$('.btn_delete').on('Click',function(e){
	var cid = $(this).attr('id');
	//alert(this.responseText + cid);
	if(delete_assignment(cid,$(this)))
	{
		//$("#tbl_user_list").rows($(this).closest('row')).remove();
		$('#delete_this').remove();
	}
})
</script>

<script>
function delete_assignment(id,obj){
	var status=false;
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
	if (this.readyState == 4 && this.status == 200) {
		//alert(this.responseText);
		if(this.responseText==1)
		{
			status = true;
			alert("Deleted");
		}
	}
};
        xmlhttp.open("GET", "../includes/classes/ajax_delete.php?id="+id+"&cases=delete_assignment",false);
        xmlhttp.send();
		return status;
    }

</script>


