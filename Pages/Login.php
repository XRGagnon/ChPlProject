<?php

/**
 * Created by PhpStorm.
 * User: xavie
 * Date: 13/12/2018
 * Time: 10:21 AM
 */
include_once "../Models/Defaults.php";
include_once "../Models/Partials.php";
include_once "../Models/Security.php";
sec_session_start();
DefaultHead();
?>
<h2>Login Page</h2><br>

<?php
if (Login_Check())
{
    echo("You are logged in, ".$_SESSION["username"]);
}
?>

<br/>
<form action="../Controllers/LoginController.php" method="POST">
	<table>
		<tr>
			<td>
				<label for="username">Username: </label>
			</td>    
			<td>
				<input type="text" name="username" /><br/>
			</td>
		</tr>
		<tr>
			<td>    
				<label for="password">Password: </label>
			</td>
			<td>    
				<input type="password" name="password" /><br/>
			</td>
		</tr>
		<tr>
			<td>
			</td>
			<td>    
				<input type="submit" value="Login" />
			</td>
		</tr>		
	</table>





</form>
<?php
DefaultFoot();
?>

