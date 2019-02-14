<?php
include_once "../Models/Defaults.php";
include_once "../Models/Partials.php";
include_once "../DBManager/DBManager.php";
include_once "../DBManager/ConnectionMaker.php";
unset($_SESSION["AddItemError"]);

    if(isset($_POST['Yes'])) {
        $UpdateItem = DBManager::Update_Item($_SESSION['id'],$_POST['Item_No'], $_POST['Category'],
											$_POST['SubCategory'], $_POST['Availability'], $_POST['New'],
											$_POST['Colors'], $_POST['Title_English'], $_POST['Description_English'],
											$_POST['Title_French'], $_POST['Description_French'], 
											$_POST['Country_Of_Origin'], $_POST['Spare_Parts'], 
											$_POST['Large_Image'], $_POST['Large_Image_Text'], $_POST['Small_Image'],											
											$_POST['Small_Image_Text'], $_POST['Instructions'], $_POST['Price']);
    }
    else if (isset($_POST['No'])) {
        header('Location: ../Pages/UpdateItemForm.php');
    }

?>