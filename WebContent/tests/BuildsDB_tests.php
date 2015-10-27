<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Basic tests for BuildsDB</title>
</head>
<body>
<h1>BuildsDB tests</h1>


<?php
include_once("../models/Database.class.php");
include_once("../models/BuildsDB.class.php");
?>


<h2>It should get all builds from a test database</h2>
<?php

Database::clearDB();
$db = Database::getDB('perfectpc');
$builds = BuildsDB::getAllBuilds();
$buildCount = count($builds);
echo "Number of builds in db is: $buildCount <br>";
foreach ($builds as $build) {
	print_r($build);
	echo "<br>";
}
?>	


<h2>It should get a build by budget</h2>
<?php 
$builds = BuildsDB::getBuildsWith("b1", null, "g2", "h3", "m3", null);
echo "The builds with a budget of b1 are:<br>";
foreach ($builds as $build) {
	print_r($build);
	echo "<br>";
}
?>

</body>
</html>