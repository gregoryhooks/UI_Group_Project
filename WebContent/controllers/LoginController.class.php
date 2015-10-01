<?php
class LoginController {

	public static function run() {
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$user = new User($_POST);  
			if ($user->getErrorCount() == 0) 
				homeView::show($user);
		    else  
				loginView::show($user);
		} else  // Initial link
			loginView::show(null);
	}
}
?>