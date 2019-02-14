<?php
include_once "../Models/Defaults.php";
include_once "../Models/Partials.php";
include_once "../DBManager/DBManager.php";
include_once "../DBManager/ConnectionMaker.php";
DefaultHead();
unset($_SESSION['id']);
$_SESSION['id'] = $_GET['id'];
?>

<div style="Margin: 30px;">
<h2>Remove Item</h2>

<p> Are you sure you want to remove this item? </p>


<form method="POST" action="../Controllers/RemoveItemController.php">
	<input type="submit" value="YES" name="YES">
</for>

<form method="POST" action="../Controllers/RemoveItemController.php">
	<input type="submit" value="NO" name="NO">
</form>

<?php

$ViewItems = DBManager::View_One_Item($_GET['id']);

?>
</div>
<?php
DefaultFoot();
?>