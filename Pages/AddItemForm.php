<?php
include_once "../Models/Defaults.php";
include_once "../Models/Partials.php";
include_once "../DBManager/DBManager.php";
include_once "../DBManager/ConnectionMaker.php";
DefaultHead();
?>

<?php 

	if(isset($_SESSION['AddItemError']))
	{
		echo $_SESSION['AddItemError'];
	}	
?>
<div style="Margin: 30px;">
<h2>Add Item</h2>
<p>Choose the item's Category</p>

<form method="POST" action="../Pages/AddItem.php">
	<label for="Category">Category: </label>

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
	
	<input type="submit" value="Choose Category">
</form>
<form action="../Pages/ViewItems.php">
<input type="submit" value="Return">
</form>
</div>

<?php
DefaultFoot();
?>