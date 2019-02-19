<?php
include_once "../Models/Defaults.php";
include_once "../Models/Partials.php";
include_once "../DBManager/DBManager.php";
include_once "../DBManager/ConnectionMaker.php";
include_once "../Models/Security.php";
include_once "../DBManager/Retrieval.php";
DefaultHead();
//unset previously used function
unset($_SESSION["UpdateItemError"]);

$id = $_SESSION['id'];
$item = Retrieval::getItem($id);
?>


<div style="Margin: 30px;">
<!-- This is the form for the update item, the form is made sticky so any fields that was not null is put back on the form for the user to see. -->
<h2>Update Page</h2>
<?php
$ViewItems = DBManager::UpdateItemViewItem($_SESSION['id']);
?>


<form action="../Pages/UpdateConfirm.php" method="POST">
	<table>
		<tr>
			<td style="text-align: right; margin-left: 10px;">
				<label for="Item_No">Item Number: </label>
			</td>
			<td>
				<input type="text" name="Item_No" id="Item_No" value="<?php echo $item["Item_No"] ?>" required><br>
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
				Both<input type="radio" name="Availability" id="Both" value="OP" <?php if($_SESSION['Availability'] == 'OP'){ echo "checked"; };?>> <br>
				Platinum<input type="radio" name="Availability" id="Platinum" value="P"  <?php if($_SESSION['Availability'] == 'p'){ echo "checked"; };?>><br>
				Olympic<input type="radio" name="Availability" id="Olympic" value="O"  <?php if($_SESSION['Availability'] == 'O'){ echo "checked"; };?>><br>
			</td>
		</tr>
		<tr>
			<td style="text-align: right; margin-left: 10px;">
				<label for="New">New</label>
			</td><br><br>
			<td>
				Yes<input type="radio" name="New" Value="Yes"  <?php if($_SESSION['New'] == 'Yes'){ echo "checked";};?>><br>
				No<input type="radio" name="New" Value="No"  <?php if($_SESSION['New'] == 'No'){ echo "checked";};?>><br>
			</td>
		</tr>	
		<tr>
			<td style="text-align: right; margin-left: 10px;">
				<label for="Colors">Colors:</label>
			</td><br><br>
			<td>
			<?php 
				$colors = explode("," , $_SESSION['Colors']);
			?>
				Green<input type="Checkbox" name="Green" id="Green" value="1" <?php foreach($colors as $c) { if($c == 1) {echo "checked";}}?>><br>
				Blue<input type="Checkbox" name="Blue" id="Blue" value="2" <?php foreach($colors as $c) { if($c == 2) {echo "checked";}}?>><br>
				Grey<input type="Checkbox" name="Grey" id="Grey" value="3" <?php foreach($colors as $c) { if($c == 3) {echo "checked";}}?>><br>
				White<input type="Checkbox" name="White" id="White" value="4" <?php foreach($colors as $c) { if($c == 4) {echo "checked";}}?>><br>
				Gold<input type="Checkbox" name="Gold" id="Gold" value="5" <?php foreach($colors as $c) { if($c == 5) {echo "checked";}}?>><br>
				Mocha<input type="Checkbox" name="Mocha" id="Mocha" value="6" <?php foreach($colors as $c) { if($c == 6) {echo "checked";}}?>><br>
				Light Grey<input type="Checkbox" name="Light_Grey" id="Light_Grey" value="7" <?php foreach($colors as $c) { if($c == 7) {echo "checked";}}?>><br>
				Black<input type="Checkbox" name="Black" id="Black" value="8" <?php foreach($colors as $c) { if($c == 8) {echo "checked";}}?>><br>
				Red/Grey<input type="Checkbox" name="Red_Grey" id="Red_Grey" value="9" <?php foreach($colors as $c) { if($c == 9) {echo "checked";}}?>><br>
			</td>
		</tr>
		<tr>
			<td style="text-align: right; margin-left: 10px;">
				<label for="Title_English">Title English</label>
			</td>
			<td> 
				<input type="text" name="Title_English" id="Title_English" required value="<?php echo $_SESSION['Title_English']?>"><br>
			</td>
		</tr>	
		<tr>
			<td style="text-align: right; margin-left: 10px;">
				<label for="Description_English">Description English</label>
			</td>
			<td>
				<input type="text" name="Description_English" id="Description_English" value="<?php echo $_SESSION["Description_English"] ?>"><br>
			</td>
		</tr>	
		<tr>
			<td style="text-align: right; margin-left: 10px;">
				<label for="Title_French">Title French</label>
			</td>
			<td>
				<input type="text" name="Title_French" id="Title_French" required value="<?php echo $_SESSION['Title_French']?>"><br>
			</td>
		</tr>
		<tr>
			<td style="text-align: right; margin-left: 10px;">
				<label for="Description_French">Description French</label>
			</td>
			<td>
				<input type="text" name="Description_French" id="Description_French" value="<?php echo $_SESSION['Description_French']?>"><br>
			</td>
		</tr>	
		<tr>
			<td style="text-align: right; margin-left: 10px;">
				<label for="Country_Of_Origin">Country of Origin</label>
			</td>
			<td>
				<input type="text" name="Country_Of_Origin" id="Country_Of_Origin" value="<?php echo $_SESSION['Country_Of_Origin']?>"><br>
			</td>
		</tr>
		<tr>
			<td style="text-align: right; margin-left: 10px;">
				<label for="Spare_Parts">Spare Parts</label>
			</td><br><br>
			<td>
				yes<input type="radio" name="Spare_Parts" id="Spare_Yes" value="Yes"  <?php if($_SESSION['Spare_Parts'] == 'Yes'){ echo "checked";};?>><br>
				no<input type="radio" name="Spare_Parts" id="Spare_No" value="No"  <?php if($_SESSION['Spare_Parts'] == 'No'){ echo "checked";};?>><br>
			</td>
		</tr>
		<tr>
			<td style="text-align: right; margin-left: 10px;">
				<label for="Instructions">Instructions</label>
			</td>
			<td>
				<input type="text" name="Instructions" id="Instructions" value="<?php echo $_SESSION['Instructions'] ?>"><br>
			</td>
		</tr>	
		<tr>
			<td style="text-align: right; margin-left: 10px;">
				<label for="Price">Price:</label>
			</td>
			<td>
				<input type="number" name="Price" id="Price" min=0 step=0.01 value="<?php echo $_SESSION['Price'] ?>"><br>
			</td>
		</tr>	
		<tr>
			<td style="text-align: right; margin-left: 10px;">
				<label for="Large_Image">Large_Image</label>
			</td>
			<td>
				<input type="text" name="Large_Image" id="Large_Image" min=0 step=0.01 value="<?php echo $_SESSION['Large_Image'] ?>"><br>
			</td>
		</tr>	
		<tr>
			<td style="text-align: right; margin-left: 10px;">
				<label for="Large_Image_Text">Large_Image_Text</label>
			</td>
			<td>
				<input type="text" name="Large_Image_Text" id="Large_Image_Text" min=0 step=0.01 value="<?php echo $_SESSION['Large_Image_Text'] ?>"><br>
			</td>
		</tr>	
		<tr>
			<td style="text-align: right; margin-left: 10px;">
				<label for="Small_Image">Small_Image</label>
			</td>
			<td>
				<input type="text" name="Small_Image" id="Small_Image" min=0 step=0.01 value="<?php echo $_SESSION['Small_Image'] ?>"><br>
			</td>
		</tr>	
		<tr>
			<td style="text-align: right; margin-left: 10px;">
				<label for="Small_Image_Text">Small_Image_Text</label>
			</td>
			<td>
				<input type="text" name="Small_Image_Text" id="Small_Image_Text" min=0 step=0.01 value="<?php echo $_SESSION['Small_Image_Text'] ?>"><br>
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