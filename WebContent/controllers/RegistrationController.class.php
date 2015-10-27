<?php
class RegistrationController {

	/*public static function run() {
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$user = new User($_POST);
			$userData = new UserData($_POST);  
			if ($user->getErrorCount() == 0 && $userData->getErrorCount() == 0) 
				homeView::show($user);
		    else  
				registrationView::show($user, $userData);
		} else  // Initial link
			registrationView::show(null, null);
	}*/
		    
    public static function run() {
    	$user = null;
    	if ($_SERVER["REQUEST_METHOD"] == "POST") {
    		$user = new User($_POST);
    		$userData = new UserData($_POST);
    		$users = UsersDB::getUsersBy('username', $user->getUserName());
    		if (!empty($users))
    			$user->setError('username', 'USER_NAME_ALREADY_EXISTS');
    			
    		if ($user->getErrorCount() == 0 && $userData->getErrorCount() == 0) {
    			$userId = UsersDB::addUser($user);
    			$user->setUserId($userId);
    			homeView::show($user);
    		} else
    			registrationView::show($user);
    	} else  // Initial link
    		registrationView::show(null);
    }    
}
?>