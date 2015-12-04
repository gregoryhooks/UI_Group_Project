<?php  
class BuildView {
	
	public static function show() {
		MasterView::showHeader2();
		MasterView::showUsernavbar();
		$user = (array_key_exists('user', $_SESSION))?$_SESSION['user']: NULL;
		// Show the details of the form
		MasterView::showCategories();

		$parts = PartsDB::getPartRowSetsByType("motherboards");
		foreach($parts as $part){
			MasterView::showMotherBoard($part);
		}
		
		/*                                                        Just uncomment the following code blocks to show their views.
		
		$parts = PartsDB::getPartRowSetsByType("cpus");
		foreach($parts as $part){
			MasterView::showCPU($part);
		}
		
		$parts = PartsDB::getPartRowSetsByType("memory");
		foreach($parts as $part){
			MasterView::showMemory($part);
		}
		
		$parts = PartsDB::getPartRowSetsByType("gpus");
		foreach($parts as $part){
			MasterView::showGPU($part);
		}
		
		$parts = PartsDB::getPartRowSetsByType("harddrives");
		foreach($parts as $part){
			MasterView::showHardDrive($part);
		}
		
		$parts = PartsDB::getPartRowSetsByType("psupplies");
		foreach($parts as $part){
			MasterView::showPowerSupply($part);
		}
		
		$parts = PartsDB::getPartRowSetsByType("cases");
		foreach($parts as $part){
			MasterView::showCase($part);
		}
		
		*/
		
		//echo '<h3><a href="/' . $_SESSION['base'] . '/tests">View Tests</a></h3>';
		//echo '<h3><a href="/' . $_SESSION['base'] . '/TestpageView">View Test Page</a></h3>';
		MasterView::showFooter();
	}
}
?>