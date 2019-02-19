<!-- include the models for easy access to the fucntions-->
<?php

include_once "../Models/Defaults.php";
include_once "../Models/Partials.php";
include_once "../Models/Security.php";
sec_session_start();
//call the default header 
DefaultHead();
?>
<div class="content ">
    <div class="container md-margin-top block">
<h2>Register Page</h2><br>
<!-- form collection-->
<form action="../Controllers/RegisterController.php" method="POST">
	<table>
        <!--First Name Form Group -->
        <div class="form-group">
		<tr>
			<td class="control-label">
				<label for="firstname">First Name: </label>
			</td>
        </tr>
        <tr>
			<td class="controls">
				<input class="form-control input" type="text" name="firstname" id="firstname"><br>
			</td>
		</tr>
        </div>

        <!--Last Name Form Group -->
        <div class="form-group">
            <tr>
                <td class="control-label">
                    <label for="lastname">Last Name: </label>
                </td>
            </tr>
            <tr>
                <td class="controls">
                    <input class="form-control input" type="text" name="lastname" id="lastname"><br>
                </td>
            </tr>
        </div>

        <!--Username Form Group -->
        <div class="form-group">
            <tr>
                <td class="control-label">
                    <label for="username">Username: </label>
                </td>
            </tr>
            <tr>
                <td class="controls">
                    <input class="form-control input" type="text" name="username" id="username"><br>
                </td>
            </tr>
        </div>

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
				<input type="password" name="password" id="password"><br>
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
                       onclick=" return regformhash(this.form,
                                   this.form.username,
                                   this.form.email,
                                   this.form.password,
                                   this.form.ConfirmPass);" />
                <!-- On click, activate the register Javascript Password Hasher -->
            </td>
		</tr>
	</table>
</form>
        <?php
if (isset($_SESSION["errorMsg"]))
{
    echo $_SESSION["errorMsg"];
    $_SESSION["errorMsg"] = null;
}?>
<!-- End of form collection -->
</div>
</div>

<?php
//calling the default footer
DefaultFoot();
?>
<!--  -->
