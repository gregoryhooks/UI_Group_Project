<?php
class QuestionsController {

	
	public static function run() {

		$action = (array_key_exists ( 'action', $_SESSION )) ? $_SESSION ['action'] : "";
		$answers = (array_key_exists ( 'answer', $_SESSION )) ? $_SESSION ['answer'] :array();

		
		switch ($action) {
			case "question2" :
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
				$answers->setBudget($_POST['budget']);
				break;
			case "question3" :
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
				$answers->setPurpose($_POST['purpose']);
				break;
			case "question4" :
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
				$answers->setGame($_POST['game']);
				break;
			case "question5" :
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
				$answers->setStorage($_POST['storage']);
				break;
			case "question6" :
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
				$answers->setMem($_POST['mem']);
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