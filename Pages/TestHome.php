<?php
/**
 * Created by PhpStorm.
 * User: xavie
 * Date: 13/12/2018
 * Time: 10:10 AM
 */
include_once "../Models/Defaults.php";
include_once "../Models/Security.php";
sec_session_start();
DefaultHead();


?>

<a href="Login.php">Login Link</a><br/>
<a href="Register.php">Register Link</a><br/>
<?php
if (Login_Check())
{echo("
    <a href=\"../Controllers/LogoutController.php\">Logout</a>
    <div>Welcome, ".$_SESSION["username"]."</div>");
}
?>

<?php
if (Login_Check())
{
    echo "Welcome, ".$_SESSION["username"];
}
DefaultFoot();

