<?php
session_start();
include_once('../../controller/authGuard.php');
include_once '../../model/blogDB.php';

$user_id = $_SESSION['user_id'] ?? null; // Default: null if user_id is not set
$action_type = $_GET['action'] ?? 'add'; // Default action is 'add'
$blog = null;   // Default: null

// If editing or viewing, retrieve the blog data
if (($action_type === 'edit') && isset($_GET['id'])) {
    $blog_id = $_GET['id'];
    $blog = readBlog($blog_id)[0]; // Fetch blog details from the database. v-2.1.0- Here readBlog returns an array of associative arrays. As, we have here only one array, we will be using the first index [0] to get the first array of the whole array.

    $imagePath = $blog['picture_path'] ?? null; //v4.0.1- picture_path added
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
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>

<body>
    <div class="container">
        <h1 class="page-title"><?php echo ucfirst($action_type); ?> Blog</h1>

        <?php if ($action_type === 'view' && $blog): ?>
            <!-- Display Single Blog -->
            <div class="view-blog">
                <h2 class="blog-title"><?php echo htmlspecialchars($blog['title']); ?></h2>
                <p class="blog-content"><?php echo nl2br(htmlspecialchars($blog['content'])); ?></p>
                <div class="actions">
                    <a href="blog.php?action=edit&id=<?php echo $blog['blog_id']; ?>" class="btn btn-edit">Edit</a>
                    <a href="../../controller/blogController.php?action=delete&id=<?php echo $blog['blog_id']; ?>" class="btn btn-delete" onclick="return confirm('Are you sure you want to delete this blog?');">Delete</a>
                </div>
            </div>

        <?php else: ?>
            <!-- Add/Edit Blog Form -->
            <form action="../../controller/blogController.php" method="post" class="blog-form"  enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" id="title" name="title" value="<?php echo $blog['title'] ?? ''; ?>" required>
                </div>
                <div class="form-group">
                    <label for="content">Content:</label>
                    <textarea id="content" name="content" rows="10" required><?php echo $blog['content'] ?? ''; ?></textarea>
                </div>

                <div class="form-group" style="text-align: center;">
                    <label for="file">Choose a photo:</label>
                    <input
                        type="file"
                        id="blog-img"
                        name="blog-img"
                        accept=".jpg,.png,.webp,.gif,.bmp"
                        <?php if ($action_type === 'add') echo "required"; ?>>
                    <br><br>
                    <!-- Image Preview -->
                    <img
                        src="<?php echo '../'.$blog['picture_path'] ?? '../../images/dummy.jpg'; ?>"
                        alt="Uploaded Image"
                        style="max-width: 300px; margin-top: 10px;"
                    >
                        
                </div>



                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">


                <?php if ($action_type === 'edit'): ?>
                    <input type="hidden" name="blog_id" value="<?php echo $blog['blog_id']; ?>">
                <?php endif; ?>


                <div class="form-actions">
                    <button type="submit" name="<?php echo $action_type; ?>" value="<?php echo $action_type; ?>" class="btn btn-primary">
                        <?php echo ucfirst($action_type); ?>
                    </button>
                </div>
            </form>
        <?php endif; ?>
    </div>

    <style>
        /* Container */
        .container {
            width: 90%;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        /* Page title */
        .page-title {
            text-align: center;
            font-size: 2rem;
            margin-bottom: 20px;
            color: #333;
        }

        /* Blog View */
        .view-blog {
            margin-top: 20px;
        }

        .blog-title {
            font-size: 1.5rem;
            margin-bottom: 15px;
        }

        .blog-content {
            font-size: 1rem;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .actions {
            text-align: center;
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

        .btn-primary {
            background-color: #3498db;
        }

        .btn-primary:hover {
            background-color: #2980b9;
        }

        /* Blog Form */
        .blog-form {
            margin-top: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            font-size: 1.1rem;
            color: #333;
            display: block;
            margin-bottom: 5px;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            font-size: 1rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .form-group textarea {
            resize: vertical;
        }

        .form-actions {
            text-align: center;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .form-group label {
                font-size: 1rem;
            }

            .form-group input,
            .form-group textarea {
                font-size: 0.9rem;
            }

            .btn {
                padding: 8px 16px;
                font-size: 0.9rem;
            }
        }
    </style>
</body>

</html>