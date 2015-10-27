<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Basic tests for questionsView</title>
</head>
<body>
<h1>Questions View tests</h1>

<?php

include_once("../views/questionsView.class.php");
include_once("../models/questions.class.php");

?>

<h2>It should call show from questionsView and cycle through questions on submit.</h2>
<?php 
questionsView::show();
?>
</body>
</html>
