<?php  
class registrationView {
	
  public static function show($user, $userData) {  	
?> 
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Registration for PerfectPC</title>
</head>
<body>
<h1>Sign up for PerfectPC</h1>
 
<form method="Post" action="registration">
Username: 
<input type="text" name="userName" tabindex="1" value = "<?php if (!is_null($user)) { echo $user->getUserName(); }?>" required>
<span class="error">
	 <?php if (!is_null($user)) {echo $user->getError('userName');}?>
</span>
<br><br>
Password: 
<input type="password" name="password" tabindex="2" required>
<br><br>
Email:  
<input type="email" name="email" tabindex="5" value = "<?php if (!is_null($userData)) { echo $userData->getEmail(); }?>" required>
<span class="error">
	 <?php if (!is_null($userData)) {echo $userData->getError('email');}?>
</span>
<br><br>
<input type="submit" value="Register">
</form> 

</body>
</html>
<?php 
  }
}
?>