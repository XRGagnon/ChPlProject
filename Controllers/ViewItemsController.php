<?php
session_start();
unset($_SESSION['CAT']);
unset($_SESSION['Item']);

if(isset($_POST['CategoryForm']))
{
	$_SESSION['CAT'] = $_POST['Category'];
	header('Location: ../Pages/ViewItems.php');
}
else if(isset($_POST['ItemNoForm']))
{
	$_SESSION['Item'] = $_POST['Item_No'];
	header('Location: ../Pages/ViewItems.php');
}
else if(isset($_POST['Reset']))
{
	header('Location: ../Pages/ViewItems.php');
}
?> 