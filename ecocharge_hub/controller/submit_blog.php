<?php
require_once '../controller/blogController.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate input
    $title = trim($_POST["title"]);
    $content = trim($_POST["content"]);
    $author = trim($_POST["user_id"]);

    if (empty($title) || empty($content) || empty($author)) {
        echo "All fields are required.";
    } else {
        echo "Blog submitted successfully.";
        echo "`$author`, `$title`, `$content`";
        echo createBlog($author, $title, $content);
        header("Location: ../view/environmentalist/news_blog_management.php");
        
    }
}
?>