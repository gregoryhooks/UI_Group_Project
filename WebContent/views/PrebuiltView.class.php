<?php  
class PrebuiltView {
	
	public static function show() {
		MasterView::showHeader2();
		MasterView::showUsernavbar();
		$user = (array_key_exists('user', $_SESSION))?$_SESSION['user']: NULL;
		// Show the details of the form
		MasterView::showCategories();
		
		
		for($i=0; $i<9; $i++){
		MasterView::showItem(BuildsDB::getRandomBuild());
		}
		//$showarray = array($_SESSION['item01'], $_SESSION['item02'], $_SESSION['item03'], $_SESSION['item04'], $_SESSION['item05'], $_SESSION['item06']);
		//print_r($showarray);
		//echo $showarray
		//foreach($showarray as $pc){
		//	MasterView::showItem($pc);
		//}
		

		
		
		//echo '<h3><a href="/' . $_SESSION['base'] . '/tests">View Tests</a></h3>';
		//echo '<h3><a href="/' . $_SESSION['base'] . '/TestpageView">View Test Page</a></h3>';
		MasterView::showFooter();
	}
}
?>