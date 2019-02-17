<?php
/**
 * Created by PhpStorm.
 * User: xavie
 * Date: 14/12/2018
 * Time: 10:39 AM
 */
include_once "../DBManager/ConnectionMaker.php";
include_once "../Models/Security.php";
sec_session_start();
$error_msg = "";
$conn = ConnectionMaker::getConnection();
if (isset($_POST['username'], $_POST['email'], $_POST['firstname'],$_POST['lastname'],$_POST['password'])) {
    // Sanitize and validate the data passed in
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
    $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Not a valid email
        $error_msg .= '<p class="error">The email address you entered is not valid</p>';
    }

    $password = filter_input(INPUT_POST, 'p', FILTER_SANITIZE_STRING);
    if (strlen($password) != 128) {
        // The hashed pwd should be 128 characters long.
        // If it's not, something really odd has happened
        $error_msg .= '<p class="error">Invalid password configuration.</p>';
    }


    // Username validity and password validity have been checked client side.
    // This should should be adequate as nobody gains any advantage from
    // breaking these rules.
    //

    $prep_stmt = "SELECT User_ID FROM user WHERE Username = ? LIMIT 1";
    $stmt = $conn->prepare($prep_stmt);

    // check existing username
    if ($stmt) {
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows == 1) {
            // A user with this username already exists
            $error_msg .= '<p class="error">A user with this username already exists.</p>';
            $stmt->close();
        }
    } else {
        $error_msg .= '<p class="error">Database error Line 39</p>';
        $stmt->close();
    }

    // check existing email
    $prep_stmt = "SELECT User_Email FROM user WHERE User_Email = ? LIMIT 1";
    $stmt = $conn->prepare($prep_stmt);

    if ($stmt) {
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows == 1) {
            // A user with this email address already exists
            $error_msg .= '<p class="error">A user with this email address already exists</p>';
            $stmt->close();
        }
    } else {
        $error_msg .= '<p class="error">Database error line 55</p>';
        $stmt->close();
    }


    if (empty($error_msg)) {

        // Create hashed password using the password_hash function.
        // This function salts it with a random salt and can be verified with
        // the password_verify function.
        $password = password_hash($password, PASSWORD_BCRYPT);
        $date = date("Y-m-d");
        $defType = "Customer";
        // Insert the new user into the database
        if ($insert_stmt = $conn->prepare("INSERT INTO user (Username, User_Email, User_Password, User_Fname, User_Lname, User_Type, Date_Added) VALUES (?, ?, ?, ?, ?, ?, ?)")) {
            $insert_stmt->bind_param('sssssss', $username, $email, $password, $firstname, $lastname, $defType, $date);
            // Execute the prepared query.
            if (! $insert_stmt->execute()) {
                header('Location: ../Pages/Register.php?err=Registration failure: INSERT');
            }
        }
        header('Location: ../Pages/index.php');
    }
    else
        {
        $_SESSION["errorMsg"] = $error_msg;
        header("Location: ../Pages/Register.php");
    }
}