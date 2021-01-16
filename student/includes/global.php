<?php

session_start();
//$root = $_SERVER['DOCUMENT_ROOT']."/fyp_new/";
//include_once $root.'instructor/includes/config.php';
include_once 'config.php';
/* use Phpml\Classification\KNearestNeighbors; */
include_once "mysql.php";
$DB = new mysql_functions();

/*include_once "classes/DbConnect.php";
$link = new DbConnect();
*/
include_once "classes/student.php";
$students = new student();

include_once "classes/instructor.php";
$instructors = new instructor();

include_once "classes/course.php";
$courses = new course();

include_once "classes/Assignment.php";
$assignments = new Assignment();

include_once "classes/Announcement.php";
$announcements = new Announcement();

include_once "classes/quiz.php";
$quiz = new quiz();
/*
include_once "classes/admin.php";
$admin = new admin();
*/


?>
