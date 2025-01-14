<?php
session_start();
include_once('../../controller/authGuard.php');
include_once '../../model/blogDB.php';

// Get the blog ID from the URL
$blog_id = $_GET['id'] ?? null;

// Redirect if no ID is provided
if (!$blog_id) {
    header('Location: blogManagement.php');
    exit;
}

// Fetch the blog details
$blog = readBlog($blog_id)[0] ?? null;

if (!$blog) {
    echo "Blog not found!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Blog</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>

<body>
    <div class="container">
        <h1 class="page-title"><?php echo  $blog['title']; ?></h1>
        <div class="blog-details">
            <img src="<?php echo "../".$blog['picture_path'] ?? '../../images/dummy.jpg'; ?>" alt="Image" class="blog-image">
            <p class="blog-author">By: <?php echo  $blog['user_id']; ?></p>
            <p class="blog-date">Published on: <?php echo date('M d, Y', strtotime($blog['created_at'])); ?></p>
            <div class="blog-content">
                <?php echo nl2br( $blog['content']); ?>
            </div>
        </div>
        <div class="actions">
            <a href="blog.php?action=edit&id=<?php echo $blog['blog_id']; ?>" class="btn btn-edit">Edit</a>
            <a href="../../controller/blogController.php?action=delete&id=<?php echo $blog['blog_id']; ?>" class="btn btn-delete" onclick="return confirm('Are you sure you want to delete this blog?');">Delete</a>
            <a href="news_blog_management.php" class="btn btn-primary">Back to Blogs</a>
        </div>
    </div>
    <style>

        .container {
            width: 90%;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .page-title {
            text-align: center;
            font-size: 2rem;
            margin-bottom: 20px;
            color: #333;
        }

        .blog-details {
            margin-top: 20px;
        }

        .blog-image {
            width: 100%;
            max-height: 400px;
            object-fit: cover;
            margin-bottom: 15px;
        }

        .blog-author, .blog-date {
            font-size: 0.9rem;
            color: #777;
            margin-bottom: 10px;
        }

        .blog-content {
            font-size: 1rem;
            line-height: 1.6;
            color: #333;
            margin-top: 15px;
        }

        .actions {
            text-align: center;
            margin-top: 20px;
        }

        .btn {
            padding: 10px 20px;
            text-decoration: none;
            color: white;
            border-radius: 5px;
            display: inline-block;
            text-align: center;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin: 0 5px;
        }

        .btn-primary {
            background-color: #3498db;
        }

        .btn-primary:hover {
            background-color: #2980b9;
        }

        .btn-edit {
            background-color: #f39c12;
        }

        .btn-edit:hover {
            background-color: #e67e22;
        }

        .btn-delete {
            background-color: #e74c3c;
        }

        .btn-delete:hover {
            background-color: #c0392b;
        }
    </style>
</body>

</html>
