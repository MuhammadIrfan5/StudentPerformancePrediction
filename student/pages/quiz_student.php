<?php include "../includes/header.php";?>
<?php //$announcements->restrict_announcements($_GET["id"],$_SESSION["std_id"]); ?>
<div class="login-form-area edu-pd mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="tab-content-details shadow-reset">
                            <h1>Quiz</h1>
                            <?php echo $quiz->quiz_student($_SESSION['std_id'],$_GET['id']); ?>
                        </div>
                    </div>
                </div>
			</div>				
</div>

<?php include "../includes/footer.php";?>