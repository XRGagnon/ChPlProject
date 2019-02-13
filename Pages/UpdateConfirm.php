<?php
include_once "../Models/Defaults.php";
include_once "../Models/Partials.php";
include_once "../DBManager/DBManager.php";
include_once "../DBManager/ConnectionMaker.php";
unset($_SESSION["UpdateItemError"]);
DefaultHead();
?>
<style>
table {
  border-collapse: collapse;
}

table, th, td {
  border: 1px solid black;
}
</style>
<?php

	if(!isset($_POST['Item_No']) || !isset($_POST['SubCategory']) 
		|| !isset($_POST['Availability']) || !isset($_POST['New'])
		|| !isset($_POST['Title_English']) || !isset($_POST['Title_French']))
	{
		//if the user did not enter the required data they are sent back to the beginning 
		$_SESSION["UpdateItemError"] = "You did not fill in all required data, please start over";
		header('Location: ../Pages/UpdateItemForm.php');
	}
	else
	{
		$Item_No = $_POST['Item_No'];
		$Category = $_POST['Category'];
		$SubCategory = $_POST['SubCategory'];
		$Availability = $_POST['Availability'];
		$New = $_POST['New'];
		$Colors = '';
		
			if(isset($_POST['Green']))
			{
				$Colors = $Colors . ", " . $_POST['Green'];
			}
			if(isset($_POST['Blue']))
			{
				$Colors = $Colors . ", " . $_POST['Blue'];
			}
			if(isset($_POST['Gold']))
			{
				$Colors = $Colors . ", " . $_POST['Gold'];
			}
			if(isset($_POST['Grey']))
			{
				$Colors = $Colors . ", " . $_POST['Grey'];
			}
			if(isset($_POST['White']))
			{
				$Colors = $Colors . ", " . $_POST['White'];
			}
			if(isset($_POST['Mocha']))
			{
				$Colors = $Colors . ", " . $_POST['Mocha'];
			}
			if(isset($_POST['Light_Grey']))
			{
				$Colors = $Colors . ", " . $_POST['Light_Grey'];
			}
			if(isset($_POST['Black']))
			{
				$Colors = $Colors . ", " . $_POST['Black'];
			}
			if(isset($_POST['Red_Grey']))
			{
				$Colors = $Colors . ", " . $_POST['Red_Grey'];
			}
		
		$Title_English = $_POST['Title_English'];
		if(isset($_POST['Description_English']))
		{
			$Description_English = $_POST['Description_English'];
		}
		else
		{
			$Description_English = null;
		}
		
		$Title_French = $_POST['Title_French'];
		
		if(isset($_POST['Description_French']))
		{
			$Description_French = $_POST['Description_French'];
		}
		else
		{
			$Description_French = null;
		}
		
		if(isset($_POST['Country_Of_Origin']))
		{
			$Country_Of_Origin = $_POST['Country_Of_Origin'];
		}
		else
		{
			$Country_Of_Origin = null;
		}
		
		if(isset($_POST['Spare_Parts']))
		{
			$Spare_Parts = $_POST['Spare_Parts'];
		}
		else
		{
			$Spare_Parts = null;
		}
		
		if(isset($_POST['Instructions']))
		{
			$Instructions = $_POST['Instructions'];
		}
		else
		{
			$Instructions = null;
		}
		
		if(isset($_POST['Price']))
		{
			$Price = $_POST['Price'];
		}
		else
		{
			$Price = null;
		}
		
		$Large_Image = null;
		$Large_Image_Text = null;
		$Small_Image = null;
		$Small_Image_Text = null; 
	}
?>

<h2>Confirm Page</h2>

