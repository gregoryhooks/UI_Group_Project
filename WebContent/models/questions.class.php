<?php
class questions {

	
	
	public static function qheader(){
		echo "<h2><br>Please answer all the questions to find out which computer is right for you.</h2><br>";
	}
	public static function question1() {
		$base = (array_key_exists('base', $_SESSION))?$_SESSION['base']:"";
		echo 'What is your max budget<br><br>';
		
		echo '<form method="Post" action="/'.$base.'/questions/question2">';
		echo '<input type ="radio" name="budget" value="b1" checked> $500<br>';
		echo '<input type ="radio" name="budget" value="b2"> $750<br>';
		echo '<input type ="radio" name="budget" value="b3"> $1000<br>';
		echo '<input type ="radio" name="budget" value="b4"> $1250<br>';
		echo '<input type ="radio" name="budget" value="b5"> $1500<br>';
		echo '<input type ="radio" name="budget" value="b6"> $1750+<br><br>';
		echo '<div><input type="submit" value="Next" /></div>';
		echo '</form>';
	}


	public static function question2(){
		$base = (array_key_exists('base', $_SESSION))?$_SESSION['base']:"";
		
		echo 'What is your primary use?<br><br>';
		
		echo '<form method="Post" action="/'.$base.'/questions/question3">';
		echo '<input type ="radio" name="purpose" value="game" checked> Gaming<br>';
		echo '<input type ="radio" name="purpose" value="internet"> Internet/Email<br>';
		echo '<input type ="radio" name="purpose" value="torrent"> Download/torrent<br>';
		echo '<input type ="radio" name="purpose" value="office"> Office use<br>';
		echo '<input type ="radio" name="purpose" value="coding"> Coding/devolping<br>';
		echo '<input type ="radio" name="purpose" value="stream"> Videos/music/streaming<br><br>';
		echo '<div><input type="submit" value="Next" /></div>';	
		echo '</form>';		
	}
	
	public static function question3(){
		$base = (array_key_exists('base', $_SESSION))?$_SESSION['base']:"";
		
		echo 'What games do you plan on playing?<br><br>';
	
		echo '<form method="Post" action="/'.$base.'/questions/question4">';
		echo '<input type ="radio" name="game" value="g1" checked> None or flash games online like farmville<br>';
		echo '<input type ="radio" name="game" value="g2"> Older games like ARMA 2 and Counter-Strike<br>';
		echo '<input type ="radio" name="game" value="g3"> Low graphic intensive newer games like WOW<br>';
		echo '<input type ="radio" name="game" value="g4"> Newer games with medium graphics on medium settings<br>';
		echo '<input type ="radio" name="game" value="g5"> High graphic intesive games like ARMA 3 on lower settings<br>';
		echo '<input type ="radio" name="game" value="g6"> High graphics on high settings, I want Witcher 3 to look realistic!<br><br>';
		echo '<div><input type="submit" value="Next" /></div>';
		echo '</form>';
	}

	public static function question4(){
		$base = (array_key_exists('base', $_SESSION))?$_SESSION['base']:"";
	
		echo 'Do you plan on storing a lot of content?<br><br>';
		
		echo '<form method="Post" action="/'.$base.'/questions/question5">';
		echo '<input type ="radio" name="storage" value="h1" checked> Only pictures and documents<br>';
		echo '<input type ="radio" name="storage" value="h2"> A little bit of music occasionally<br>';
		echo '<input type ="radio" name="storage" value="h3"> A lot of music and documents<br>';
		echo '<input type ="radio" name="storage" value="h4"> Some games, videos and music<br>';
		echo '<input type ="radio" name="storage" value="h5"> Lots of games/videos/music that take a lot of space<br>';
		echo '<input type ="radio" name="storage" value="h6"> Torrent videos...about church...all day<br><br>';
		echo '<div><input type="submit" value="Next" /></div>';
		echo '</form>';
	}
	
	public static function question5(){
		$base = (array_key_exists('base', $_SESSION))?$_SESSION['base']:"";
	
		echo 'How many programs do you run at a time?<br><br>';
	
		echo '<form method="Post" action="/'.$base.'/questions/question6">';
		echo '<input type ="radio" name="mem" value="m1" checked> You can run more than one?!<br>';
		echo '<input type ="radio" name="mem" value="m2"> Browse the internet while using documetns<br>';
		echo '<input type ="radio" name="mem" value="m3"> Music is on, internets running, editing photos at the same time<br>';
		echo '<input type ="radio" name="mem" value="m4"> I never shut down programs, like I should...I am sorry<br>';
		echo '<input type ="radio" name="mem" value="m5"> Write and compile extensive code while watching my illegally downloaded...church videos<br>';
		echo '<input type ="radio" name="mem" value="m6"> Live stream games while video broadcasting to friends<br><br>';
		echo '<div><input type="submit" value="Next" /></div>';
		echo '</form>';
	}
	public static function question6(){
		$base = (array_key_exists('base', $_SESSION))?$_SESSION['base']:"";
	
		echo 'What color case would you like?<br><br>';
	
		echo '<form method="Post" action="/'.$base.'/questions/makePC">';
		echo '<input type ="radio" name="caseColor" value="c1" checked> White<br>';
		echo '<input type ="radio" name="caseColor" value="c2"> Black<br>';
		echo '<input type ="radio" name="caseColor" value="c3"> Black/Blue<br>';
		echo '<input type ="radio" name="caseColor" value="c4"> Black/Red<br>';
		echo '<input type ="radio" name="caseColor" value="c5"> Orange<br>';
		echo '<input type ="radio" name="caseColor" value="c6"> Green<br><br>';
		echo '<input type ="radio" name="caseColor" value="c7"> Not Important<br><br>';
		echo '<div><input type="submit" value="Finish" /></div>';
		echo '</form>';
	}
}
?>