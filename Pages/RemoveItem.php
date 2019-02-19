<?php
include_once "../Models/Defaults.php";
include_once "../DBManager/DBManager.php";
include_once "../DBManager/ConnectionMaker.php";
DefaultHead();
//unset the previously used id 
unset($_SESSION['id']);
$_SESSION['id'] = $_GET['id'];

//This is a confirmation page for the user. 
?>

<div style="Margin: 30px;">
<h2>Remove Item</h2>

<p> Are you sure you want to remove this item? </p>

<!-- if the user selects yes, the item will be removed-->
<form method="POST" action="../Controllers/RemoveItemController.php">
	<input type="submit" value="YES" name="YES">
</form>
<!-- if the user selects no, the item will not be removed-->
<form method="POST" action="../Controllers/RemoveItemController.php">
	<input type="submit" value="NO" name="NO">
</form>

<?php
//this displays the item to be removed or not
$ViewItems = DBManager::View_One_Item($_GET['id']);

?>
</div>
<?php
DefaultFoot();
?>