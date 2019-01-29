<?php
include_once "../Models/Defaults.php";
include_once "../Models/Partials.php";
include_once "../DBManager/DBManager.php";
include_once "../DBManager/ConnectionMaker.php";
DefaultHead();
unset($_SESSION['id']);
$_Session['id'] = $_GET['id'];
?>

<h2>Remove Item</h2>

<p> Are you sure you want to remove this item? </p>


<form method="POST" action="../Controllers/RemoveItemController.php">
	<input type="submit" value="Yes" name="YES">
</for>

<form method="POST" action="../Controllers/RemoveItemController.php">
	<input type="submit" value="No" name="NO">
</form>

<?php

$ViewItems = DBManager::View_One_Item($_GET['id']);

?>

<?php
DefaultFoot();
?>