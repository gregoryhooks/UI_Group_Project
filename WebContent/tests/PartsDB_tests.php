<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Basic tests for PartsDB</title>
</head>
<body>
<h1>PartsDB tests</h1>


<?php
include_once("../models/Database.class.php");
include_once("../models/PartsDB.class.php");
?>


<h2>It should get a part by whatever</h2>
<?php 
$parts = PartsDB::getPartRowSetsBy("harddrives", "hdriveId", "1hdd05");
echo "The parts with a budget of b1 are:<br>";
foreach ($parts as $part) {
	print_r($part);
	echo "<br>";
}
?>

</body>
</html>