<?php

/**
 * Created by PhpStorm.
 * User: xavie
 * Date: 13/12/2018
 * Time: 10:21 AM
 */
include_once "../Models/Defaults.php";
include_once "../Models/Security.php";
sec_session_start();
DefaultHead();
?>
<div class="content ">
<div class="container md-margin-top block">
<h2>Login Page</h2><br>

<?php
//Message if already logged in
if (Login_Check())
{
    echo("You are logged in, ".$_SESSION["username"]);
}
?>

<?php
if (isset($_GET['error'])) {
    echo '<p class="error">Error Logging In!</p>';
}
?>
<form action="../Controllers/LoginController.php" method="post" name="login_form">
    <div class="control-group">
    <div class="control-label">
        <label for="username">Username: </label>
    </div>
    <div class="controls">
        <input type="text" name="username" /><br/>
    </div>
    </div>
    <div>
        <div class="control-group">
            <div class="control-label">
                <label for="password">Password: </label>
            </div>
            <div class="controls">
                <input type="password" name="password" id="password" /><br/>
            </div>
    </div>
    </div>
            <br/>
            <div class="form-group">
            <input type="button"
            value="Login" class="btn btn-primary"
           onclick="formhash(this.form, this.form.password);" />
            </div>
            <!-- Activate Javascript Password Hasher on click -->
</form>

</div>
</div>
<?php
DefaultFoot();
?>

