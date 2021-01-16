<?php include "../includes/header.php";?>

<!-- Single pro tab review Start-->
        <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a href="#description">Class Details</a></li>
                                <!--<li><a href="#reviews"> Acount Information</a></li>
                                <li><a href="#INFORMATION">Social Information</a></li>-->
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div id="dropzone1" class="pro-ad addcoursepro">
                                                    <form action="" class="needsclick addcourse" id="demo1-upload">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
                                                                    <input name="classname" type="text" class="form-control" placeholder="Class Title" name="txt_name">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input name="finish" id="finish" type="text" class="form-control" placeholder="Course Code">
                                                                </div>
                                                                <div class="form-group">
																<label>Class Timings</label>
                                                                    <input name="duration" type="time" class="form-control" placeholder="Class Timing" name="txt_duration">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input name="Course Code" type="text" class="form-control" placeholder="Class Days" name="txt_code">
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
																	<select data-placeholder="Choose a Department..." class="chosen-select form-control" tabindex="-1">
																			<option value="">Department</option>
																			<option value="United States">BS(SE)</option>
																			<option value="United Kingdom">BBA</option>
																			<option value="Afghanistan">BS(CS)</option>
																	</select>
																</div>
															
																<div class="form-group">
                                                                    <input id="year" name="year" type="text" class="form-control" placeholder="Course Year">
                                                                </div>
																<div class="form-group">
                                                                    <input type="password" class="form-control" placeholder="Password">

                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                
                                                                <div class="form-group">
                                                                    <textarea name="description" placeholder="Description"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="payment-adress">
                                                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
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