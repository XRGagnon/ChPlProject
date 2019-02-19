<?php
include_once "../Models/Defaults.php";
include_once "../Models/Partials.php";
include_once "../DBManager/DBManager.php";
include_once "../DBManager/ConnectionMaker.php";
unset($_SESSION["UpdateItemError"]);
DefaultHead();
?>

<?php
	//checks to see if the various items were entered in the previous page. 
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
		//if the user did enter the values, the rest are retrieved 
		$Item_No = $_POST['Item_No'];
		$Category = $_POST['Category'];
		$SubCategory = $_POST['SubCategory'];
		$Availability = $_POST['Availability'];
		$New = $_POST['New'];
		$Colors = '';
		
		//This paryt is for adding the colors to a string for proper implentation into the database 
			if(isset($_POST['Green']))
			{
				if($Colors == '')
				{
					$Colors = $_POST['Green'];
				}
				else
				{
					$Colors = $Colors . ", " . $_POST['Blue'];
				}
				
			}
			if(isset($_POST['Blue']))
			{
				if($Colors == '')
				{
					$Colors = $_POST['Blue'];
				}
				else
				{
					$Colors = $Colors . ", " . $_POST['Blue'];
				}
			}
			if(isset($_POST['Gold']))
			{
				if($Colors == '')
				{
					$Colors = $_POST['Gold'];
				}
				else
				{
					$Colors = $Colors . ", " . $_POST['Gold'];
				}	
			}
			if(isset($_POST['Grey']))
			{
				if($Colors == '')
				{
					$Colors = $_POST['Grey'];
				}
				else
				{
					$Colors = $Colors . ", " . $_POST['Grey'];
				}
			}
			if(isset($_POST['White']))
			{
				if($Colors == '')
				{
					$Colors = $_POST['White'];
				}
				else
				{
					$Colors = $Colors . ", " . $_POST['White'];
				}			
			}
			if(isset($_POST['Mocha']))
			{
				if($Colors == '')
				{
					$Colors = $_POST['Mocha'];
				}
				else
				{
					$Colors = $Colors . ", " . $_POST['Mocha'];
				}			
			}
			if(isset($_POST['Light_Grey']))
			{
				if($Colors == '')
				{
					$Colors = $_POST['Light_Grey'];
				}
				else
				{
					$Colors = $Colors . ", " . $_POST['Light_Grey'];
				}				
			}
			if(isset($_POST['Black']))
			{
				if($Colors == '')
				{
					$Colors = $_POST['Black'];
				}
				else
				{
					$Colors = $Colors . ", " . $_POST['Black'];
				}			
			}
			if(isset($_POST['Red_Grey']))
			{
				if($Colors == '')
				{
					$Colors = $_POST['Red_Grey'];
				}
				else
				{
					$Colors = $Colors . ", " . $_POST['Red_Grey'];
				}
			}
		
		//checks each variable if it was entered or not, if not entered the field will be NULL
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
		
		if(isset($_POST['Large_Image']))
		{
			$Large_Image = $_POST['Large_Image'];
		}
		else
		{
			$Large_Image = null;
		} 
		
		if(isset($_POST['Large_Image_Text']))
		{
			$Large_Image_Text = $_POST['Large_Image_Text'];
		}
		else
		{
			$Large_Image_Text = null;
		} 
		
		if(isset($_POST['Small_Image']))
		{
			$Small_Image = $_POST['Small_Image'];
		}
		else
		{
			$Small_Image = null;
		}  
		
		if(isset($_POST['Small_Image_Text']))
		{
			$Small_Image_Text = $_POST['Small_Image_Text'];
		}
		else
		{
			$Small_Image_Text = null;
		}
	}
?>

<h2>Confirm Page</h2>

<div style='Margin: 30px;'>
<table >
	<tr>
	<!-- Format the old and new results into a table format -->
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
	</tr>
		<tr>
		<td>Large Image</td>
		<td><?php echo $Large_Image; ?></td>
		<td><?php echo $_SESSION['Large_Image']; ?></td>
	</tr>
	</tr>
		<tr>
		<td>Large_Image_Text</td>
		<td><?php echo $Large_Image_Text; ?></td>
		<td><?php echo $_SESSION['Large_Image_Text']; ?></td>
	</tr>
	</tr>
		<tr>
		<td>Small_Image</td>
		<td><?php echo $Small_Image; ?></td>
		<td><?php echo $_SESSION['Small_Image']; ?></td>
	</tr>
		</tr>
		<tr>
		<td>Small_Image_Text</td>
		<td><?php echo $Small_Image_Text; ?></td>
		<td><?php echo $_SESSION['Small_Image_Text']; ?></td>
	</tr>
