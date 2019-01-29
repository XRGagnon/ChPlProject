<?php
include_once "../Models/Defaults.php";
include_once "../Models/Partials.php";
include_once "../DBManager/DBManager.php";
include_once "../DBManager/ConnectionMaker.php";

if(isset($_POST['YES']))
{
	$Delete = DBManager::Remove_Item($_SESSION['id']);
	header('Location: ../Pages/ViewItems.php');
}
else if(isset($_POST['NO']))
{
	header('Location: ../Pages/ViewItems.php');
}
?> 