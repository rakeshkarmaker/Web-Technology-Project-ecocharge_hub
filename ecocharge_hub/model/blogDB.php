<?php
include_once 'db_connection.php'; // Include the database connection file

// Create a new blog post
function createBlog($user_id, $title, $content,$img) {
    $user_id = intval(value: $user_id); // Ensure $user_id is an integer
    $title = htmlspecialchars($title, ENT_QUOTES); // Sanitize input
    $content = htmlspecialchars($content, ENT_QUOTES); // Sanitize input
    $img = htmlspecialchars($img, ENT_QUOTES); // Sanitize input

    //blog_id	user_id	title	content	created_at	updated_at	
    $query = "INSERT INTO blogs VALUES(NULL,$user_id, '$title', '$content','$img', NOW(), NOW())";
    return execute($query); // Use execute() to run the query
}

// Read all blog posts for a specific user
function readBlogs($user_id) {
    $user_id = intval($user_id); // Ensure $user_id is an integer
    $query = "SELECT * FROM BLOGS WHERE user_id = '$user_id' ORDER BY created_at DESC";
    return get($query); // Use get() to fetch data
}

// v4.0.0-Read all  blog posts
function readAllBlogs($orderBy) {
    $query = "SELECT * FROM BLOGS ORDER BY created_at $orderBy";
    return get($query); // Use get() to fetch data
}

//v-2.1.0- Read one blog Post.
function readBlog($blog_id) {
    $blog_id = intval($blog_id); //intval => Get the integer value of a variable Returns the int value of value on success, or 0 on failure.
    $query = "SELECT * FROM BLOGS WHERE blog_id = '$blog_id'";
    return get($query); // Use get() to fetch data
}

// Update a blog post
function updateBlog($blog_id, $title, $content,$img) {
    $blog_id = intval(value: $blog_id); // Ensure $blog_id is an integer
    $title = htmlspecialchars($title, ENT_QUOTES); // Sanitize input
    $content = htmlspecialchars($content, ENT_QUOTES); // Sanitize input
    $img = htmlspecialchars($img, ENT_QUOTES); // Sanitize input


    $query = "UPDATE BLOGS SET title = '$title', content = '$content',picture_path ='$img' WHERE blog_id = '$blog_id'";
    return execute($query); // Use execute() to run the query
}

// Delete a blog post
function deleteBlog($blog_id) {
    $blog_id = intval($blog_id); // Ensure $blog_id is an integer

    $query = "DELETE FROM BLOGS WHERE blog_id = '$blog_id'";
    return execute($query); // Use execute() to run the query
}
?>
