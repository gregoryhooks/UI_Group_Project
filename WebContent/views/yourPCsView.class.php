<?php  
class yourPCsView {
	public static function show($pcList) {
		$_SESSION['headertitle'] = "Your PCs";
		$_SESSION['styles'] = array('styling1.css');
		MasterView::showHeader();
		MasterView::showNavbar();
		yourPcsView::showDetails($pcList);
		$_SESSION['footertitle'] = "<h3>The footer goes here</h3>";
		MasterView::showHomeFooter();
		MasterView::showPageEnd();
	}
  public static function showDetails($pcList) {  	
	echo '<div class="jumbotron">';
    	echo '<div class="container">';
    	echo '<h1>Your PCs</h1>'; 
	if (is_null($pcList) || $pcList->getPCListSize() == 0){
		echo "<aside>You currently do not have any saved PCs.</aside>";
	}else{
		echo "<aside>All of the PCs you have saved will appear below.</aside>";
		echo "<br><br>";
		foreach ($pcList->getPCList() as $pc) {
			echo "<a href = 'yourPCs'>$pc</a>";
			echo "<br><br>";
		}

    }
    	echo '</div>';
    echo '</div>';
  }
  
}
?>