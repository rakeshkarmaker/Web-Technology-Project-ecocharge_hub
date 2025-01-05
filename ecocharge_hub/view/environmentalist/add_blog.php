<?php
session_start(); // Add this line at the top of your PHP file
echo $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Blog</title>
</head>
<body>
    <h1>Add New Blog</h1>
    <form action="../../controller/submit_blog.php" method="post">
        <div>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>
        </div>
        <div>
            <label for="content">Content:</label>
            <textarea id="content" name="content" rows="10" required></textarea>
        </div>
        <div>
            <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
        </div>
        <div>
            <button type="submit">Submit</button>
        </div>
    </form>
</body>
</html>