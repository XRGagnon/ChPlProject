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
<form action="../Controllers/LoginController.php" method="POST">
<?php LoginForm(); ?>
</form>
<?php
DefaultFoot();

