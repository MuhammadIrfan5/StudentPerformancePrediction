<?php

session_start();
$root = $_SERVER['DOCUMENT_ROOT']."/fyp_new/";
include_once $root.'includes/config.php';

include_once $root."classes/DbConnect.php";
$link = new DbConnect();


include_once $root."classes/admin.php";
$admin = new admin();
/*
include_once $root."classes/InternetPackages.php";
$IPackage = new InternetPackages();

include_once $root."classes/SharingSite.php";
$sharing = new SharingSite();
*/
?>
