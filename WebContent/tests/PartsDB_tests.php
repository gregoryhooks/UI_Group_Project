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



<h2>Query HardDrive Size By ID</h2>
<?php
$parts = PartsDB::getPartRowSetsBy("harddrives", "hdriveId", "1hdd05");
echo "The hard drive size with id \"1hdd05\" is: ";
echo $parts[0]['Size'];
echo "<br>";
?>

<h2>Query HardDrives By Size</h2>
<?php
$parts = PartsDB::getPartRowSetsBy("harddrives", "Size", "250GB");
echo "The hard drives with size \"250GB\" are: <br>";
foreach ($parts as $part){
	print_r($part);
	echo "<br>";
}
?>

<h2>Query Motherboards By Number of Memory Slots</h2>
<?php
$parts = PartsDB::getPartRowSetsBy("motherboards", "Memory Slots", "4");
echo "The motherboards with \"4\" slots are: <br>";
foreach ($parts as $part){
	print_r($part);
	echo "<br>";
}
?>

<h2>Query Motherboards By Memory Type</h2>
<?php
$parts = PartsDB::getPartRowSetsBy("motherboards", "Memory Type", "DDR4");
echo "The motherboards with Memory Type \"DDR4\" are: <br>";
foreach ($parts as $part){
	print_r($part);
	echo "<br>";
}
?>

<h2>Query Motherboards By Number of USB Ports</h2>
<?php
$parts = PartsDB::getPartRowSetsBy("motherboards", "USB Ports", "8");
echo "The motherboards with \"8\" USB Ports are: <br>";
foreach ($parts as $part){
	print_r($part);
	echo "<br>";
}
?>

<h2>Query GPUs Less than a Given Price</h2>
<p>Works for any given part, you might have to change "price" to "Price" depending on the database column captialization (blame Eric)</p>
<?php
$parts = PartsDB::getPartRowSetsByLowerPrice("gpus", "price", "200.00");
echo "The GPUs with a price less than \"$200\" are: <br>";
foreach ($parts as $part){
	print_r($part);
	echo "<br>";
}
?>

<h2>Query CPUs the are Compatible with a Given Motherboard ID</h2>
<?php
$parts = PartsDB::getCPUPartRowSetsByMotherboard("8mb09I");
echo "The CPUs compatible with the motherboard with ID \"8mb09I\" are: <br>";
foreach ($parts as $part){
	print_r($part);
	echo "<br>";
}
?>

<h2>Query Motherboards the are Compatible with a Given CPU ID</h2>
<?php
$parts = PartsDB::getMotherboardPartRowSetsByCPU("1cpuI08");
echo "The motherboards compatible with the CPU with ID \"1cpuI08\" are: <br>";
foreach ($parts as $part){
	print_r($part);
	echo "<br>";
}
?>



</body>
</html>