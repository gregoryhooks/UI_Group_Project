<?php
class LoginController {
	public static function run() {
		
	
		$user = null;
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$usertest = UsersDB::getUserBy('username', $_POST['userName']);
				
			if (is_null($usertest)){
				echo "User not in database";
				HomeView::show();
			}else{
				$user = $usertest;
				$_SESSION['user'] = $user;
				userviewController::run();
				print_r($_SESSION['user']->getErrors());
			}
		}

	}
}

?>