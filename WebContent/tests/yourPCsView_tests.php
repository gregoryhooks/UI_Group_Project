<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Basic tests for Your Pools View</title>
</head>
<body>
<h1>Your pools view tests</h1>

<?php
include_once("../views/yourPCsView.class.php");
include_once("../models/PCList.class.php");
include_once("../models/Messages.class.php");
?>

<h2>It should call show to show the your pools page</h2>
<?php 
$validTest = array("HP Pavilion ze4400", "Dell Inspiron 1525", "Lenovo Ideapad Z570");
$s1 = new PCList();
foreach ($validTest as $pc) {
	$s1->insertPC($pc);
}
yourPCsView::show($s1);
?>
</body>
</html>
