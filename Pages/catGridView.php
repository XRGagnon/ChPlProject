<?php
include_once "../Models/Defaults.php";
include_once "../Models/Security.php";
include_once "../Models/Display.php";
sec_session_start();
DefaultHead();
//TODO: Add protection against empty GET
?>
        


           


<?php
$cat = $_GET["catId"];



Display::displayCategoryGrid($cat);



DefaultFoot();