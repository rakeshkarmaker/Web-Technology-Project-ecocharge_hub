<?php
include_once '../model/db_connection.php'; // Include your database connection file

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $user_id = intval($_POST['user_id']);
    $file = $_FILES['file'];

    // Validate the file upload
    if ($file['error'] === UPLOAD_ERR_OK) {
        $uploadDir = '../uploads/verification_doc/'; // Directory to store uploaded files
        $fileName = basename($file['name']);
        $filePath = $uploadDir . time() . '_' . $fileName; // Add a timestamp to avoid duplicates

        // Move the file to the upload directory
        if (move_uploaded_file($file['tmp_name'], $filePath)) {
            // Insert into the database
            $query = "INSERT INTO DOCUMENTS (user_id, file_path, status) VALUES ('$user_id', '$filePath', 'Pending')";
            
            if (execute($query)) { 
                echo "Document submitted successfully! Your account will be verified soon.";
                // header("Location: ../index.php");
                echo"<button`>
                    <a href=\"../view/environmentalist/dashboard.php\">Account Verification with Document</a>
                </button>";

            } else {
                echo "Error saving document details to the database.";
            }
        } else {
            echo "Error uploading the file.";
        }
    } else {
        echo "File upload error: " . $file['error'];
    }
} else {
    echo "Invalid request method.";
}
?>
