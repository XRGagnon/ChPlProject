<?php
include_once "../Models/Defaults.php";
include_once "../Models/Partials.php";
include_once "../DBManager/DBManager.php";
include_once "../DBManager/ConnectionMaker.php";
DefaultHead();
?>

<h2>Remove Item</h2>

<p>Select a Category to narrow your search</p>

<from>
	<select name="category">
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
	<input type="submit" value="Search Category">
</form>

<form>

	<input type="text" name="Item_No" id="Item_No">
	
	<input type="submit" value="Search Item">
</form>

<?php

$conn = ConnectionMaker::getConnection();

$ViewItems = DBManager::View_Items();

?>

<?php
DefaultFoot();
?>