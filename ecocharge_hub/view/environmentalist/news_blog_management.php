<?php
include_once '../../controller/blogController.php';
session_start();

$blogs = readBlogs($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Blog Management</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>

<body>
    <div class="container">
        <h1>News Blog Management</h1>
        <a href="add_blog.php" class="btn btn-primary">Add New Blog</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($blogs)): ?>
                    <tr>
                        <td colspan="5">No blogs available.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($blogs as $blog): ?>
                        <!-- blog_id	user_id	title	content	created_at	updated_at -->
                        <tr>
                            <td><?php echo htmlspecialchars($blog['blog_id']); ?></td>
                            <td><?php echo htmlspecialchars($blog['title']); ?></td>
                            <td><?php echo htmlspecialchars($blog['user_id']); ?></td>
                            <td><?php echo htmlspecialchars($blog['created_at']); ?></td>
                            <td>
                                <a href="edit_blog.php?id=<?php echo htmlspecialchars($blog['blog_id']); ?>">Edit</a>
                                <a href="delete_blog.php?id=<?php echo htmlspecialchars($blog['blog_id']); ?>" onclick="return confirm('Are you sure you want to delete this blog?');">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>

            </tbody>
        </table>
    </div>
</body>

</html>