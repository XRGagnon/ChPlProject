



<?php
/**
 * Created by PhpStorm.
 * User: xavie
 * Date: 13/12/2018
 * Time: 10:10 AM
 */
include_once "../Models/Defaults.php";
include_once "../Models/Security.php";
DefaultHead();


?>

<a href="Login.php">Login Link</a><br/>
<div><?php echo($_GET["error"]); ?></div>

<?php
DefaultFoot();

