<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h1>Messages tests</h1>

<?php
include_once("../models/Messages.class.php");
?>

<h2>It should set errors from a file</h2>
<?php 

Messages::setErrors("../resources/errors_English.txt");

echo "EMAIL_INVALID: " .Messages::getError("EMAIL_INVALID")."<br>";

?>

<h2>It should allow reset</h2>
<?php 
Messages::reset();

echo "EMAIL_INVALID: " .Messages::getError("EMAIL_INVALID")."<br>";

?>

<h2>It should allow change of locale</h2>
<?php 
Messages::$locale = 'Spanish';
Messages::reset();

echo "EMAIL_INVALID: " .Messages::getError("EMAIL_INVALID")."<br>";

?>
</body>
</html>

