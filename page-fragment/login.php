	
	
	<div id="login-welcome">
		<h3>Welcome to My Application, please login:</h3>
	</div>
	
	<div id="loginform">
		<p style="color:red;text-align:center;"><? echo $error_massage; ?></p>
		<form method="post" action="login_action.php">
			<input type="text" name="username" class="loginfield" />
			<input type="password" name="password" class="loginfield" />
			<input type="submit" name="button" class="loginbutton" value="Login" />
		</form>
	</div>