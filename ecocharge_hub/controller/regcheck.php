<?php
// Include database connection
include_once('../model/db_connection.php');

// Start the session to manage redirection or session variables
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize user input
    $conn = connection(); // Establish the connection
    $userType = mysqli_real_escape_string($conn, $_POST['userType']);
    $fullName = mysqli_real_escape_string($conn, $_POST['fullName']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $username = mysqli_real_escape_string($conn, $_POST['name']);
    $password = mysqli_real_escape_string($conn, $_POST['pwd']);
    $confirmPassword = mysqli_real_escape_string($conn, $_POST['pwd2']);

    // Validate password confirmation
    if ($password !== $confirmPassword) {
        $_SESSION['error'] = "Passwords do not match!";
        header("Location: ../view/registration.php");
        exit();
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "Invalid email format!";
        header("Location: ../view/registration.php");
        exit();
    }

    // Validate password length
    if (strlen($password) < 8) {
        $_SESSION['error'] = "Password must be at least 8 characters!";
        header("Location: ../view/registration.php");
        exit();
    }

    // Simulating the check if the username already exists (without a database query)
    // This part is a placeholder for a real database check. You could just set a dummy value for testing.
    $usernameExists = false; // Simulate that the username already exists
    if ($usernameExists) {
        $_SESSION['error'] = "Username already exists!";
        header("Location: ../view/registration.php");
        exit();
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Simulating inserting the user into the database (no actual insert operation)
    $registrationSuccess = true; // Simulate successful registration

    if ($registrationSuccess) {
        // Registration successful, redirect to login page
        $_SESSION['success'] = "Registration successful! Please log in.";
        header("Location: ../view/login.php");
        exit();
    } else {
        // Error in registration
        $_SESSION['error'] = "There was an error in registration. Please try again.";
        header("Location: ../view/registration.php");
        exit();
    }
}
?>
