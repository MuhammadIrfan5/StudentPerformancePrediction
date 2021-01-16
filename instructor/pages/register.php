<?php 
	include "../includes/global.php";
	//$instructors = new instructor();
?>


<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Register | Instructor</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="../assets/css/owl.carousel.css">
    <link rel="stylesheet" href="../assets/css/owl.theme.css">
    <link rel="stylesheet" href="../assets/css/owl.transitions.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="../assets/css/animate.css">
	
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="../assets/css/normalize.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="../assets/css/main.css">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="../assets/css/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="../assets/css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="../assets/css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="../assets/css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="../assets/css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="../assets/css/calendar/fullcalendar.print.min.css">
    <!-- forms CSS
		============================================ -->
    <link rel="stylesheet" href="../assets/css/form/all-type-forms.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="../assets/style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="../assets/css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="../assets/js/vendor/modernizr-2.8.3.min.js"></script>
		
</head>

<body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
	<div class="error-pagewrap">
		<div class="error-page-int">
			<div class="text-center custom-login">
				<h3>Registration</h3>
				<p>Student performance prediction model !</p>
			</div>
			<div class="content-error">
				<div class="hpanel">
                    <div class="panel-body">
                        <form method="POST" enctype="multipart/form-data" id="loginForm">
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label>First name</label>
                                    <input class="form-control" placeholder="First Name" id="fname" onkeyup="myFunction(this.id)" name="fname" required>
                                </div>
								<div class="form-group col-lg-12">
                                    <label>Last name</label>
                                    <input class="form-control" placeholder="First Name" id="lname" onkeyup="myFunction(this.id)" name="lname" required>
                                </div>
								<div class="form-group col-lg-12">
                                    <label>Email Address</label>
                                    <input type="email" class="form-control" id="email" onkeyup="myFunction(this.id)" name="email" required>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Password</label>
                                    <input type="password" class="form-control" id="pass" onkeyup="myFunction(this.id)" name="pass" required>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Repeat Password</label>
                                    <input type="password" class="form-control" id="rpass" onkeyup="myFunction(this.id)" name="rpass" required>
                                </div>
                                
                                <div class="checkbox col-lg-12">
                                    <input type="checkbox" class="i-checks" id="fname" checked> Sigh up
                                </div>
                            </div>
                            <div class="text-center">
                                <input type="submit" value="Register" class="btn btn-success loginbtn" name="btn_register"/>
                               &nbsp; <a class="btn btn-default" href="../index.php">&nbsp Cancel &nbsp</a>
                            </div>
                        </form>
                    </div>
                </div>
			</div>
			<div class="text-center login-footer">
				<p>Copyright © 2018. All rights reserved. Muhammad Irfan <a href="">SPPM</a></p>
			</div>
		</div>   
    </div>
    	 <!-- jquery
		============================================ -->
    <script src="../assets/js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="../assets/js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="../assets/js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="../assets/js/jquery-price-slider.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="../assets/js/jquery.meanmenu.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="../assets/js/owl.carousel.min.js"></script>
    <!-- sticky JS
		============================================ -->
    <script src="../assets/js/jquery.sticky.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="../assets/js/jquery.scrollUp.min.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="../assets/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="../assets/js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="../assets/js/metisMenu/metisMenu.min.js"></script>
    <script src="../assets/js/metisMenu/metisMenu-active.js"></script>
    <!-- tab JS
		============================================ -->
    <script src="../assets/js/tab.js"></script>
    <!-- icheck JS
		============================================ -->
    <script src="../assets/js/icheck/icheck.min.js"></script>
    <script src="../assets/js/icheck/icheck-active.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="../assets/js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="../assets/js/main.js"></script>
    <!-- tawk chat JS
		============================================ -->
    <script src="../assets/js/tawk-chat.js"></script>
	
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	</body>

</html>

<?php
	if(isset($_POST["btn_register"]))
	{
		// left side array name right side textfield name
		$inst_array = array(  
                     //'fname'               =>     $_FILES["r_image"],
                     'fname'               =>     $_POST["fname"],
					 'lname'               =>     $_POST["lname"],  
                     'email'               =>     $_POST["email"],  
                     'pass'          =>     $_POST["pass"],
                     'rpass'          =>     $_POST["rpass"]
                ); 
		//echo $_POST["uloc"];
		$instructors->add_instructor($inst_array);
	}
?>

<script>
function myFunction(id) {
  var x = document.getElementById(id);
  //x.value = x.value.toUpperCase();
  if(x.value.length >= 10)
  {
	swal("Oops!","You can't enter more than 10 characters!","error");
  } 
}
</script>