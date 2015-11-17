<?php
class preBuild{
	private $make;
	private $model;
	private $description;
	private $image;
	private $price;
	private $ID;
	
	public function __construct($formInput = null) {
		$this->formInput = $formInput;
		$this->initialize();
	}

	
	public function getMake() {
		return $this->make;
	}
	public function getModel(){
		return $this->model;
	}
	public function getDescription(){
		return $this->description;
	}
	public function getImage(){
		return $this->image;
	}
	public function getPrice(){
		return $this->price;
	}
	public function getId(){
		return $this->ID;
	}
public function getParameters() {
		// Return data fields as an associative array
		$paramArray = array("make" => $this->make,
							"model" => $this->model,
							"description" => $this->description,
							"image" => $this->image,
							"price" => $this->price,
							"ID" => $this->ID
		); 
		return $paramArray;
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
		$this->errors = array();
		if (is_null($this->formInput)){
			$this->make = "make";
			$this->model = "model";
			$this->description = "description";
			$this->image = "image";
			$this->price = "price";
			$this->ID = "ID";
		}
		else  {	 
		   $this->make = $this->extractForm('make');
		   $this->model = $this->extractForm('model');
		   $this->description = $this->extractForm('description');
		   $this->image = $this->extractForm('image');
		   $this->price = $this->extractForm('price');
		   $this->ID = $this->extractForm('ID');
		}
	}
	
	
	
	
	
}
?>