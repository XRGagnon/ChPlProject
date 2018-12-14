<?php
/**
 * Created by PhpStorm.
 * User: xavie
 * Date: 13/12/2018
 * Time: 10:21 AM
 */
include "../Models/Defaults.php";
include "../Models/Partials.php";
DefaultHead();
?>
<h2>Login Page</h2><br>
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

