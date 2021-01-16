<?php include("../includes/global.php");

$q = $_GET['q'];
echo "<script>alert('Hello Working');</script>";
$con = mysqli_connect(DB_HOST,DB_USERNAME, DB_PASSWORD, DB_NAME);



?>