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










<?php
if (isset($_GET['error'])) {
    echo '<p class="error">Error Logging In!</p>';
}
?>
<form action="includes/process_login.php" method="post" name="login_form">
    Email: <input type="text" name="email" />
    Password: <input type="password"
                     name="password"
                     id="password"/>
    <input type="button"
           value="Login"
           onclick="formhash(this.form, this.form.password);" />
</form>





</form>
<?php
DefaultFoot();
?>

