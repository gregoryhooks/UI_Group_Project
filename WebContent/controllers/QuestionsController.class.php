<?php
class QuestionsController {

	
	public static function run() {

		$action = (array_key_exists ( 'action', $_SESSION )) ? $_SESSION ['action'] : "";
		$answers = (array_key_exists ( 'answers', $_SESSION )) ? $_SESSION ['answers'] :array();

		
		switch ($action) {
			case "question2" :
				$answers->setBudget($_POST['budget']);
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
				MasterView::showPageEnd();
				break;
			case "question3" :
				$answers->setPurpose($_POST['purpose']);
				$_SESSION['headertitle'] = "PerfectPC";
				$_SESSION['styles'] = array('styling1.css');
				MasterView::showHeader();
				MasterView::showNavbar();
				echo '<div class="jumbotron">';
					echo '<div class="container">';
						questions::qheader();
						questions::question3();
					echo '</div>';
				echo '</div>';
				$_SESSION['footertitle'] = "<h3>The footer goes here</h3>";
				MasterView::showHomeFooter();
				MasterView::showPageEnd();
				break;
			case "question4" :
				$answers->setGame($_POST['game']);
				$_SESSION['headertitle'] = "PerfectPC";
				$_SESSION['styles'] = array('styling1.css');
				MasterView::showHeader();
				MasterView::showNavbar();
				echo '<div class="jumbotron">';
					echo '<div class="container">';
						questions::qheader();
						questions::question4();
					echo '</div>';
				echo '</div>';
				$_SESSION['footertitle'] = "<h3>The footer goes here</h3>";
				MasterView::showHomeFooter();
				MasterView::showPageEnd();
				break;
			case "question5" :
				$answers->setStorage($_POST['storage']);
				$_SESSION['headertitle'] = "PerfectPC";
				$_SESSION['styles'] = array('styling1.css');
				MasterView::showHeader();
				MasterView::showNavbar();
				echo '<div class="jumbotron">';
					echo '<div class="container">';
						questions::qheader();
						questions::question5();
					echo '</div>';
				echo '</div>';
				$_SESSION['footertitle'] = "<h3>The footer goes here</h3>";
				MasterView::showHomeFooter();
				MasterView::showPageEnd();
				
				break;
			case "question6" :
				$answers->setMem($_POST['mem']);
				$_SESSION['headertitle'] = "PerfectPC";
				$_SESSION['styles'] = array('styling1.css');
				MasterView::showHeader();
				MasterView::showNavbar();
				echo '<div class="jumbotron">';
					echo '<div class="container">';
						questions::qheader();
						questions::question6();
					echo '</div>';
				echo '</div>';
				$_SESSION['footertitle'] = "<h3>The footer goes here</h3>";
				MasterView::showHomeFooter();
				MasterView::showPageEnd();
				break;
			case "makePC" :
				$_SESSION['headertitle'] = "PerfectPC";
				$_SESSION['styles'] = array('styling1.css');
				MasterView::showHeader();
				MasterView::showNavbar();
				echo '<div class="jumbotron">';
					echo '<div class="container">';
					if(strcmp($answers->setCasecolor($_POST['caseColor']), "c7") == 0)
						$answers->setCasecolor(NULL);
					Echo "Your computer is: " . $answers->getBudget() ." ". $answers->getPurpose() ." ". $answers->getGame() ." ". $answers->getStorage() ." ". $answers->getMem() ." ". $answers->getCasecolor();
					echo '</div>';
				echo '</div>';
				$_SESSION['footertitle'] = "<h3>The footer goes here</h3>";
				MasterView::showHomeFooter();
				MasterView::showPageEnd();
				break;
			default :
				questionsView::show();
		}
		
		
		
		

	}
}
?>