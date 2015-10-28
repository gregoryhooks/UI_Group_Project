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
				print_r($answers);
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
				print_r($answers);
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
				print_r($answers);
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
				$answers->setCasecolor($_POST['caseColor']);
				$_SESSION['headertitle'] = "PerfectPC";
				$_SESSION['styles'] = array('styling1.css');
				MasterView::showHeader();
				MasterView::showNavbar();
				echo '<div class="jumbotron">';
					echo '<div class="container">';
					echo '<br><br><br>';
					echo "Your chosen computer is: ";
					//echo "Your computer is: <br>" . $answers->getBudget() ." ". $answers->getPurpose() ." ". $answers->getGame() ." ". $answers->getStorage() ." ". $answers->getMem() ." ". $answers->getCasecolor();
					
					$builds = BuildsDB::getBuildsWith($answers->getBudget(), $answers->getPurpose(), $answers->getGame(),$answers->getStorage(), $answers->getMem(), $answers->getCasecolor());
					
					foreach($builds as $build){
						print_r($build);
						
					}
					
					
					echo '<img src="../resources/'.$answers->getCasecolor() . '.jpg" alt="userImage"> <br>';
					
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