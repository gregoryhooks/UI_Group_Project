<?php  
class homeView {
	
  public static function show($user) {  
  	$base = (array_key_exists('base', $_SESSION))?$_SESSION['base']:"";
?> 
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>PerfectPC</title>
</head>
<body>
<header>
<img src="" alt="Logo is supposed to be here">
<h1>PerfectPC</h1>
</header>
<aside>The place where you can find the Perfect PC</aside>
<br>
<?php if (!is_null($user)) {echo "Welcome ". $user->getUserName() . "!";}?>
<?php if (is_null($user)) {echo "<button type=\"button\" onclick=\"window.location.href='registration'\">Sign Me Up!</button>";}?>
<?php if (is_null($user)) {echo "<button type=\"button\" onclick=\"window.location.href='login'\">Log Me In!</button>";}?>

<?php echo '<br><td><a href="/'.$base.'/questions'.'"</a><br> Questions';?><br><br>
<nav>[future links here]
<br><br>
<button type="button" onclick="window.location.href='tests.html'">Test Website Functions</button>

<br><br>
<a href = "yourPCs">Your PCs</a>
</nav>
<br>
<footer>Made by Gregory Hooks, Heather Voorhees, Travis Peterson, and Eric Applonie</footer>
</body>
</html>
<?php 
  }
}
?>