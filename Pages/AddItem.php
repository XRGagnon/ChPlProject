<?php
include "../Models/Defaults.php";
include "../Models/Partials.php";
DefaultHead();
?>
<h2>Add Item Page</h2><br>
<form action="../Controllers/RegisterController.php" method="POST">
	<table>
		<tr>
			<td style="text-align: right; margin-left: 10px;">
				<label for="Item_No">Item Number: </label>
			</td>
			<td>
				<input type="text" name="Item_No" id="Item_No"><br>
			</td>
		</tr>
		<tr>
			<td style="text-align: right; margin-left: 10px;">
				<label for="category">Category: </label>
			</td>
			<td>
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
			</td>
		</tr>
		<tr>
			<td style="text-align: right; margin-left: 10px;">
				<label for="Availability">Availability</label>
			</td>
			<td>
				<input type="radio" name="Availability" id="Both" checked><br>
				<input type="radio" name="Availability" id="Platinum"><br>
				<input type="radio" name="Availability" id="Olympic"><br>
			</td>
		</tr>
		<tr>
		<tr>
			<td>
			</td>
			<td align="right">
				<input type="submit" value="Add Item">
			</td>
		</tr>
	<table>
</form>
<?php
DefaultFoot();
?>