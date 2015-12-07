<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Basic tests for UserSavesDB</title>
</head>
<body>
<h1>UserSavesDB tests</h1>


<?php
include_once("../models/Database.class.php");
include_once("../models/Messages.class.php");
include_once("../models/UserSavesDB.class.php");
?>


<h2>It should get the entire course list from a test database</h2>
<?php
$usersaves = UserSavesDB::getUserSavesBy();
$usersaveCount = count($usersaves);
echo "Number of students enrolled in db is: $usersaveCount <br>";
foreach ($usersaves as $usersave) {
	print_r($usersave); 
	echo "<br>";
}
?>	

<h2>It should allow a class to be added to the list</h2>
<?php 
echo "Number of usersaves in db before added is: ". count(UserSavesDB::getUserSavesBy()) ."<br>";
$validTest = array("userId" => "2", "buildId" => "1");
UserSavesDB::addUserSave(2, 1);
echo "Number of students enrolled in db after added is: ". count(UserSavesDB::getUserSavesBy()) ."<br>";
?>

<h2>It should allow a class to be removed from the list</h2>
<?php 
echo "Number of usersaves in db before added is: ". count(UserSavesDB::getUserSavesBy()) ."<br>";
UserSavesDB::addUserSave(3, 2);
echo "Number of students enrolled in db after added is: ". count(UserSavesDB::getUserSavesBy()) ."<br>";
UserSavesDB::removeUserSave(3, 2);
echo "Number of students enrolled in db after removed is: ". count(UserSavesDB::getUserSavesBy()) ."<br>";
?>

<h2>It should not add an invalid class</h2>
<?php 
echo "Number of usersaves in db before added is: ". count(UserSavesDB::getUserSavesBy()) ."<br>";
$invalidUserSave = array("userId" => "-1", "buildId" => "1");
UserSavesDB::addUserSave(-1, 1);
echo "Number of usersaves in db after added is: ". count(UserSavesDB::getUserSavesBy()) ."<br>";
?>

<h2>It should not add a duplicate class</h2>
<?php 
echo "Number of usersaves in db before added is: ". count(UserSavesDB::getUserSavesBy()) ."<br>";
$duplicateUserSave = array("userId" => "2", "buildId" => "1");
UserSavesDB::addUserSave(2, 1);
echo "Number of usersaves in db after added is: ". count(UserSavesDB::getUserSavesBy()) ."<br>";
?>

<h2>It should get UserSavees by userId</h2>
<?php 
$usersaves = UserSavesDB::getUserSavesBy('userId', '2');
echo "The value of UserSave for User 2 is:<br>";
foreach ($usersaves as $usersave) {
	print_r($usersave);
	echo "<br>";
}
?>

<h2>It should get UserSaves by BuildId</h2>
<?php 
$usersaves = UserSavesDB::getUserSavesBy('buildId', '1');
echo "The value of UserSave with BuildId 1 is:<br>";
foreach ($usersaves as $usersave) {
	print_r($usersave);
	echo "<br>";
}
?>

<h2>It should not get a UserSave not in UserSaves</h2>
<?php 
$usersaves = UserSavesDB::getUserSavesBy('buildId', '500');
if (empty($usersaves))
	echo "No UserSave 500";
else echo "The value of UserSave 500 is:<br>$usersaves[0]<br>";
?>

<h2>It should not get a UserSave by a field that isn't there</h2>
<?php
$usersaves = UserSavesDB::getUserSavesBy('telephone', '21052348234');
if (empty($usersaves))
	echo "No UserSave with this telephone number";
else 
	echo "The value of UserSave with a specified telephone number is:<br>$usersave<br>";
?>

</body>
</html>