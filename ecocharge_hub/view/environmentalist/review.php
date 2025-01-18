<?php
session_start();
include_once('../../controller/authGuard.php');
include_once('../../model/reviewDB.php');
include_once('../../model/evStationDB.php');


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Review</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>

<body>
    <div class="container">
        <h1 class="page-title">Add New Review</h1>

        <?php if (isset($error_message)): ?>
            <div class="alert alert-danger">
                <?php echo $error_message; ?>
            </div>
        <?php endif; ?>

        <form action="../../controller/reviewController.php" method="POST">
            
        
            <input type="hidden" name="station_id" value="<?php echo $_GET['id']; ?>">

            <div class="form-group">
                <label for="rating">Rating</label>
                <select name="rating" id="rating" required>
                    <option value="">-- Select Rating --</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>

            <div class="form-group">
                <label for="review">Review</label>
                <textarea name="review" id="review" rows="5" required></textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit Review</button>
            </div>
        </form>

        <div class="button-container">
            <a href="reviewManagement.php" class="btn btn-secondary">Back to Reviews</a>
        </div>
    </div>



    
    <style>
        /* Container and general styles */
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
            color: #333;
            margin-bottom: 20px;
        }

        /* Form styles */
        .form-group {
            margin-bottom: 15px;
        }

        label {
            font-weight: bold;
        }

        select, textarea {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 1rem;
        }

        textarea {
            resize: vertical;
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

        .btn-secondary {
            background-color: #95a5a6;
        }

        .btn-secondary:hover {
            background-color: #7f8c8d;
        }

        .alert {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }

            .btn {
                padding: 8px 16px;
                font-size: 0.9rem;
            }
        }
    </style>
</body>

</html>
