<?php
include_once "../Models/Defaults.php";
include_once "../Models/Partials.php";
include_once "../DBManager/DBManager.php";
include_once "../DBManager/ConnectionMaker.php";
DefaultHead();
?>

<h2>Remove Item</h2>
<div style="margin:30px;">

<p>Select a Category to narrow your search</p>

<form method="POST" action="../Controllers/ViewItemsController.php">
	<select name="Category" id="Category">
		<option value="1">New Products</option>
		<option value="2">Maintenance</option>
		<option value="3">Vacuum Hoses</option>
		<option value="4">Accessories</option>
		<option value="5">Backwash Hoses</option>
		<option value="6">Skimmers & Drains</option>
		<option value="7">Plumbing</option>
		<option value="8">Ladders & Steps</option>
		<option value="9">Lights</option>
		<option value="10">Cover Reels & Solar Rollers</option>
		<option value="11">Games, Chairs & More</option>
	</select>
	<input type="submit" value="Search Category" name="CategoryForm">
</form>
<p> If you want to search for a specific item, enter the items ID, French or English title or the sub category number

<form method="post" action="../Controllers/ViewItemsController.php">

	<input type="text" name="Item_No" id="Item_No">
	
	<input type="submit" value="Search Item" name="ItemNoForm">
</form><br>

<?php

$conn = ConnectionMaker::getConnection();

if(isset($_SESSION['CAT']))
{
	$ViewItems = DBManager::Category($_SESSION['CAT']);
}
else if(isset($_SESSION['Item']))
{
	$ViewItems = DBManager::View_One_Item($_SESSION['Item']);
}
else
{
	$ViewItems = DBManager::View_Items();
}
?>
</div>
<?php
DefaultFoot();
?>