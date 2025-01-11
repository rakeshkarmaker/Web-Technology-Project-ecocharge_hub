<?php

include_once 'db_connection.php'; // Include the database connection file


//v3.0.0- Read one blog Post.
function viewProfile($user_id) {
    $user_id = intval($user_id); // Ensure $user_id is an integer
    $query = "SELECT * FROM users WHERE user_id = '$user_id'";
    return get($query); // Use get() to fetch profile data
}

//v3.0.0- Update a blog post
function updateProfile($user_id, $name, $phone, $address, $bio, $profile_pic, $social_links) {
    $user_id = intval($user_id); // Ensure $user_id is an integer
    $name = htmlspecialchars($name, ENT_QUOTES); // Sanitize input
    $phone = htmlspecialchars($phone, ENT_QUOTES); // Sanitize input
    $address = htmlspecialchars($address, ENT_QUOTES); // Sanitize input
    $bio = htmlspecialchars($bio, ENT_QUOTES); // Sanitize input
    $profile_pic = htmlspecialchars($profile_pic, ENT_QUOTES); // Sanitize input
    $social_links = htmlspecialchars($social_links, ENT_QUOTES); // Sanitize input, ensure JSON format is valid

    $query = "
        UPDATE users 
        SET 
            name = '$name', 
            phone = '$phone', 
            address = '$address', 
            bio = '$bio', 
            profile_pic = '$profile_pic', 
            social_links = '$social_links' 
        WHERE user_id = '$user_id'
    ";
    return execute($query); // Use execute() to run the query
}
?>