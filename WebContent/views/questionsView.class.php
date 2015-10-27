<?php  
class questionsView {
	
	public static function show(){	
		$_SESSION['headertitle'] = "PerfectPC";
				$_SESSION['styles'] = array('styling1.css');
				MasterView::showHeader();
				MasterView::showNavbar();
				echo '<div class="jumbotron">';
					echo '<div class="container">';
						questions::qheader();
						questions::question1();
					echo '</div>';
				echo '</div>';
				$_SESSION['footertitle'] = "<h3>The footer goes here</h3>";
				MasterView::showHomeFooter();
				MasterView::showPageEnd();

		
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="windows-1252">
<title>Questions</title>
</head>
<body>


<section>
</section>

</body>
</html>

<?php 
	}
}
	?>