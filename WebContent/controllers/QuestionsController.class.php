<?php
class QuestionsController {

	
	public static function run() {

		$action = (array_key_exists ( 'action', $_SESSION )) ? $_SESSION ['action'] : "";
		$answers = (array_key_exists ( 'answer', $_SESSION )) ? $_SESSION ['answer'] :array();

		
		switch ($action) {
			case "question2" :
				$answers->setBudget($_POST['budget']);
				questions::qheader();
				questions::question2();
				break;
			case "question3" :
				questions::qheader();
				questions::question3();
				break;
			case "question4" :
				$answers->setGame($_POST['game']);
				questions::qheader();
				questions::question4();
				break;
			case "question5" :
				$answers->setStorage($_POST['storage']);
				questions::qheader();
				questions::question5();
				break;
			case "question6" :
				$answers->setMem($_POST['mem']);
				questions::qheader();
				questions::question6();
				break;
			case "makePC" :
				$answers->setCasecolor($_POST['caseColor']);
				Echo "Your computer is: " . $answers->getBudget() ." ". $answers->getPurpose() ." ". $answers->getGame() ." ". $answers->getStorage() ." ". $answers->getMem() ." ". $answers->getCasecolor();
				break;
			default :
				questionsView::show();
		}
		
		
		
		

	}
}
?>