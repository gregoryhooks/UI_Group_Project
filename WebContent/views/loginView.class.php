<?php  
class LoginView {
	
  public static function show($user) {  	
?> 
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Login for PerfectPC</title>
</head>
<body>
<h1>Log into PerfectPC</h1>
 
<form method="Post" action="login">
Username: 
<input type="text" name="userName" <?php if (!is_null($user)) {echo 'value = "'. $user->getUserName() .'"';}?> required>
<span class="error">
	 <?php if (!is_null($user)) {echo $user->getError('userName');}?>
</span>
<br><br>
Password: 
<input type="password" name="password" required>
<br><br>
<input type="submit" value="Login">
</form> 

</body>
</html>
<?php 
  }
}
?>