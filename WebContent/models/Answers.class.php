<?php
class Answers {
	private $formInput;
	private $budget;
	private $purpose;
	private $game;
	private $storage;
	private $mem;
	private $caseColor;
	
	
	public function __construct($formInput = null) {
		$this->formInput = $formInput;
		$this->initialize ();
	}
	public function getBudget() {
		return $this->budget;
	}
	public function getPurpose() {
		return $this->purpose;
	}
	public function getGame() {
		return $this->game;
	}
	public function getStorage() {
		return $this->storage;
	}
	public function getMem() {
		return $this->mem;
	}
	public function getCasecolor() {
		return $this->caseColor;
	}
	public function setBudget($budget) {
		$this->budget = $budget;
	}
	public function setPurpose($purpose) {
		$this->purpose = $purpose;
	}
	public function setGame($game) {
		$this->game = $game;
	}
	public function setStorage($storage) {
		$this->storage = $storage;
	}
	public function setMem($mem) {
		$this->mem = $mem;
	}
	public function setCasecolor($caseColor) {
		$this->caseColor = $caseColor;
	}
	private function initialize() {
		$this->budget = "budget";
		$this->purpose = "purpose";
		$this->game = "game";
		$this->storage = "storage";
		$this->mem = "mem";
		$this->caseColor = "caseColor";
	}
	public function __toString() {
		$str = "budget: ".$this->budget."<br>purpose: ".$this->prupose."<br>game: ".
				$this->game."<br>storage: ".$this->storage."<br>mem: ".$this-mem.
				"<br>caseColor: ".$this->caseColor;
		return $str;
	}
}