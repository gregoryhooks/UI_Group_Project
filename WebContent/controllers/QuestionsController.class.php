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
						//print_r($build);
						
						
						echo "<br><br>Case: ";	
						$part = PartsDB::getPartRowSetsBy("cases", "caseId", $build['caseId']);
						echo $part[0]['Make']." ".$part[0]['Model']." $".$part[0]['Price']."<br>";			
						
						echo "<br>CPU: ";
						$part = PartsDB::getPartRowSetsBy("cpus", "cpuId", $build['cpuId']);
						echo $part[0]['Make']." ".$part[0]['Model']." ".$part[0]['Speed(GHz)']."GHz $".$part[0]['Price']."<br>";
						
						echo "<br>GPU: ";
						$part = PartsDB::getPartRowSetsBy("gpus", "gpuId", $build['gpuId']);
						echo $part[0]['Make']." ".$part[0]['Model']." ".$part[0]['Speed(GHz)']."GHz ".$part[0]['Memory(GB)']."GB $".$part[0]['price']."<br>";
						
						echo "<br>Hard Drive: ";
						$part = PartsDB::getPartRowSetsBy("harddrives", "hdriveId", $build['hdriveId']);
						echo $part[0]['Make']." ".$part[0]['Model']." ".$part[0]['Size']." ".$part[0]['Speed']."RPM $".$part[0]['price']."<br>";
						
						echo "<br>Memory: ";
						$part = PartsDB::getPartRowSetsBy("memory", "ramId", $build['ramId']);
						echo $part[0]['Make']." ".$part[0]['Model']." ".$part[0]['Size(GB)']." ".$part[0]['Type']." $".$part[0]['price']."<br>";
						
						echo "<br>Motherboard: ";
						$part = PartsDB::getPartRowSetsBy("motherboards", "mboardId", $build['mboardId']);
						echo $part[0]['Make']." ".$part[0]['Model']." ".$part[0]['PCI Slots']." PCI Slots ".$part[0]['Memory Slots']." Memory Slots ".$part[0]['USB Ports']." USB Ports $".$part[0]['price']."<br>";
						
						echo "<br>Power Supply: ";
						$part = PartsDB::getPartRowSetsBy("psupplies", "psupplyId", $build['powersupId']);
						echo $part[0]['Make']." ".$part[0]['Model']." ".$part[0]['Watts']." Watts $".$part[0]['price']."<br>";

					}
					echo '<img src="../images/'.$answers->getCasecolor() . '.jpg" alt="userImage"> <br>';
					
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