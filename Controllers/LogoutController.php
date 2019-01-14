<?php
/**
 * Created by PhpStorm.
 * User: xavie
 * Date: 14/12/2018
 * Time: 10:22 AM
 */
include_once "../Models/Security.php";
include_once "../DBManager/DBManager.php";
sec_session_start();

// Unset all session values
$_SESSION = array();

// get session parameters
$params = session_get_cookie_params();

// Delete the actual cookie.
setcookie(session_name(),
    '', time() - 42000,
    $params["path"],
    $params["domain"],
    $params["secure"],
    $params["httponly"]);

// Destroy session
session_destroy();
header('Location: ..Pages/TestHome.php');