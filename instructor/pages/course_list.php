<?php include "../includes/header.php";?>
        
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
                                                <th  data-editable="false">Course Code</th>
                                                <th  data-editable="false">Instructor</th>
                                                <th  data-editable="false">Department</th>
                                                <th  data-editable="false">Course Time</th>
                                                <th  data-editable="false">Course Days</th>
												<th  data-editable="false">Semester</th>
                                                <th  data-field="action">Edit</th>												
                                                <th  >Delete</th>												
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php echo $courses->list_course($_SESSION['inst_id']); ?>
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
//var tbl = $("#tbl_mh_list").Datatable();
$(document).on('click','.btn_delete',function(e){
	var cid = $(this).attr('id');
	
	if(delete_course(cid,$(this)))
	{
		//alert("delete kr dea");
		//$(".tbl_delete").row($(this).closest('row')).remove();
		$(this).parent().parent().remove();
	}
});
</script>

<script>
function delete_course(id,obj){
	var status=false;
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
	if (this.readyState == 4 && this.status == 200) {
		alert(this.responseText);
		if(this.responseText==1)
		{
			//alert("yaha agaya");
			status = true;
			
		}
	}
};
        xmlhttp.open("GET", "../includes/classes/ajax_delete.php?id="+id+"&cases=delete_course",false);
        xmlhttp.send();
		return status;
    }

</script>
