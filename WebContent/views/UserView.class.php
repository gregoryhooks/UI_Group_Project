<?php
class UserView {
	public static function show() {
		MasterView::showHeader2();
		MasterView::showUsernavbar();
		$user = (array_key_exists('user', $_SESSION))?$_SESSION['user']: NULL;
		// Show the details of the form
		MasterView::showCategories();
		MasterView::showItem($_SESSION['item01']);
		MasterView::showItem($_SESSION['item02']);
		MasterView::showItem($_SESSION['item03']);
		MasterView::showItem($_SESSION['item04']);
		MasterView::showItem($_SESSION['item05']);
		MasterView::showItem($_SESSION['item06']);
		
		
		//echo '<h3><a href="/' . $_SESSION['base'] . '/tests">View Tests</a></h3>';
		//echo '<h3><a href="/' . $_SESSION['base'] . '/TestpageView">View Test Page</a></h3>';
		MasterView::showFooter();
	}
}
?>

