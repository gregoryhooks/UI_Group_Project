<?php  
class BuildView {
	
	public static function show() {
		MasterView::showHeader2();
		MasterView::showUsernavbar();
		$user = (array_key_exists('user', $_SESSION))?$_SESSION['user']: NULL;
		// Show the details of the form
		MasterView::showCategories();

		
		
		//echo '<h3><a href="/' . $_SESSION['base'] . '/tests">View Tests</a></h3>';
		//echo '<h3><a href="/' . $_SESSION['base'] . '/TestpageView">View Test Page</a></h3>';
		MasterView::showFooter();
	}
}
?>