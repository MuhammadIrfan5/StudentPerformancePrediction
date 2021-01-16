<?php
session_start();
include_once 'config.php';

include_once "mysql.php";
$DB = new mysql_functions();

include_once "classes/admin.php";
$admins = new admin();

include_once "classes/instructor.php";
$instructors = new instructor();

include_once "classes/course.php";
$courses = new course();

include_once "classes/Assignment.php";
$assignments = new Assignment();

include_once "classes/quiz.php";
$quiz = new Quiz();

include_once "classes/Mid.php";
$mids = new Mid();

include_once "classes/Announcement.php";
$announcements = new Announcement();

include_once "classes/Prediction.php";
$predict = new prediction();

include_once "classes/department.php";
$depart = new department();

?>
