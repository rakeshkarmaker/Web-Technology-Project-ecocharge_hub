<?php
include_once '../../model/blogDB.php';
session_start();

$blogs = readBlogs($_SESSION['user_id']); //v-2.1.0 $_SESSION['user_id'] is used to fetch the blogs for the logged in user. (one user)
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
        <a href="blog.php" class="btn btn-primary">Add New Blog</a>
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
                            <!-- Issue: when i wrote  this title: "EV's are the future". The view output was like this: EV&#039;s are the future. -->
                             <!-- Reason: e the htmlspecialchars() function (prevents XSS attacks) is encoding special characters like ' into their corresponding HTML entities. -->
                             <!-- v2.1.0- Solve: while displaying just decode these HTML entities back into their character representations by using html_entity_decode(). -->
                            <td><?php echo html_entity_decode(htmlspecialchars($blog['blog_id'])); ?></td>
                            <td><?php echo html_entity_decode(htmlspecialchars($blog['title'])); ?></td>
                            <td><?php echo html_entity_decode(htmlspecialchars($blog['user_id'])); ?></td>
                            <td><?php echo html_entity_decode(htmlspecialchars($blog['created_at'])); ?></td>
                            <td>
                                <a href="blog.php?action=edit&id=<?php echo htmlspecialchars($blog['blog_id']); ?>">Edit</a>
                                <a href="../../controller/blogController.php?action=id=<?php echo htmlspecialchars($blog['blog_id']); ?>" onclick="return confirm('Are you sure you want to delete this blog?');">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>

            </tbody>
        </table>
    </div>
</body>

</html>