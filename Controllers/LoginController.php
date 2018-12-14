<?php
/**
 * Created by PhpStorm.
 * User: xavie
 * Date: 13/12/2018
 * Time: 10:26 AM
 */
include "../DBManager/DBManager.php";
if (!isset($_POST["username"]) || !isset($_POST["password"]))
{
    $username = $_POST["username"];
    $password = $_POST["password"];
    $success = DBManager::Login($username, $password);
}
