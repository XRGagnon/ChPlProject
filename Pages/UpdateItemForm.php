<?php
include_once "../Models/Defaults.php";
include_once "../Models/Partials.php";
include_once "../DBManager/DBManager.php";
include_once "../DBManager/ConnectionMaker.php";
include_once "../Models/Security.php";
include_once "../DBManager/Retrieval.php";
DefaultHead();
//unset previously used sessions 
unset($_SESSION['Item_No']);
unset($_SESSION['Category']);
unset($_SESSION['SubCategory']);
unset($_SESSION['New']);
unset($_SESSION['Colors']);
unset($_SESSION['Title_English']);
unset($_SESSION['Description_English']);
unset($_SESSION['Title_French']);
unset($_SESSION['Description_French']);
unset($_SESSION['Country_Of_Origin']);
unset($_SESSION['Spare_Parts']);
unset($_SESSION['Large_Image']);
unset($_SESSION['Large_Image_Text']);
unset($_SESSION['Small_Image']);
unset($_SESSION['Small_Image_Text']);
unset($_SESSION['Instructions']);
unset($_SESSION['Price']);
unset($_SESSION['changes']);
?>

<h2>This is your current item</h2><br>
<div style="Margin: 30px;">

<?php

//checks if the session is set or not.  
if(!isset($_SESSION['id']))
{
	$_SESSION['id'] = $_GET['id'];
}
//call the function to view all the items
$ViewItems = DBManager::UpdateItemViewItem($_SESSION['id']);
	if(isset($_SESSION['UpdateItemError']))
	{
		echo $_SESSION['UpdateItemError'];
	}	
?>

</br><h2>Select the new Sub-Category</h2></br>
<!-- form to choose the new category -->
<form method="POST" action="../Pages/UpdateItem.php">
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
<form method="POST"  action="../Pages/ViewItems.php">
	<input type="submit" value="Return">
</form>

</div>
<?php
DefaultFoot();
?>