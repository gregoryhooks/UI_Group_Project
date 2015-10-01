<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Basic tests for PC List</title>
</head>
<body>
<h1>PC List tests</h1>

<?php
include_once("../models/PCList.class.php");
include_once("../models/Messages.class.php");
?>

<?php 
$validTest = array("HP Pavilion ze4400", "Dell Inspiron 1525", "Lenovo Ideapad Z570");
$s1 = new PCList();
foreach ($validTest as $pc){
	$s1->insertPC($pc);
}
?>

<h2>It should print the array's size</h2>
<?php 
print_r($s1->getPCListSize());
?>

<h2>It should print the returned array</h2>
<?php 
print_r($s1->getPCList());
?>

<h2>It should print the individually returned values</h2>
<?php 
for ($i = 0; $i < $s1->getPCListSize(); $i++){
	print_r($s1->getPCListElement($i)."\n");
}

?>
</body>
</html>
