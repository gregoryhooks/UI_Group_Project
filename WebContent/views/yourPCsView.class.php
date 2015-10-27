<?php  
class yourPCsView {
	
  public static function show($pcList) {  	
?> 
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Your PCs</title>
</head>
<body>
<header>
<h1>Your PCs</h1>
</header>
<?php 
	if (is_null($pcList) || $pcList->getPCListSize() == 0){
		echo "<aside>You currently do not have any saved PCs.</aside>";
	}else{
		echo "<aside>All of the PCs you have saved will appear below.</aside>";
		echo "<br><br>";
		foreach ($pcList->getPCList() as $pc) {
			echo "<a href = 'yourPCs'>$pc</a>";
			echo "<br><br>";
		}

    }
  }
}
?>
</body>
</html>