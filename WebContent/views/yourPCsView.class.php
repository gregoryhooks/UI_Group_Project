<?php  
class yourPCsView {
	public static function show() {
		MasterView::showHeader2();
		MasterView::showUsernavbar();
		$usersaves = UserSavesDB::getUserSavesBy('userId', $_SESSION['user']->getUserId());
		
		MasterView::showCategories();
		foreach($usersaves as $build){
			$cbuild = new preBuild(BuildsDB::getBuildRowSetsBy('buildID', $build['buildId'])[0]);
			//print_r($cbuild);
			MasterView::showYourItem($cbuild);
		}
		MasterView::showFooter();
	}
}
?>
