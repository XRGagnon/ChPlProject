<?php
include_once "../Models/Defaults.php";
include_once "../Models/Partials.php";
include_once "../DBManager/DBManager.php";
include_once "../DBManager/ConnectionMaker.php";

if(isset($_POST['YES']))
{
	echo "You clicked on yes";
	$Delete = DBManager::Remove_Item($_SESSION['id']);
	header('Location: ../Pages/ViewItems.php');
}
else if(isset($_POST['NO']))
{
	echo "You clicked on No";
	header('Location: ../Pages/ViewItems.php');
}
?> 