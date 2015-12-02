<?php
class LoginController {

	/*public static function run() {
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$user = new User($_POST);  
			if ($user->getErrorCount() == 0) 
				homeView::show($user);
		    else  
				loginView::show($user);
		} else  // Initial link
			loginView::show(null);
	}*/
		    
	    public static function run() {
	    	$user = null;
	    	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	    		$user = new User($_POST);
	    		$users = UsersDB::getUsersBy('username', $user->getUserName());
	    		if (empty($users))
	    			$user->setError('username', 'USER_NAME_DOES_NOT_EXIST');
	    		else {
	    			if (strcmp($user->getPassword(), $users[0]->getPassword()) != 0)
	    				$user->setError('password', 'PASSWORD_INCORRECT');
	    			else
	    				$user = $users[0];
	    		}
	    
	    	}
	    	$_SESSION['user'] = $user;
	    	if (is_null($user) || $user->getErrorCount() != 0) {
	    		userviewController::run();
	    	} else {
	    		homeView::show();
	    		//header('Location: /'.$_SESSION['base']);
	    	}
	    }
}
?>