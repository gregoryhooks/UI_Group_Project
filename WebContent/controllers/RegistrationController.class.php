<?php
class RegistrationController {

	public static function run() {
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$user = new User($_POST);
			$userData = new UserData($_POST);  
			if ($user->getErrorCount() == 0 && $userData->getErrorCount() == 0) 
				homeView::show($user);
		    else  
				registrationView::show($user, $userData);
		} else  // Initial link
			registrationView::show(null, null);
	}
}
?>