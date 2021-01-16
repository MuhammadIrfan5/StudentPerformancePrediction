<?php include "../includes/header.php";?>


<!-- Single pro tab review Start-->
        <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a href="#description">Add Department</a></li>
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
                                                                    <input name="dep_title" type="text" class="form-control" placeholder="Department Title">
                                                                </div>
																<div class="form-group">
                                                                    <input name="dep_code" type="text" class="form-control" placeholder="Department Code">
                                                                </div>
                                                                <div class="bt-df-checkbox pull-left">
																<div class="i-checks pull-left">
																	<input type="checkbox" value="1" name="dep_sts"/> <i></i> Visibility </label>
																</div>
															</div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="payment-adress">
                                                                    <button type="submit" name="btn_add_dep" class="btn btn-primary waves-effect waves-light">Submit</button>
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
	if(isset($_POST["btn_add_dep"]))
	{
		// left side array name right side textfield name
		$dep_array = array(  
                     'dep_title'     =>     $_POST["dep_title"],
					 'dep_code'     =>     $_POST["dep_code"],
					 'dep_sts'     =>     $_POST["dep_sts"],
                ); 
		//echo $_POST["uloc"];
		$depart->add_depart($dep_array);
	}
?>

