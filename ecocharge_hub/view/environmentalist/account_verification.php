<?php
session_start();
include_once('../../controller/authGuard.php');
include_once '../../model/blogDB.php';

$user_id = $_SESSION['user_id'] ?? null; // Default: null if user_id is not set
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Submission</title>
</head>
<body>

    <div class="base">
        <h1>Submit NID Verification Document</h1>
        
        <form action="../../controller/submit_document.php" method="POST" enctype="multipart/form-data">
            <!-- User ID (hidden field or prefilled by the server) -->
            <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>"> <!-- Replace with dynamic user ID -->
            
            <!-- File Upload -->
            <label for="file">Choose a Document (PDF, DOC, DOCX, JPG, PNG):</label>
            <input type="file" id="file" name="file" accept=".pdf,.doc,.docx,.jpg,.png" required><br><br>
            
            <!-- Submit Button -->
            <button type="submit">Submit Document</button>
        </form>
    </div>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .base {
            width: 50%;
            margin: 20px auto;
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 24px;
            text-align: center;
            margin-bottom: 20px;
            color: #2d572c;
        }
        label {
            font-size: 16px;
            margin-bottom: 10px;
            display: block;
        }
        input[type="file"] {
            font-size: 16px;
            padding: 8px;
            margin-bottom: 20px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-align: center;
            
        }
        button:hover {
            background-color: #45a049;
        }
    </style>

</body>
</html>
