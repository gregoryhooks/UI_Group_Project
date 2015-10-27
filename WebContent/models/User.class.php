<?php
class User {
	private $errorCount;
	private $errors;
	private $formInput;
	private $username;
	private $password;
	private $userId;
	public $email;
	
	public function __construct($formInput = null) {
		$this->formInput = $formInput;
		Messages::reset();
		$this->initialize();
	}

	public function getError($errorName) {
		if (isset($this->errors[$errorName]))
			return $this->errors[$errorName];
		else
			return "";
	}

	public function setError($errorName, $errorValue) {
		// Sets a particular error value and increments error count
		$this->errors[$errorName] =  Messages::getError($errorValue);
		$this->errorCount ++;
	}

	public function getErrorCount() {
		return $this->errorCount;
	}

	public function getErrors() {
		return $this->errors;
	}

	public function getUserName() {
		return $this->username;
	}
	
	public function getPassword() {
		return $this->password;
	}
	
	public function getUserId() {
		return $this->userId;
	}
	
	public function getEmail() {
		return $this->email;
	}
	
	public function getParameters() {
		// Return data fields as an associative array
		$paramArray = array("username" => $this->username, "password" => $this->password); 
		return $paramArray;
	}
	
	public function setUserId($id) {
		// Set the value of the userId to $id
		$this->userId = $id;
	}

	public function __toString() {
		$str = "User name: ".$this->username." Password: ".$this->password;
		return $str;
	}
	
	private function extractForm($valueName) {
		// Extract a stripped value from the form array
		$value = "";
		if (isset($this->formInput[$valueName])) {
			$value = trim($this->formInput[$valueName]);
			$value = stripslashes ($value);
			$value = htmlspecialchars ($value);
			return $value;
		}
	}
	
	private function initialize() {
		$this->errorCount = 0;
		$errors = array();
		if (is_null($this->formInput))
			$this->initializeEmpty();
		else  	 
		   $this->validateUserName();
		   $this->validatePassword();
		   $this->validateEmail();
	}

	private function initializeEmpty() {
		$this->errorCount = 0;
		$errors = array();
	 	$this->username = "";
	 	$this->password = "";
	 	$this->email = "";
	}

	private function validateUserName() {
		// Username should only contain letters, numbers, dashes and underscore
		$this->username = $this->extractForm('username');
		if (empty($this->username))
			$this->setError('username', 'USER_NAME_EMPTY');
		elseif (!filter_var($this->username, FILTER_VALIDATE_REGEXP,
			array("options"=>array("regexp" =>"/^([a-zA-Z0-9\-\_])+$/i")) )) {
			$this->setError('username', 'USER_NAME_HAS_INVALID_CHARS');
			$this->errorCount ++;
		}
	}
	
	private function validatePassword() {
		// Password should not be blank
		$this->password = $this->extractForm('password');
		if (empty($this->password))
			$this->setError('password', 'PASSWORD_EMPTY');
	}
	
	private function validateEmail() {
		// Email should not have quoted characters
		$this->email = $this->extractForm('email');
		if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
			$this->setError('email', 'EMAIL_INVALID');
		}
	}
}
?>