
<!-- v-2.1.0- Add/Edit/view Blog Form all together -->
<?php
session_start();
include_once '../../model/blogDB.php';

$user_id = $_SESSION['user_id'] ?? null; // Default: null if user_id is not set
$action_type = $_GET['action'] ?? 'add'; // Default action is 'add'
$blog = null;   // Default: null

// If editing or viewing, retrieve the blog data
if (($action_type === 'edit' || $action_type === 'view') && isset($_GET['id'])) {
    $blog_id = $_GET['id'];
    $blog = readBlog($blog_id)[0]; // Fetch blog details from the database. v-2.1.0- Here readBlog returns an array of associative arrays. As, we have here only one array, we will be using the first index [0] to get the first array of the whole array.
    
    if (!$blog) {
        echo "Blog not found!";
        exit;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo ucfirst($action_type); ?> Blog</title>
</head>
<body>
    <h1><?php echo ucfirst($action_type); ?> Blog</h1>
    
    <?php if ($action_type === 'view' && $blog): ?>
        <!-- Display Single Blog -->
        <h2><?php echo htmlspecialchars($blog['title']); ?></h2>
        <p><?php echo nl2br(htmlspecialchars($blog['content'])); ?></p>
        <a href="add_blog.php?action=edit&id=<?php echo $blog['id']; ?>">Edit</a>
        <a href="../../controller/blogController.php?action=delete&id=<?php echo $blog['id']; ?>">Delete</a>

        
    <?php else: ?>
        <!-- Add/Edit Blog Form -->
         <?php
            //Debugging:
            // echo $_SESSION['user_id'];
            // echo $user_id;
            // echo $_GET['id'];
            // echo $blog_id;
            // echo $blog['title'];
            // echo $blog['content'];
            // echo $blog['user_id'];
            // echo var_dump($blog);

         ?>
        <form action="../../controller/blogController.php" method="post">
            <div>
                <label for="title">Title:</label>
                <input 
                    type="text" 
                    id="title" 
                    name="title" 
                    value="<?php echo $blog['title'] ?? ''; ?>" 
                    required>
            </div>
            <div>
                <label for="content">Content:</label>
                <textarea 
                    id="content" 
                    name="content" 
                    rows="10" 
                    required><?php echo $blog['content'] ?? ''; ?></textarea>
            </div>
            <div>
                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                <!-- v2.1.0- blog_id is required only when we will be editing a blog. -->
                <?php if ($action_type === 'edit'): ?>
                    <input type="hidden" name="blog_id" value="<?php echo $blog['blog_id']; ?>">
                <?php endif; ?>
            </div>
            <div>
                <button type="submit" name="<?php echo $action_type; ?>" value="<?php echo $action_type; ?>">
                    <?php echo ucfirst($action_type); ?>
                </button>
            </div>
        </form>
    <?php endif; ?>
</body>
</html>
