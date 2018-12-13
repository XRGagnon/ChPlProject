<?php
DefaultHead();
?>
<form action="../Controllers/RegisterController.php" method="POST">
	Username: <input type="text" name="username" id="username"><br>
	E-mail: <input type="email" name="email" id="email"><br><br>
	
	Password: <input type="password" name="pass" id="pass"><br>
	Confirm Password <input type="password" name="ConfirmPass" id="ConfirmPass"><br><br>
	
	<input type="submit" value="Register Account">
</form>
<?php
DefaultFoot();
?>