<?php
class YourPCsController {

	public static function run() {
		#if ($_SERVER["REQUEST_METHOD"] == "POST") {
		#	$userData = new UserData($_POST);  
		#	$userData = new UserData($_POST);
		#	if ($userData->getErrorCount() != 0) 
		#		HomeView::show(null);
		#    else  
		#		userProfileView::show($userData);
		#} else  // Initial link
		#	HomeView::show(null);
		
		$validTest = array("HP Pavilion ze4400", "Dell Inspiron 1525", "Lenovo Ideapad Z570");
		$s1 = new PCList();
		foreach ($validTest as $pc) {
			$s1->insertPC($pc);
		}
		yourPCsView::show($s1);
	}
}
?>