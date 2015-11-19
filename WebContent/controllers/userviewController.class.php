<?php
class userviewController {

	public static function run() {
		
		$action = (array_key_exists ( 'action', $_SESSION )) ? $_SESSION ['action'] : "";
		
		$itemtest1 = array("cpuId" => "i7", "mboardId" => "Intel", "image" => "c1.jpg", "price" => "$849.99", "buildId" => "item01");
		$item01 = new preBuild($itemtest1);
		$_SESSION['item01'] = $item01;
		
		$itemtest2 = array("cpuId" => "AMDx", "mboardId" => "AMD", "description" => "A metak cabinet that can go anywere, it's tall with stain resistant paint", "image" => "c2.jpg", "price" => "$99.99", "ID" => "item02");
		$item02 = new preBuild($itemtest2);
		$_SESSION['item02'] = $item02;
		
		$itemtest3 = array("make" => "Cabinet Makers", "model" => "Black Floor", "description" => "A wood cabinet that can go on a floor, it's black, and cool looking.", "image" => "c3.jpg", "price" => "$79.99", "ID" => "item03");
		$item03 = new preBuild($itemtest3);
		$_SESSION['item03'] = $item03;
		
		$itemtest4 = array("make" => "Cabinet Makers", "model" => "Wood Kitchen", "description" => "A wood upper kitchet cabinet with water resistant stain.", "image" => "c4.jpg", "price" => "$169.99", "ID" => "item04");
		$item04 = new preBuild($itemtest4);
		$_SESSION['item04'] = $item04;
		
		$itemtest5 = array("make" => "Cabinet Makers", "model" => "Entertainment Center", "description" => "A grey cabinet that can go hold a tv and accessories.", "image" => "c5.jpg", "price" => "$149.99", "ID" => "item05");
		$item05 = new preBuild($itemtest5);
		$_SESSION['item05'] = $item05;
		
		$itemtest6 = array("make" => "Cabinet Makers", "model" => "Hippy Brown", "description" => "A cabinet with 3 shelves that have baskets, it's brown.", "image" => "c6.jpg", "price" => "$59.99", "ID" => "item06");;
		$item06 = new preBuild($itemtest6);
		$_SESSION['item06'] = $item06;
		
		
		
		switch ($action) {
			case "create" :
				break;
			default:	
			UserView::show();
		}
	
	}
}
?>