<div style='Margin: 30px;'>
<table >
	<tr>
		<th>Field Name</th>
		<th>New Item</th>
		<th>Old Item</th>
	</tr>
	<tr>
		<td>Item No</td>
		<td><?php echo $Item_No; ?></td>
		<td><?php echo $_SESSION['Item_No']; ?></td>
	</tr>
	<tr>
		<td>Category</td>
		<td><?php echo $Category; ?></td>
		<td><?php echo $_SESSION['Category']; ?></td>
	</tr>
	<tr>
		<td>SubCategory</td>
		<td><?php echo $SubCategory; ?></td>
		<td><?php echo $_SESSION['SubCategory']; ?></td>
	</tr>	
	<tr>
		<td>Availability</td>
		<td><?php echo $Availability; ?></td>
		<td><?php echo $_SESSION['Availability']; ?></td>
	</tr>
	<tr>
		<td>New</td>
		<td><?php echo $New; ?></td>
		<td><?php echo $_SESSION['New']; ?></td>
	</tr>
	<tr>
		<td>Colors</td>
		<td><?php echo $Colors; ?></td>
		<td><?php echo $_SESSION['Colors']; ?></td>
	</tr>
	<tr>
		<td>Title English</td>
		<td><?php echo $Title_English; ?></td>
		<td><?php echo $_SESSION['Title_English']; ?></td>
	</tr>
	<tr>
		<td>Description English</td>
		<td><?php echo $Description_English; ?></td>
		<td><?php echo $_SESSION['Description_English']; ?></td>
	</tr>
	<tr>
		<td>Title French</td>
		<td><?php echo $Title_French; ?></td>
		<td><?php echo $_SESSION['Title_French']; ?></td>
	</tr>
	<tr>
		<td>Description French</td>
		<td><?php echo $Description_French; ?></td>
		<td><?php echo $_SESSION['Description_French']; ?></td>
	</tr>
	<tr>
		<td>Country of Origin</td>
		<td><?php echo $Country_Of_Origin; ?></td>
		<td><?php echo $_SESSION['Country_Of_Origin']; ?></td>
	</tr>
	<tr>
		<td>Spare Parts</td>
		<td><?php echo $Spare_Parts; ?></td>
		<td><?php echo $_SESSION['Spare_Parts']; ?></td>
	</tr>
	<tr>
		<td>Instructions</td>
		<td><?php echo $Instructions; ?></td>
		<td><?php echo $_SESSION['Instructions']; ?></td>
	</tr>
		<tr>
		<td>Price</td>
		<td><?php echo $Price; ?></td>
		<td><?php echo $_SESSION['Price']; ?></td>
	</tr>
</table>

<h3>Are you sure you want this change?</h3>
<form method="POST" action="../Controllers/UpdateController.php">
	<input type="hidden" name="Item_No" value="<?php echo $Item_No ?>">
	<input type="hidden" name="Category" value="<?php echo $Category ?>">
	<input type="hidden" name="SubCategory" value="<?php echo $SubCategory ?>">
	<input type="hidden" name="Availability" value="<?php echo $Availability ?>">
	<input type="hidden" name="New" value="<?php echo $New ?>">
	<input type="hidden" name="Colors" value="<?php echo $Colors ?>">
	<input type="hidden" name="Title_English" value="<?php echo $Title_English ?>">
	<input type="hidden" name="Description_English" value="<?php echo $Description_English ?>">
	<input type="hidden" name="Title_French" value="<?php echo $Title_French ?>">
	<input type="hidden" name="Description_French" value="<?php echo $Description_French ?>">
	<input type="hidden" name="Country_Of_Origin" value="<?php echo $Country_Of_Origin ?>">
	<input type="hidden" name="Spare_Parts" value="<?php echo $Spare_Parts ?>">
	<input type="hidden" name="Instructions" value="<?php echo $Instructions ?>">
	<input type="hidden" name="Price" value="<?php echo $Price ?>">
	<input type="hidden" name="Large_Image" value="<?php echo $Large_Image ?>">
	<input type="hidden" name="Large_Image_Text" value="<?php echo $Large_Image_Text ?>">
	<input type="hidden" name="Small_Image" value="<?php echo $Small_Image ?>">
	<input type="hidden" name="Small_Image_Text" value="<?php echo $Small_Image_Text ?>">

	<input type="submit" value="Yes" name="Yes">
	<input type="submit" value="No" name="No">
</form>
</div>
<?php
DefaultFoot();
?>