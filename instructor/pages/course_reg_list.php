<?php include "../includes/header.php";?>
    <div class="container-fluid">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h1>Registered Student List</h1>
			<label>Select Department</label>
				<select data-placeholder="Choose a Department..." OnChange="loadcourse(this.value,this)" name="dep_title" class="chosen-select form-control" tabindex="-1">
					<option value='' disabled selected>Choose Department</option>
					<?php echo $courses->list_department_dropdown(); ?>
				</select>
			<label>Select Course</label>
				<select data-placeholder="Choose a Course..." id="c_id" OnChange="loadstudentcourse(this.value,this)" name="course_name" class="chosen-select form-control" tabindex="-1">
					<option value='' disabled selected>Choose Course</option>
					<?php //echo $courses->list_course_dropdown($_SESSION['inst_id']); ?>
				</select>
			</div>
	</div>			
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
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                
                                                <th  data-editable="false">Course Name</th>
                                                <th  data-editable="false">Course Code</th>
                                                <th  data-editable="false">Course Days</th>
                                                <th  data-editable="false">Course Department</th>
                                                <th  data-editable="false">Student First Name</th>
                                                <th  data-editable="false">Student Last Name</th>
                                                <th  data-editable="false">Registration No</th>
                                                <th  data-field="action">Edit</th>
                                                <th >Unregister</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody id="tbody">
                                            <?php //echo $courses->course_reg_list($_SESSION['inst_id']); ?>
                                        </tbody>
                                    </table>
                                </div>
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
function loadstudentcourse(id,obj){
	var status=false;
	//alert("1");
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
	if (this.readyState == 4 && this.status == 200) {
		//var id=document.getElementById('c_select_id').value;
	//	alert("count is 2 and id is "+id);
		//alert(this.responseText);
		document.getElementById('tbody').innerHTML=this.responseText;
	}
};
		//alert("count is 3 and id is "+id);
        xmlhttp.open("GET", "../includes/classes/ajax_delete.php?id="+id+"&cases=course_reg_list",false);//alert("count is 4 and id is "+id);
        xmlhttp.send();//alert("count is 5 and id is "+id);
		return status;
    }

</script>
<script>
//var tbl = $("#tbl_mh_list").Datatable();
$(document).on('click','.btn_delete',function(e){
	var cid = $(this).attr('id');
	//alert(cid);
	if(unregister_student(cid,$(this)))
	{
		var rowtodelete = document.getElementById('row_'+cid);
		rowtodelete.parentNode.removeChild(rowtodelete);
	}
});

</script>
<script>
function unregister_student(id,obj){
	//var id_cid=document.getElementById('c_id').value;
	var status=false;
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
	if (this.readyState == 4 && this.status == 200) {
		if(this.responseText==1)
		{
			status = true;
			//alert("Student Unregistered");
		}
	}
};
        xmlhttp.open("GET", "../includes/classes/ajax_delete.php?id="+id+"&cases=unregister_student_course",false);
        xmlhttp.send();
		return status;
    }

</script>
