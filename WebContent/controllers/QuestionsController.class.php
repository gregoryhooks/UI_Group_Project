<?php
class QuestionsController {

	private $budget;
	private $use;
	private $game;
	private $storage;
	private $mem;
	private $case;
	
	public static function run() {

		$action = (array_key_exists ( 'action', $_SESSION )) ? $_SESSION ['action'] : "";
		$arguments = $_SESSION ['arguments'];
		
		switch ($action) {
			case "question2" :
				$budget = ($_POST['budget']);
				questions::qheader();
				questions::question2();
				break;
			case "question3" :
				$this->use = ($_POST['use']);
				questions::qheader();
				questions::question3();
				break;
			case "question4" :
				$this->game = ($_POST['game']);
				questions::qheader();
				questions::question4();
				break;
			case "question5" :
				$this->storage = ($_POST['storage']);
				questions::qheader();
				questions::question5();
				break;
			case "question6" :
				$this->mem = ($_POST['mem']);
				questions::qheader();
				questions::question6();
				break;
			case "makePC" :
				$this->case = ($_POST['case']);
				Echo "Your computer is: " . $this->budget . $this->use . $this->game . $this->storage . $this->mem . $this->case;
				break;
			default :
				questionsView::show();
		}
		
		
		
		

	}
}
?>