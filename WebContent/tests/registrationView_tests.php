<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Basic tests for Registration</title>
</head>
<body>
<h1>Registration tests</h1>

<?php
include_once("../models/Messages.class.php");
include_once("../views/registrationView.class.php");
include_once("../models/UserData.class.php");
include_once("../models/User.class.php");
?>

<h2>It should show the registration page with valid data</h2>
<?php 
$validUser = array("userName" => "testUser");
$s1 = new User($validUser);
$validUserData = array(
	               "email" => "test@gmail.com",
);
$s2 = new UserData($validUserData);
registrationView::show($s1, $s2);
?>
