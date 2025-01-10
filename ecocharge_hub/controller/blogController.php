<?php
require_once '../model/blogDB.php'; // Include the blogDB file

// Check if form is submitted

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["add"])) {
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
        exit();

    }

} else if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["edit"])) {
    // Validate input
    $title = trim($_POST["title"]);
    $content = trim($_POST["content"]);
    $blog_id = trim($_POST["blog_id"]);

    if (empty($title) || empty($content) || empty($blog_id)) {
        echo "All fields are required.";
    } else {
        echo "Blog updated successfully.";
        echo "`$blog_id`, `$title`, `$content`";
        echo updateBlog($blog_id, $title, $content);
        header("Location: ../view/environmentalist/news_blog_management.php");
        exit();
    }


} else if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['action']) && $_GET['action']==='delete') {
    // Validate input
    $blog_id = trim($_GET["id"])?? null; //v-2.1.0 null coalescing operator (??). It is used to provide a fallback value if the preceding expression evaluates to null.

    if (empty($blog_id)) {
        echo "All fields are required.";

    } else {
        echo "Blog deleted successfully.";
        echo "`$blog_id`";
        echo deleteBlog($blog_id);
        header("Location: ../view/environmentalist/news_blog_management.php");
        exit();
    }

} else if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_POST["searchBlog"])) {

}else{
    echo "Form not submitted.";

}

?>