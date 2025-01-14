<?php

include_once 'db_connection.php'; // Include the database connection file


//v3.0.0- Read one blog Post.
function viewProfile($user_id) {
    $user_id = intval($user_id); // Ensure $user_id is an integer
    $query = "SELECT * FROM users WHERE user_id = '$user_id'";
    return get($query); // Use get() to fetch profile data
}


function viewProfileName($user_id) {
    $user_id = intval($user_id); // Ensure $user_id is an integer
    $query = "SELECT username FROM users WHERE user_id = '$user_id'";
    return get($query); // Use get() to fetch profile data
}

//v3.0.0- Update a blog post
function updateProfile($user_id, $name, $email, $phone, $username ) {
    $user_id = intval($user_id); // Ensure $user_id is an integer
    $name = htmlspecialchars($name, ENT_QUOTES); // Sanitize input
    $email = htmlspecialchars($email, ENT_QUOTES); // Sanitize input
    $phone = htmlspecialchars($phone, ENT_QUOTES); // Sanitize input
    $username = htmlspecialchars($username, ENT_QUOTES); // Sanitize input

    $query = "
        UPDATE users 
        SET 
            name = '$name', 
            email = '$email', 
            phone = '$phone', 
            username = '$username'
        WHERE user_id = '$user_id'
    ";
    return execute($query); // Use execute() to run the query
}
?>