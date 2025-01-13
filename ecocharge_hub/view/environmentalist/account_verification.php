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
    
    <h1>Submit NID Verification Document</h1>
    
    <form action="../../controller/submit_document.php" method="POST" enctype="multipart/form-data">
        <!-- User ID (hidden field or prefilled by the server) -->
        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>"> <!-- Replace with dynamic user ID -->
        
        <!-- File Upload -->
        <label for="file">Choose a Document:</label><br>
        <input type="file" id="file" name="file" accept=".pdf,.doc,.docx,.jpg,.png" required><br><br>
        
        <!-- Submit Button -->
        <button type="submit">Submit Document</button>
    </form>
</body>
</html>
