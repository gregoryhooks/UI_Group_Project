<?php
class preBuild{
	private $buildId;
	private $caseId;
	private $cpuId;
	private $price;
	private $hdriveId;
	private $ramId;
	private $gpuId;
	private $mboardId;
	private $image;
	
	
	public function __construct($formInput = null) {
		$this->formInput = $formInput;
		$this->initialize();
	}

	
	public function getBuildId() {
		return $this->buildId;
	}
	public function getImage(){
		return $this->image;
	}
	public function getCaseID(){
		return $this->caseId;
	}
	public function getCpuId(){
		return $this->cpuId;
	}
	public function getPrice(){
		return $this->price;
	}
	public function getHdriveId(){
		return $this->hdriveId;
	}
	public function getRamId() {
		return $this->ramId;
	}
	public function getGpuId() {
		return $this->gpuId;
	}
	public function getMboardId() {
		return $this->mboardId;
	}
	public function getPowersupId() {
		return $this->powersupId;
	}
public function getParameters() {
		// Return data fields as an associative array
		$paramArray = array("buildId" => $this->buildId,
							"caseID" => $this->caseID,
							"cpuId" => $this->cpuId,
							"caseId" => $this->caseId,
							"price" => $this->price,
							"hdriveId" => $this->hdriveId,
							"ramId" => $this->ramId,
							"gpuId" => $this->gpuId,
							"mboardId" => $this->mboardId,
							"image" => $this->image,
							"powersupId" => $this->powersupId
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
			$this->buildId = "buildId";
			$this->caseID = "caseID";
			$this->cpuId = "cpuId";
			$this->caseId = "caseId";
			$this->price = "price";
			$this->hdriveId = "hdriveId";
			$this->ramId = "ramId";
			$this->gpuId= "gpuId";
			$this->mboardId= "mboardId";
			$this->powersupId= "powersupId";
			$this->image = "image";
		}
		else  {	 
		   $this->buildId = $this->extractForm('buildId');
		   $this->caseID = $this->extractForm('caseID');
		   $this->cpuId = $this->extractForm('cpuId');
		   $this->caseId = $this->extractForm('caseId');
		   $this->price = $this->extractForm('price');
		   $this->hdriveId = $this->extractForm('hdriveId');
		   $this->ramId = $this->extractForm('ramId');
		   $this->gpuId= $this->extractForm('gpuId');
		   $this->mboardId= $this->extractForm('mboardId');
		   $this->powersupId= $this->extractForm('powersupID');
		   $this->image= $this->extractForm('image');
		}
	}
		
}
?>