<?php
include_once "../Models/Defaults.php";
include_once "../DBManager/DBManager.php";
include_once "../DBManager/ConnectionMaker.php";
unset($_SESSION["AddItemError"]);
// this is the controller to get the data from the item form and then add it to the database

//Check to see if the user entered all neccessary data
	if(!isset($_POST['Item_No']) || !isset($_POST['SubCategory']) 
		|| !isset($_POST['Availability']) || !isset($_POST['New'])
		|| !isset($_POST['Title_English']) || !isset($_POST['Title_French']))
	{
		//if the user did not enter the required data they are sent back to the beginning 
		$_SESSION["UpdateItemError"] = "You did not fill in all required data, please start";
		header('Location: ../Pages/UpdateItemForm.php');
	}
	else
	{
		$Item_No = $_POST['Item_No'];
		$Category = $_POST['Category'];
		$SubCategory = $_POST['SubCategory'];
		$Availability = $_POST['Availability'];
		$New = $_POST['New'];

		//For all the colors 
		$Colors = '';
		if(isset($_POST['Green']))
		{
			$Colors = $Colors . $_POST['Green'] . ", ";
		}
		if(isset($_POST['Blue']))
		{
			$Colors = $Colors . $_POST['Blue'] . ", ";
		}
		if(isset($_POST['Gold']))
		{
			$Colors = $Colors . $_POST['Gold'] . ", ";
		}
		if(isset($_POST['Grey']))
		{
			$Colors = $Colors . $_POST['Grey'] . ", ";
		}
		if(isset($_POST['White']))
		{
			$Colors = $Colors . $_POST['White'] . ", ";
		}
		if(isset($_POST['Mocha']))
		{
			$Colors = $Colors . $_POST['Mocha'] . ", ";
		}
		if(isset($_POST['Light_Grey']))
		{
			$Colors = $Colors . $_POST['Light_Grey'] . ", ";
		}
		if(isset($_POST['Black']))
		{
			$Colors = $Colors. $_POST['Black'] . ", " ;
		}
		if(isset($_POST['Red_Grey']))
		{
			$Colors = $Colors . $_POST['Red_Grey'] . ", ";
		}

		//end of colors

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
		
		$Add = DBManager::Add_Item($Item_No, $Category, $SubCategory, $Availability, $New, $Colors, 
				$Title_English, $Description_English, $Title_French, $Description_French, $Country_Of_Origin, 
				$Spare_Parts, $Large_Image, $Large_Image_Text, $Small_Image, $Small_Image_Text, $Instructions, $Price);
				
		?>
			<form method="POST" action="../Pages/ViewItems.php">
				<input type="submit" value="Return to main Page">
			</form>
		<?php
		
	}



?>