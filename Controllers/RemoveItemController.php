<?php
session_start();
unset($_SESSION['CAT']);
unset($_SESSION['Item']);

if(isset($POST['CategoryForm'])
{
	$_SESSION['CAT'] = $_POST['Category'];
	header('Location: ../Pages/RemoveItem.php');
}
else if(isset($POST['ItemNoForm'])
{
	$_SESSION['Item'] = $_POST['Item_No'];
	header('Location: ../Pages/RemoveItem.php');
}
?> 