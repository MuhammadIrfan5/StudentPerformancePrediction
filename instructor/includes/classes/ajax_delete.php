<?php
include realpath(__DIR__.'/..')."/global.php";


?>
<?php

switch($_GET['cases'])
		{
			
		case "delete_course": 
			echo $courses->delete_course($_GET['id']);
		break;
		
		case "unregister_student_course": 
			echo $courses->unregister_student_course($_GET['id']);
		break;
		
		case "course_reg_list": 
			echo $courses->course_reg_list($_SESSION['inst_id'],$_GET['id']);
		break;
		
		case "delete_assignment": 
			echo $assignments->delete_assignment($_GET['id']);
		break;
		
		case "delete_announcement": 
			echo $announcements->delete_announcement($_GET['id']);
		break;
		
		case "delete_quiz": 
			echo $quiz->delete_quiz($_GET['id']);
		break;
		
		case "delete_mid": 
			echo $quiz->delete_mid($_GET['id']);
		break;
		
		case "predict_table": 
			echo $courses->getcourses_student($_GET['id'],$_GET['c_id']);
		break;
		
		case "predict_student": 
			echo $predict->sppm_regression_new($_GET['id']);
		break;
		
		case "list_student_wrtCourse_dropdown": 
			echo $courses->list_student_wrtCourse_dropdown($_SESSION['inst_id'],$_GET['id']);
		break;
		
		case "list_course_wrtDep_dropdown": 
			echo $courses->list_course_wrtDep_dropdown($_SESSION['inst_id'],$_GET['id']);
		break;
		
		case "loadAnnouncement": 
			echo $announcements->list_announce($_GET['id'],$_SESSION['inst_id']);
		break;
		
		case "loadQuiz": 
			echo $quiz->list_quiz($_GET['id'],$_SESSION['inst_id']);
		break;
		
		case "loadmid": 
			echo $mids->list_mid($_SESSION['inst_id'],$_GET['id']);
		break;
		
		case "loadAssign": 
			echo $assignments->list_assignment($_GET['id'],$_SESSION['inst_id']);
		break;
		
		case "list_assignment_dropdown": 
			echo $assignments->list_assignment_dropdown($_SESSION['inst_id'],$_GET['id']);
		break;
		
		case "list_assignment_marks": 
			echo $assignments->list_assignment_marks($_GET['id'],$_SESSION['inst_id']);
		break;
		
		case "save_marks": 
			echo $assignments->save_marks($_GET['id'],$_GET['c_id'],$_GET['marks'],$_SESSION['inst_id']);
		break;
		}
?>
