<?php
class PCList {
	private $errorCount;
	private $errors;
	private $pcList;
	private $pcListSize;
	
	public function __construct() {
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

	public function getPCList() {
		return $this->pcList;
	}
	
	public function getPCListSize() {
		return $this->pcListSize;
	}
	
	public function getPCListElement($element) {
		if ($element >= 0 && $element < $this->getPCListSize()) {
			return $this->pcList[$element];
		}else{
			return null;
		}
	}
	
	public function insertPC($pc) {
		$this->pcList[] = $pc;
		$this->pcListSize++;
	}
	
	public function removePC($element) {
		if ($element >= 0 && $element < $this->pcListSize) {
			unset($this->pcList[$element]);
			$this->pcListSize--;
		}
	}
	
	private function initialize() {
		$this->errorCount = 0;
		$errors = array();
		$this->initializeEmpty();
	}

	private function initializeEmpty() {
		$this->errorCount = 0;
		$errors = array();
	 	$this->pcList = array();
	 	$this->pcListSize = 0;
	}
		
}
?>