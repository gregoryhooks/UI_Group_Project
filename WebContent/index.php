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
	 if (!isset($_SESSION['user']))
	 	$_SESSION['user'] = null;
	 
	 
	 	$answers = new Answers();
	 	
	 if(is_null($_SESSION['answers']))	
	 	$_SESSION['answers'] = $answers;
	 
	switch ($control) {
		case "save":
			UserSavesDB::addUserSave($_SESSION['user']->getUserId(), $_SESSION['action']);
			//echo '<br><br><br><br><br><br><br><br>';
			//echo $_SESSION['user']->getUserId();
			//print_r($_SESSION['user']);
			header('Location: /'.$_SESSION['base'].'/home');
			break;
		case "remove":
			UserSavesDB::removeUserSave($_SESSION['user']->getUserId(), $_SESSION['action']);
			//echo '<br><br><br><br><br><br><br><br>';
			//echo $_SESSION['user']->getUserId();
			//print_r($_SESSION['user']);
			header('Location: /'.$_SESSION['base'].'/yourpcs');
			break;
		case "home":
			if(is_null($_SESSION['user']))
				homeView::show();
			else
				UserView::show();
				break;
		case "login":
			LoginController::run();
			break;
		case "logout":
			$_SESSION['user'] = null;
			homeView::show();
			break;
		case "user":
			userviewController::run();
			break;
		case "registration":
			RegistrationController::run();
			break;
		case "yourpcs":
			YourPCsController::run();
			break;
		case "questions":
			QuestionsController::run();
			break;
		case "build":
			BuildController::run();
			break;
		case "prebuilt":
			PrebuiltController::run();
			break;
		default:
			if(is_null($_SESSION['user']))
				homeView::show();
			else
				UserView::show();
				break;
	};
	ob_end_flush();
?>