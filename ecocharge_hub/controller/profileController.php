<?php
session_start();
include_once('authGuard.php');
include_once '../model/userDB.php';

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate input
    $name = trim($_POST["name"]);
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);
    $user_id = intval($_SESSION['user_id']);

    if ( empty($user_id) || empty($name) || empty($email) || empty($phone) || empty($username) ) {
        echo "All fields are required.";
    } else {
        echo "Blog updated successfully.";
        echo updateProfile($user_id, $name, $email, $phone, $username );
        header("Location: ../view/environmentalist/profile.php");
        exit();
    }

}


?>