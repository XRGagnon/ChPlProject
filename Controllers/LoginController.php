<?php

sec_session_start();
/**
 * Created by PhpStorm.
 * User: xavie
 * Date: 13/12/2018
 * Time: 10:26 AM
 */
include "../Models/Security.php";
include "../DBManager/DBManager.php";
if (!isset($_POST["username"]) || !isset($_POST["password"]))
{
    $username = $_POST["username"];
    $password = $_POST["password"];
    if (DBManager::Login($username, $password))
    {
        header('Location: ../Pages/TestHome.php');
    }
    else
    {
        header('Location: ../Pages/TestHome.php?error="Invalid Username or Password"');
    }
}
else
{
    header('Location: ../Pages/TestHome.php?error="Enter both Username and Password"');
}
