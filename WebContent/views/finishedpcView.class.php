<?php  
class homeView {
		public static function show() {
			$_SESSION['headertitle'] = "PerfectPC";
			$_SESSION['styles'] = array('styling1.css');
			MasterView::showHeader();
			MasterView::showNavbar();
			HomeView::showDetails();
			$_SESSION['footertitle'] = "<h3>The footer goes here</h3>";
			MasterView::showHomeFooter();
			MasterView::showPageEnd();
		}
	
  public static function showDetails() {  
  	$user = (array_key_exists('user', $_SESSION))?$_SESSION['user']:null;
  	$base = (array_key_exists('base', $_SESSION))? $_SESSION['base']: "";
  	
  	//Title Thing
  	echo '<div class="jumbotron">';
    	echo '<div class="container">';
    		echo '<div class="row">';
    			echo '<p><img src ="/'.$base.'/images/Logo.png"></p>';
  				echo '<p>The place where you can find the Perfect PC</p>';
				echo '<p><a class="btn btn-primary btn-lg" href="/'.$base.'/questions" role="button">Get Started! &raquo;</a></p>';
      		echo '</div>';
	  	echo '</div>';
    echo '</div>';
	//Bottom Container
	echo '<div class="container">';
	echo '<div class="row">';
	echo '<a href = "yourPCs">Your PCs</a>';
	echo '</div>';
	echo '</div>';
  }
}
?>