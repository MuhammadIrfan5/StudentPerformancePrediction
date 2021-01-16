<?php
require('../mysql.php');


$course_dep = $_GET['course_dep'];

$sql="SELECT tbl_course WHERE course_id=2";
$result = mysqli_query($dbCon,$sql);

while($row = mysqli_fetch_array($result)) {
    $course_name = $row['course_name'];

echo "<option value=''>$course_name</option>";
}




?>
