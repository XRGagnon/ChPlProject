<?php
include "../Models/Defaults.php";
include "../Models/Partials.php";
DefaultHead();
?>
<h2>Update Item Page</h2><br>
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
			</td><br><br>
			<td>
				Both<input type="radio" name="Availability" id="Both" Value="Both" checked><br>
				Platinum<input type="radio" name="Availability" id="Platinum" value="Platinum"><br>
				Olympic<input type="radio" name="Availability" id="Olympic" value="Olympic"><br>
			</td>
		</tr>
		<tr>
			<td style="text-align: right; margin-left: 10px;">
				<label for="New">New</label>
			</td><br><br>
			<td>
				Yes<input type="radio" name="New" Value="Yes" checked><br>
				No<input type="radio" name="New" Value="No"><br>
			</td>
		</tr>	
		<tr>
			<td style="text-align: right; margin-left: 10px;">
				<label for="Colors">Colors:</label>
			</td><br><br>
			<td>
				Green<input type="Checkbox" name="Green" id="Green" value="Green"><br>
				Blue<input type="Checkbox" name="Blue" id="Blue" value="Blue"><br>
				Grey<input type="Checkbox" name="Grey" id="Grey" value="Grey"><br>
				White<input type="Checkbox" name="White" id="White" value="White"><br>
				Gold<input type="Checkbox" name="Gold" id="Gold" value="Gold"><br>
				Mocha<input type="Checkbox" name="Mocha" id="Mocha" value="Mocha"><br>
				Light Grey<input type="Checkbox" name="Light_Grey" id="Light_Grey" value="Light_Grey"><br>
				Black<input type="Checkbox" name="Black" id="Black" value="Black"><br>
				Red/Grey<input type="Checkbox" name="Red/Grey" id="Red/Grey" value="Red/Grey"><br>
			</td>
		</tr>
		<tr>
			<td style="text-align: right; margin-left: 10px;">
				<label for="Title_English">Title English</label>
			</td>
			<td> 
				<input type="text" name="Title_English" id="Title_English"><br>
			</td>
		</tr>	
		<tr>
			<td style="text-align: right; margin-left: 10px;">
				<label for="Description_English">Description English</label>
			</td>
			<td>
				<input type="text" name="Description_English" id="Description_English"><br>
			</td>
		</tr>	
		<tr>
			<td style="text-align: right; margin-left: 10px;">
				<label for="Title_French">Title French</label>
			</td>
			<td>
				<input type="text" name="Title_French" id="Title_French"><br>
			</td>
		</tr>
		<tr>
			<td style="text-align: right; margin-left: 10px;">
				<label for="Description_French">Description French</label>
			</td>
			<td>
				<input type="text" name="Description_French" id="Description_French"><br>
			</td>
		</tr>	
		<tr>
			<td style="text-align: right; margin-left: 10px;">
				<label for="Country_Of_Origin">Country of Origin</label>
			</td>
			<td>
				<input type="text" name="Country_Of_Origin" id="Country_Of_Origin"><br>
			</td>
		</tr>
		<tr>
			<td style="text-align: right; margin-left: 10px;">
				<label for="Spare_Parts">Spare Parts</label>
			</td><br><br>
			<td>
				<input type="Checkbox" name="Spare_Parts" id="Spare_Yes" value="Yes"><br>
				<input type="Checkbox" name="Spare_Parts" id="Spare_No" value="No"><br>
			</td>
		</tr>
		<tr>
			<td style="text-align: right; margin-left: 10px;">
				<label for="Instructions">Instructions</label>
			</td>
			<td>
				<input type="text" name="Instructions" id="Instructions"><br>
			</td>
		</tr>	
		<tr>
			<td style="text-align: right; margin-left: 10px;">
				<label for="Price">Price:</label>
			</td>
			<td>
				<input type="number" name="Price" id="Price" min=0 step=0.01><br>
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