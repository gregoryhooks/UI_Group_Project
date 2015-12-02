<?php
class userviewController {

	public static function run() {
		
		$action = (array_key_exists ( 'action', $_SESSION )) ? $_SESSION ['action'] : "";
				
		switch ($action) {
			
			case "create" :
				break;
			default:	
			UserView::show();
		}
	
	}
}
?>