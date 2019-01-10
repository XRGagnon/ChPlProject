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
				<label for="itemname">Item Name: </label>
			</td>
			<td>
				<input type="text" name="itemname" id="itemname"><br>
			</td>
		</tr>
		<tr>
			<td style="text-align: right; margin-left: 10px;">
				<label for="price">Item Price: </label>
			</td>
			<td>
				<input type="text" name="price" id="price"><br><br>
			</td>
		</tr>
		<tr>
			<td style="text-align: right; margin-left: 10px;">
				<label for="category">Category: </label>
			</td>
			<td>
				<select name="category">
				  <option value="ACCESSORIES">ACCESSORIES</option>
				  <option value="MAINTENANCE">MAINTENANCE</option>
				  <option value="CHEMICALS">CHEMICALS</option>
				  <option value="EQUIPMENT">EQUIPMENT</option>
				  <option value="OTHER">OTHER</option>
				</select>
			</td>
		</tr>
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