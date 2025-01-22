<?php
session_start();
include_once('../../controller/authGuard.php');
include_once '../../model/reviewDB.php';
include_once '../../model/userDB.php';
include_once('../../model/evStationDB.php');

$reviews = readReviewsByUser($_SESSION['user_id']); // Fetch reviews for the logged-in user.
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Management</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>

<body>
    <div class="container">
        <h1 class="page-title">Review Management</h1>
        <!-- Go back -->
        <div class="button-container">
            <a href="dashboard.php" class="btn btn-primary">Back to Dashboard</a>
            <a href="view_stations.php" class="btn btn-primary">Add New Review</a>
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
                    <th>Station</th>
                    <th>Rating</th>
                    <th>Review</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="reviews">
                <?php if (empty($reviews)): ?>
                    <tr>
                        <td colspan="6">No reviews available.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($reviews as $review): ?>
                        <tr>
                            <td><?php echo $review['review_id']; ?></td>
                            <td><?php echo getStationName($review['station_id']); // Function to get station name 
                                ?></td>
                            <td><?php echo $review['rating']; ?>/5</td>
                            <td><?php echo $review['review']; ?></td>
                            <td><?php echo $review['created_at']; ?></td>
                            <td>
                                <a href="review.php?action=edit&id=<?php echo $review['review_id']; ?>" class="btn btn-edit">Edit</a>
                                <a href="../../controller/reviewController.php?action=delete&id=<?php echo htmlspecialchars($review['review_id']); ?>" class="btn btn-delete" onclick="return confirm('Are you sure you want to delete this review?');">Delete</a>
                                <a href="viewReview.php?id=<?php echo $review['review_id']; ?>">View</a>
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
            xhttp.open('GET', '../../controller/reviewController.php?action=search&searchText=' + search, true); // Sends the get info with the search value.

            xhttp.onreadystatechange = function() {
                if (this.readyState === 4) { 
                    let tableBody = document.getElementById('reviews');
                    tableBody.innerHTML = ""; // Clear existing table content

                    if (this.status === 200) { // If the request is successful
                        let response = JSON.parse(this.responseText); // Parse the JSON response

                        if (response.error) {
                            tableBody.innerHTML = `<tr><td colspan="5">${response.error}</td></tr>`;
                        } else if (response.length > 0) {
                            // Dynamically build the table rows based on the response

                            // response{
                            //     review1: {
                            //         review_id: 1,
                            //         station: "Station 1",
                            //         rating: 5,
                            //         review: "Great station!",
                            //         created_at: "2021-05-01 12:00:00"
                            //     },
                            //     review2: {
                            //         review_id: 2,
                            //         station: "Station 2",
                            //         rating: 4,
                            //         review: "Good station!",
                            //         created_at: "2021-05-02 12:00:00"
                            //     },
                            //     review3: {
                            //         review_id: 3,
                            //         station: "Station 3",
                            //         rating: 3,
                            //         review: "Average station!",
                            //         created_at: "2021-05-03 12:00:00"
                            //     }
                            // }
                            
                            response.forEach(reviews => {
                                let row = `<tr>
                                    <td>${reviews.review_id}</td>
                                    <td>${reviews.station}</td>
                                    <td>${reviews.rating}</td>
                                    <td>${reviews.review}</td>
                                    <td>${reviews.created_at}</td>
                                    <td>
                                        <a href="review.php?action=edit&id=${reviews.review_id}" class="btn btn-edit">Edit</a>
                                        <a href="../../controller/reviewController.php?action=delete&id=${reviews.review_id}" class="btn btn-delete" onclick="return confirm('Are you sure you want to delete this review?');">Delete</a>
                                        <a href="viewReview.php?id=${reviews.review_id}">View</a>
                                    </td>`;
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