</table>

<?php 

//checks to see if there were any changes from the old value to the new value. 
$_SESSION['changes'] = "";

if($Item_No != $_SESSION['Item_No'])
{
	$_SESSION['changes'] .= "Changed Item_No: ". $_SESSION['Item_No'] ." to " . $Item_No . ",";
}

if($Category != $_SESSION['Category'])
{
	$_SESSION['changes'] .= "Changed Category: ". $_SESSION['Category'] ." to " . $Category . ",";
}

if($SubCategory != $_SESSION['SubCategory'])
{
	$_SESSION['changes'] .= "Changed SubCategory: ". $_SESSION['SubCategory'] ." to " . $SubCategory . ",";
} 

if($Availability != $_SESSION['Availability'])
{
	$_SESSION['changes'] .= "Changed Availability: ". $_SESSION['Availability'] ." to " . $Availability . ",";
}

if($New != $_SESSION['New'])
{
	$_SESSION['changes'] .= "Changed New: ". $_SESSION['New'] ." to " . $New . ",";
}

if($Colors != $_SESSION['Colors'])
{
	$_SESSION['changes'] .= "Changed Colors: ". $_SESSION['Colors'] ." to " . $Colors . ",";
}

if($Title_English != $_SESSION['Title_English'])
{
	$_SESSION['changes'] .= "Changed Title_English: ". $_SESSION['Title_English'] ." to " . $Title_English . ",";
}

if($Description_English != $_SESSION['Description_English'])
{
	$_SESSION['changes'] .= "Changed Description_English: ". $_SESSION['Description_English'] ." to " . $Description_English . ",";
}

if($Title_French != $_SESSION['Title_French'])
{
	$_SESSION['changes'] .= "Changed Title_French: ". $_SESSION['Title_French'] ." to " . $Title_French . ",";
}

if($Description_French != $_SESSION['Description_French'])
{
	$_SESSION['changes'] .= "Changed Description_French: ". $_SESSION['Description_French'] ." to " . $Description_French . ",";
}

if($Country_Of_Origin != $_SESSION['Country_Of_Origin'])
{
	$_SESSION['changes'] .= "Changed Country_Of_Origin: ". $_SESSION['Country_Of_Origin'] ." to " . $Country_Of_Origin . ",";
}

if($Spare_Parts != $_SESSION['Spare_Parts'])
{
	$_SESSION['changes'] .= "Changed Spare_Parts: ". $_SESSION['Spare_Parts'] ." to " . $Spare_Parts . ",";
}

if($Instructions != $_SESSION['Instructions'])
{
	$_SESSION['changes'] .= "Changed Instructions: ". $_SESSION['Instructions'] ." to " . $Instructions . ",";
}

if($Price != $_SESSION['Price'])
{
	$_SESSION['changes'] .= "Changed Price: ". $_SESSION['Price'] ." to " . $Price . ",";
}

if($Large_Image != $_SESSION['Large_Image'])
{
	$_SESSION['changes'] .= "Changed Large_Image: ". $_SESSION['Large_Image'] ." to " . $Large_Image . ",";
}

if($Large_Image_Text != $_SESSION['Large_Image_Text'])
{
	$_SESSION['changes'] .= "Changed Large_Image_Text: ". $_SESSION['Large_Image_Text'] ." to " . $Large_Image_Text . ",";
}

if($Small_Image != $_SESSION['Small_Image'])
{
	$_SESSION['changes'] .= "Changed Small_Image: ". $_SESSION['Small_Image'] ." to " . $Small_Image . ",";
}

if($Small_Image_Text != $_SESSION['Small_Image_Text'])
{
	$_SESSION['changes'] .= "Changed Small_Image_Text: ". $_SESSION['Small_Image_Text'] ." to " . $Small_Image_Text . ",";
}

?>
<!-- confirmation of the update with hidden values containng the new values.-->
<h3>Are you sure you want this change?</h3>
<form method="POST" action="../Controllers/UpdateController.php">
	<input type="hidden" name="Old_English" value="<?php echo $_SESSION['Title_English']?>">
	<input type="hidden" name="Old_French" value="<?php echo $_SESSION['Title_French'] ?>">
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