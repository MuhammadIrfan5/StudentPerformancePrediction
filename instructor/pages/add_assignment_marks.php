<?php include realpath(__DIR__.'/..')."/includes/header.php";?>

<!-- Single pro tab review Start-->
        <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a href="#description">Assignment Marks</a></li>
                                <!--<li><a href="#reviews"> Acount Information</a></li>
                                <li><a href="#INFORMATION">Social Information</a></li>-->
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div id="dropzone1" class="pro-ad addcoursepro">
                                                    <!--<form action="" method="POST" enctype="multipart/form-data" class="needsclick addcourse" id="demo1-upload">-->
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
																<div class="chosen-select-single mg-b-20">
																	<select data-placeholder="Choose a Department..." onchange="loadcourse(this.value,this);" name="dep_title" class="chosen-select form-control" tabindex="-1">
																			<option value='' disabled selected>Choose Department</option>
																			<?php echo $courses->list_department_dropdown(); ?>
																	</select>
																</div>
																<div class="chosen-select-single mg-b-20">
																	<select data-placeholder="Choose a Course..." id="c_id" onchange="list_assignment_dropdown(this.value,this);" name="course_id" class="chosen-select form-control" tabindex="-1">
																		<option value='' disabled selected>Choose Course</option>
																		<?php //echo $courses->list_course_dropdown($_SESSION['inst_id']); ?>
																	</select>
																	<h1 id="txtHint"></h1>
																</div>
																<div class="chosen-select-single mg-b-20">
																	<select data-placeholder="Choose a Course..." id="assign_id" onchange="list_assignment_marks(this.value,this);" name="assign_id" class="chosen-select form-control" tabindex="-1">
																			<option value='' disabled selected>Choose Assignment</option>
																			<?php //echo $assignments->list_assignment_dropdown($_SESSION['inst_id']); ?>
																	</select>
																</div>
                                                            </div>
                                                        </div>
														
                                                  <!--  </form>-->
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
	
	<form action="" method="POST" enctype="multipart/form-data" class="needsclick addcourse" id="demo1-upload">
		<div class="data-table-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1>Courses <span class="table-project-n">Data</span> Table</h1>
                                </div>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <div id="toolbar">
                                        <select class="form-control dt-tb">
											<option value="">Export Basic</option>
											<option value="all">Export All</option>
											<option value="selected">Export Selected</option>
										</select>
                                    </div>
                                    <table id="table" class="tbl_delete" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <th  data-editable="false">Course Name</th>
                                                <th  data-editable="false">Assignment Title</th>
                                                <th  data-editable="false">Student First Name</th>
                                                <th  data-editable="false">Student Last Name</th>
                                                <th  data-editable="false">Registration No</th>
                                                <th  data-editable="false">Assignment Total Marks</th>
												<th  data-editable="false">Obtain Marks</th>				
                                            </tr>
                                        </thead>
                                        <tbody id='tbody'>
                                            <?php //echo $courses->list_course($_SESSION['inst_id']); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
					<div class="col-lg-12">
							<div class="payment-adress">
								<button type="submit" name="btn_add_marks" onclick="save_marks(event)" class="btn btn-primary waves-effect waves-light">Save</button>
							</div>
					</div>
                </div>
				<!--<form action="" method="POST" enctype="multipart/form-data" class="needsclick addcourse" id="demo1-upload">-->
					<div class="row">
						
					</div>
				<!--</form>-->
            </div>
        </div>
	</form>
<?php include "../includes/footer.php";?>

<?php
	/*if(isset($_POST["btn_add_announce"]))
	{
		// left side array name right side textfield name
		$announce_array = array(  
                     'ann_title'     =>     $_POST["ann_title"],
                     'dep_title'     =>     $_POST["dep_title"],
                     'course_id'     =>     $_POST["course_id"],
                     'ann_desc'     =>     $_POST["ann_desc"]
                     
                ); 
		//echo $_POST["uloc"];
		$announcements->add_announce($announce_array,$_SESSION["inst_fname"]);
	}*/
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
<script>
function list_assignment_dropdown(id,obj){
	var status=false;
	//alert("1");
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
	if (this.readyState == 4 && this.status == 200) {
		//var id=document.getElementById('c_select_id').value;
	//	alert("count is 2 and id is "+id);
		//alert(this.responseText);
		document.getElementById('assign_id').innerHTML=this.responseText;
		 $("#assign_id").trigger("liszt:updated");
		$("#assign_id").trigger("chosen:updated");
	}
};
		//alert("count is 3 and id is "+id);
        xmlhttp.open("GET", "../includes/classes/ajax_delete.php?id="+id+"&cases=list_assignment_dropdown",false);
        xmlhttp.send();//alert("count is 5 and id is "+id);
		return status;
    }

</script>
<script>
function list_assignment_marks(id,obj){
	var status=false;
	//alert("1");
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
	if (this.readyState == 4 && this.status == 200) {
		//var id=document.getElementById('c_select_id').value;
	//	alert("count is 2 and id is "+id);
		//alert(this.responseText);
		document.getElementById('tbody').innerHTML=this.responseText;
		 //$("#assign_id").trigger("liszt:updated");
		//$("#assign_id").trigger("chosen:updated");
	}
};
		//alert("count is 3 and id is "+id);
        xmlhttp.open("GET", "../includes/classes/ajax_delete.php?id="+id+"&cases=list_assignment_marks",false);
        xmlhttp.send();//alert("count is 5 and id is "+id);
		return status;
    }

</script>

<script>
function save_marks(e){
	e.preventDefault();
	var id=document.getElementById('assign_id').value;
	var id_cid=document.getElementById('c_id').value;
	var m = document.getElementsByClassName('std_mark').value;
	console.log(m);
	var status=false;
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() 
	{
		if (this.readyState == 4 && this.status == 200) 
		{
			//alert(this.responseText+'id is '+ id +"and c_id"+id_cid);
			console.log(m);
			document.getElementById('tbody').innerHTML=this.responseText;	
		}
	};
        xmlhttp.open("GET", "../includes/classes/ajax_delete.php?id="+id+"&c_id="+id_cid+"&marks="+m+"&cases=save_marks",false);
        xmlhttp.send();
		return status;
    }

</script>

