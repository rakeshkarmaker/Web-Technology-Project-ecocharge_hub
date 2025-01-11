<?php
// Start the session if it's not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if the user is logged in (check necessary session variables)
if (isset($_SESSION["user_id"]) && isset($_SESSION["username"]) && isset($_SESSION["user_type"])) {

    // Redirect based on the user role
    if ($_SESSION["user_type"] === "Environmentalist") {
        header("Location: /view//environmentalist/dashboard.php"); // Redirect to Environmentalist Dashboard
        exit(); // Stop further execution
    } elseif ($_SESSION["user_type"] === "Supervisor") {
        header("Location: /view/supervisor/dashboard.php"); // Redirect to Supervisor Dashboard
        exit();
    } else {
        // If user type is not recognized, redirect to a general dashboard or homepage
        header("Location: /view/common/dashboard.php");
        exit();
    }

} else {
    // If the user is not logged in, prevent access to login or signup page
    if (basename($_SERVER['PHP_SELF']) === "login.php" || basename($_SERVER['PHP_SELF']) === "signup.php") {
        // If user is on login/signup pages, allow access
        return;
    } else {
        // If not on login/signup pages, redirect to login
        header("Location: /login.php");
        exit();
    }
}
?>
