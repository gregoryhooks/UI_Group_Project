<?php  
class registrationView {
	
  public static function show($user) {  	
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
<input type="text" name="username" tabindex="1" value = "<?php if (!is_null($user)) { echo $user->getUserName(); }?>" required>
<span class="error">
	 <?php if (!is_null($user)) {echo $user->getError('username');}?>
</span>
<br><br>
Password: 
<input type="password" name="password" tabindex="2" required>
<span class="error">
	 <?php if (!is_null($user)) {echo $user->getError('password');}?>
</span>
<br><br>
Email:  
<input type="email" name="email" tabindex="5" value = "<?php if (!is_null($user)) { echo $user->getEmail(); }?>" required>
<span class="error">
	 <?php if (!is_null($user)) {echo $user->getError('email');}?>
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