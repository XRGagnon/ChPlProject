<?php
/**
 * Created by PhpStorm.
 * User: xavie
 * Date: 15/02/2019
 * Time: 6:53 PM
 */

include_once "../Models/Security.php";
include_once "../DBManager/DBManager.php";
include_once "../DBManager/Utility.php";
sec_session_start();

$sender = "";
$destinator = "olympicplatinummail@gmail.com";
$subject = "";
$msg = "";
$name = "";
$errorMsg = null;
$success = true;
$successMsg = "";



if (isset($_POST["sender"]) && isset($_POST["subject"]) && isset($_POST["msg"]) && isset($_POST["name"]))
{
    $sender = $_POST["sender"];
    $subject = $_POST["subject"];
    $msg = $_POST["msg"];
    $name = $_POST["name"];
    $sender = filter_var($sender, FILTER_SANITIZE_EMAIL);
    if (filter_var($sender, FILTER_VALIDATE_EMAIL))
    {
        Utility::contact($sender,$subject,$msg,$sender,$name);
        $successMsg = "Thank you for contacting us";
    }
    else
    {
        $errorMsg = "Email Address not valid";
        $success = false;
    }
}
else
{
    $errorMsg = "Please fill out all fields";
    $success = false;
}

if (!$success)
{
    header("Location: ../Pages/Contact.php?error=".$errorMsg);
}
else
{
    header("Location: ../Pages/Contact.php?success=".$successMsg);
}
