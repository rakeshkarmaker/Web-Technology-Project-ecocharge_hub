<?php
session_start();
include_once('../../controller/authGuard.php');
include_once '../../model/blogDB.php';
include_once '../../model/userDB.php';

$blogs = readBlogs($_SESSION['user_id']); // Fetch blogs for the logged-in user.
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Blog Management</title>
</head>

<body>
    <div class="container">
        <h1 class="page-title">News Blog Management</h1>
        <div class="button-container">
            <a href="dashboard.php" class="btn btn-primary">Back to Dashboard</a>
            <a href="blog.php" class="btn btn-primary">Add New Blog</a>
        </div>
        <div class="search-box">
            <input type="text" id='search' placeholder="Search by Name or ID">
            <button type="button" onclick="ajax()">Search</button>
            <p id="search-error" style="color: red; display: none;">Please enter a search term.</p> <!-- Error message for empty input -->
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <!-- <th>Picture</th> -->
                    <th>Author</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="blogs">
                <?php if (empty($blogs)): ?>
                    <tr>
                        <td colspan="5">No blogs available.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($blogs as $blog): ?>
                        <tr>
                            <td><?php echo $blog['blog_id']; ?></td>
                            <td><?php echo $blog['title']; ?></td>
                            <td><?php echo viewProfileName($blog['user_id'])[0]['username']; // returns array(1) { [0]=> array(1) { ["username"]=> string(4) "urmi" } } 
                                ?></td>
                            <td><?php echo $blog['created_at']; ?></td>
                            <td>
                                <a href="blog.php?action=edit&id=<?php echo $blog['blog_id']; ?>" class="btn btn-edit">Edit</a>
                                <a href="../../controller/blogController.php?action=delete&id=<?php echo htmlspecialchars($blog['blog_id']); ?>" class="btn btn-delete" onclick="return confirm('Are you sure you want to delete this blog?');">Delete</a>
                                <a href="viewBlog.php?&id=<?php echo $blog['blog_id']; ?>">View</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <script>
        function ajax() {
            let search = document.getElementById('search').value.trim(); // Trim to avoid unnecessary whitespaces

            let xhttp = new XMLHttpRequest();
            xhttp.open('GET', '../../controller/blogController.php?action=search&searchText=' + search, true); // Sends the get info with the search value.

            xhttp.onreadystatechange = function() {
                if (this.readyState === 4) {
                    let tableBody = document.getElementById('blogs');
                    tableBody.innerHTML = ""; // Clear existing table content

                    if (this.status === 200) {
                        let response = JSON.parse(this.responseText); // Parse the JSON response

                        if (response.error) {
                            tableBody.innerHTML = `<tr><td colspan="5">${response.error}</td></tr>`;
                        } else if (response.length > 0) {
                            // Dynamically build the table rows based on the response
                            response.forEach(blog => {
                                let row = `<tr>
                            <td>${blog.blog_id}</td>
                            <td>${blog.title}</td>
                            <td>${blog.author}</td>
                            <td>${blog.created_at}</td>
                            <td>
                                <a href="blog.php?action=edit&id=${blog.blog_id}" class="btn btn-edit">Edit</a>
                                <a href="../../controller/blogController.php?action=delete&id=${blog.blog_id}" class="btn btn-delete" onclick="return confirm('Are you sure you want to delete this blog?');">Delete</a>
                                <a href="viewBlog.php?id=${blog.blog_id}">View</a>
                            </td>
                        </tr>`;
                                tableBody.innerHTML += row; // Add each row to the table
                            });
                        } else {
                            tableBody.innerHTML = `<tr><td colspan="5">No blogs found matching your search.</td></tr>`;
                        }
                    } else {
                        tableBody.innerHTML = `<tr><td colspan="5">Server error: ${this.status}</td></tr>`;
                    }
                }
            };

            xhttp.send(); // Sending the request.
        }
    </script>

    <style>
        /* For the search button -start */
        .search-box {
            margin-bottom: 20px;
            text-align: center;
        }

        .search-box input {
            padding: 10px;
            width: 300px;
        }

        .search-box button {
            padding: 10px;
            cursor: pointer;
        }

        /* For the search button -end */

        /* Container and general styles */
        .container {
            width: 90%;
            max-width: 1200px;
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
            color: #333;
            margin-bottom: 20px;
        }

        /* Button container */
        .button-container {
            text-align: center;
            margin-bottom: 20px;
        }

        .btn {
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            color: white;
            text-align: center;
            cursor: pointer;
            transition: background-color 0.3s ease;
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

        /* Table styles */
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table th,
        .table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .table th {
            background-color: #f1f1f1;
        }

        .table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        /* Responsive design */
        @media (max-width: 768px) {

            .table th,
            .table td {
                font-size: 0.9rem;
                padding: 8px;
            }

            .btn {
                padding: 8px 16px;
                font-size: 0.9rem;
            }

            .container {
                padding: 15px;
            }
        }
    </style>
</body>

</html>