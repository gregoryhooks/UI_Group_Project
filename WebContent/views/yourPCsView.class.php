<?php  
class yourPCsView {
	public static function show() {

		$usersaves = UserSavesDB::getUserSavesBy('userId', $_SESSION['user']);
		foreach($usersaves as $build){
			MasterView::showItem($build);
		}
		
	}
}
?>
