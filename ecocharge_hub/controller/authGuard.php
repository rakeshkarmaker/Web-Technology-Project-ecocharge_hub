<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // checking if the user is logged in or not. If not the redirect to log in!
    if(!isset($_SESSION["user_id"]) || !isset($_SESSION["username"]) || !isset($_SESSION["user_type"]) ){
        header("Location: ../../index.php?message=invalid_credentials");
        exit();

    }

// Role-based directory restriction
$currentDir = basename(dirname($_SERVER['PHP_SELF'])); // Get current directory name
$userRole = $_SESSION["user_type"]; // Current user's role

// Map directory names to roles
if ( ($currentDir === 'environmentalist' && $userRole !== 'Environmentalist') ||($currentDir === 'supervisor' && $userRole !== 'Supervisor') ) {
    echo "ERROR! You don't have permission.";
    header("Location: ../../index.php?message=invalid_access");
    exit();
}

?>