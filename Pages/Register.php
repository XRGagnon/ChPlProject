<?php
include_once "../Models/Defaults.php";
include_once "../Models/Partials.php";
DefaultHead();
?>
<h2>Register Page</h2><br>
<form action="../Controllers/RegisterController.php" method="POST">
	<table>
		<tr>
			<td style="text-align: right; margin-left: 10px;">
				<label for="firstname">First Name: </label>
			</td>
			<td>
				<input type="text" name="firstname" id="firstname"><br>
			</td>
		</tr>
		<tr>
			<td style="text-align: right; margin-left: 10px;">
				<label for="lastname">Last Name: </label>
			</td>
			<td>
				<input type="text" name="lastname" id="lastname"><br><br>
			</td>
		</tr>
		<tr>
			<td style="text-align: right; margin-left: 10px;">
				<label for="username">username: </label>
			</td>
			<td>
				<input type="text" name="username" id="username"><br>
			</td>
		</tr>
		<tr>
			<td style="text-align: right;">
				<label for="email">E-mail: </label>
			</td>
			<td>	
				<input type="email" name="email" id="email"><br><br>
			</td>
		</tr>
		<tr>
			<td style="text-align: right;">
				<label for="password">Password: </label>
			</td>
			<td>
				<input type="password" name="pass" id="pass"><br>
			</td>
		</tr>
		<tr>
			<td style="text-align: right;">
				<label for="ConfirmPass">Confirm Password: </label>  
			</td>
			<td> 
				<input type="password" name="ConfirmPass" id="ConfirmPass"><br><br>
			</td>
		</tr>
		<tr>
			<td>
			</td>
			<td align="right">
                <input type="button"
                       value="Register"
                       onclick="return regformhash(this.form,
                                   this.form.username,
                                   this.form.email,
                                   this.form.password,
                                   this.form.ConfirmPass);" />
            </td>
		</tr>
	<table>
	
</form>
<?php
DefaultFoot();
?>