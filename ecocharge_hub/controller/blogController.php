<?php
include_once(__DIR__ . '/../model/db_connection.php');

// Create a new blog post
function createBlog($user_id, $title, $content) {
    $user_id = intval($user_id); // Ensure $user_id is an integer
    $title = htmlspecialchars($title, ENT_QUOTES); // Sanitize input
    $content = htmlspecialchars($content, ENT_QUOTES); // Sanitize input

    //blog_id	user_id	title	content	created_at	updated_at	
    $query = "INSERT INTO blogs VALUES(NULL,$user_id, '$title', '$content', NOW(), NOW())";
    return execute($query); // Use execute() to run the query
}

// Read all blog posts for a specific user
function readBlogs($user_id) {
    $user_id = intval($user_id); // Ensure $user_id is an integer
    $query = "SELECT * FROM BLOGS WHERE user_id = '$user_id' ORDER BY created_at DESC";
    return get($query); // Use get() to fetch data
}

// Update a blog post
function updateBlog($blog_id, $title, $content) {
    $blog_id = intval($blog_id); // Ensure $blog_id is an integer
    $title = htmlspecialchars($title, ENT_QUOTES); // Sanitize input
    $content = htmlspecialchars($content, ENT_QUOTES); // Sanitize input

    $query = "UPDATE BLOGS SET title = '$title', content = '$content' WHERE blog_id = '$blog_id'";
    return execute($query); // Use execute() to run the query
}

// Delete a blog post
function deleteBlog($blog_id) {
    $blog_id = intval($blog_id); // Ensure $blog_id is an integer
    $query = "DELETE FROM BLOGS WHERE blog_id = '$blog_id'";
    return execute($query); // Use execute() to run the query
}
?>
