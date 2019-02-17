<?php
include_once "../Models/Defaults.php";
include_once "../Models/Partials.php";
include_once "../DBManager/DBManager.php";
include_once "../DBManager/ConnectionMaker.php";
include_once "../Models/Security.php";
include_once "../DBManager/Retrieval.php";
DefaultHead();
$_SESSION["asdf"] = "asdf";
unset($_SESSION["UpdateItemError"]);

$id = $_SESSION['id'];
$item = Retrieval::getItem($id);
?>


<div style="Margin: 30px;">
<!-- This is the form for the update item-->
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
		<input type="hidden" name="Category" value="<?php echo $_POST['Category']?>">
		<tr>
			<td style="text-align: right; margin-left: 10px;">
				<label for="SubCategory">Category: </label>
			</td>
			
			<td>
				<select name="SubCategory">
					
					<?php
						$ViewCats = DBManager::Get_SubCategories($_POST['Category']);
					?>
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
				Green<input type="Checkbox" name="Green" id="Green" value="1"><br>
				Blue<input type="Checkbox" name="Blue" id="Blue" value="2"><br>
				Grey<input type="Checkbox" name="Grey" id="Grey" value="3"><br>
				White<input type="Checkbox" name="White" id="White" value="4"><br>
				Gold<input type="Checkbox" name="Gold" id="Gold" value="5"><br>
				Mocha<input type="Checkbox" name="Mocha" id="Mocha" value="6"><br>
				Light Grey<input type="Checkbox" name="Light_Grey" id="Light_Grey" value="7"><br>
				Black<input type="Checkbox" name="Black" id="Black" value="8"><br>
				Red/Grey<input type="Checkbox" name="Red_Grey" id="Red_Grey" value="9"><br>
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
		<tr>
			<td>
			</td>
			<td align="right">
				<input type="submit" value="Update Item">
			</td>
		</tr>
	<table>
</form>

</div>
<?php
DefaultFoot();
?>