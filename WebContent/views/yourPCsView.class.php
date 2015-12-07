<?php  
class yourPCsView {
	public static function show() {
		MasterView::showHeader2();
		MasterView::showUsernavbar();
		$usersaves = UserSavesDB::getUserSavesBy('userId', $_SESSION['user']);
		MasterView::showCategories();
		foreach($usersaves as $build){
			MasterView::showItem($build);
		}
		MasterView::showFooter();
	}
}
?>
