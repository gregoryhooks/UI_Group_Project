<?php

class User{
	private $budget;
	private $use;
	private $game;
	private $storage;
	private $mem;
	private $case;
	

	public function getBudget() {
		return $this->budget;
	}
	public function getUse(){
		return $this->use;
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
	public function getCase() {
		return $this->case;
	}

	
	public function setBudget($budget) {
		return $this->budget;
	}
	public function setUse($use){
		return $this->use;
	}
	public function setGame($game) {
		return $this->game;
	}
	public function setStorage($storage) {
		return $this->storage;
	}
	public function setMem($mem) {
		return $this->mem;
	}
	public function setCase($case) {
		return $this->case;
	}
	
}