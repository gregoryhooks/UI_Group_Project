<?php
class BuildController{

	public static function run() {
		
		//BuildView::show();
		
		$action = (array_key_exists ( 'action', $_SESSION )) ? $_SESSION ['action'] : "";
		$answers = (array_key_exists ( 'answers', $_SESSION )) ? $_SESSION ['answers'] :array();
		
		switch ($action) {
			case "question2" :
				/*$answers->setBudget($_POST['budget']);
				$_SESSION['headertitle'] = "PerfectPC";
				$_SESSION['styles'] = array('styling1.css');
				MasterView::showHeader();
				MasterView::showNavbar();
				echo '<div class="jumbotron">';
				echo '<div class="container">';
				questions::qheader();
				questions::question2();
				echo '</div>';
				echo '</div>';
				$_SESSION['footertitle'] = "<h3>The footer goes here</h3>";
				MasterView::showHomeFooter();
				MasterView::showPageEnd();*/
				MasterView::showHeader2();
				MasterView::showUsernavbar();
				$user = (array_key_exists('user', $_SESSION))?$_SESSION['user']: NULL;
				// Show the details of the form
				MasterView::showCategories();
				MasterView::showFooter();
				break;
			default :
				BuildView::show();
		}
		
	}
}
?>