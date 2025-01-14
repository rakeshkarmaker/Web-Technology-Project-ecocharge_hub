<?php
require_once '../model/blogDB.php'; //  the blogDB file


function uploadImage($file) { //Upload  image file function
    $uploadDir = '../uploads/blog_pic/';
    $fileName = basename($file['name']);
    $filePath = $uploadDir . $fileName;

    if (move_uploaded_file($file['tmp_name'], $filePath)) {
        return $filePath;
    }
    return false;
}
 
function deleteImage($imagePath) { //Deleting an image file if it exists.
    
    
    if (!empty($imagePath) && file_exists($imagePath)) {
        if (unlink($imagePath)) {
            return true;
        } else {
            return false;
        }
    }
    return false;
}


function handleBlogCreation() { // the blog creation Function.
    $title = trim($_POST["title"]);
    $content = trim($_POST["content"]);
    $author = trim($_POST["user_id"]);
    $file = $_FILES['blog-img'];

    if (empty($title) || empty($content) || empty($author) || empty($file)) {
        echo "All fields are required.";
        return;
    }

    $filePath = uploadImage($file);
    if ($filePath === false) {
        echo "Error uploading the image.";
        return;
    }

    if (createBlog($author, $title, $content, $filePath)) {
        header("Location: ../view/environmentalist/news_blog_management.php");
        exit();
    } else {
        echo "Failed to create the blog.";
    }
}

function handleBlogEditing() { // the blog Edit Function.
    $title = trim($_POST["title"]);
    $content = trim($_POST["content"]);
    $blog_id = trim($_POST["blog_id"]);
    $file = $_FILES['blog-img'];

    // Validate only the essential fields
    if (empty($title) || empty($content) || empty($blog_id)) {
        echo "All fields are required.";
        return;
    }

    $blogData = readBlog($blog_id);
    if (!$blogData) {
        echo "Blog not found.";
        return;
    }

    // Retain the original file path
    $filePath = $blogData['picture_path'];

    // Check if a new file is uploaded
    if ($file['error'] === UPLOAD_ERR_OK) {
        $newFilePath = uploadImage($file);
        if ($newFilePath === false) {
            echo "Error uploading the image.";
            return;
        }

        // Delete the old image if a new one is uploaded
        if ($filePath !== $newFilePath) {
            deleteImage($filePath);
            $filePath = $newFilePath;
        }
    }

    // Update the blog with the retained or new file path
    if (updateBlog($blog_id, $title, $content, $filePath)) {
        header("Location: ../view/environmentalist/news_blog_management.php");
        exit();
    } else {
        echo "Failed to update the blog.";
    }
}


function handleBlogDeletion() { //// the blog deletion Function.
    $blog_id = trim($_GET["id"]) ?? null;

    if (empty($blog_id)) {
        echo "Blog ID is required.";
        return;
    }

    $blogData = readBlog($blog_id);
    if (!$blogData) {
        echo "Blog not found.";
        return;
    }

    if (!empty($blogData['picture_path'])) {
        deleteImage($blogData['picture_path']);
    }

    if (deleteBlog($blog_id)) {
        header("Location: ../view/environmentalist/news_blog_management.php");
        exit();
    } else {
        echo "Failed to delete the blog.";
    }
}


// Main logic for handing UI Requests 
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["add"])) {
        handleBlogCreation();
    } elseif (isset($_POST["edit"])) {
        handleBlogEditing();
    } else {
        echo "Invalid action.";
    }
} elseif ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['action']) && $_GET['action'] === 'delete') {
    handleBlogDeletion();
} else {
    echo "Form not submitted.";
}
?>
