<?php
include_once "../Models/Security.php";
include_once "../DBManager/DBManager.php";

sec_session_start(); // Our custom secure way of starting a PHP session.

if (isset($_POST['username'], $_POST['p'])) {
    $username = $_POST['username'];
    $password = $_POST['p']; // The hashed password.

    if (DBManager::Login($username, $password) == true) {
        // Login success
        header('Location: ../Pages/index.php');
    } else {
        // Login failed
        header('Location: ../Pages/Login.php?error=1');
    }
} else {
    // The correct POST variables were not sent to this page.
    echo 'Invalid Request';
}
