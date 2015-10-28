<?php
	ob_start();
	include("includer.php");   
	
	session_start();
	$url = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
	list($fill, $base, $control, $action, $arguments) =
			explode('/', $url, 5) + array("", "", "", "", null);
	 $_SESSION['base'] = $base;
	 $_SESSION['control'] = $control; 
	 $_SESSION['action'] = $action;
	 $_SESSION['arguments'] = $arguments;
	 
	 
	 	$answers = new Answers();
	 	
	 if(is_null($_SESSION['answers']))	
	 	$_SESSION['answers'] = $answers;
	 
	switch ($control) {
		case "login": 
			homeView::show();
			break;
		case "registration":
			RegistrationController::run();
			break;
		case "yourPCs":
			YourPCsController::run();
			break;
		case "questions":
			QuestionsController::run();
			break;
		default:
			homeView::show(null);
	};
	ob_end_flush();
?>