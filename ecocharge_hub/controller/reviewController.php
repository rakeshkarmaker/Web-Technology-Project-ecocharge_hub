<?php
session_start();
include_once('../model/reviewDB.php'); // Include the Review database functions
include_once('../model/evStationDB.php'); // Include the EV Station database functions

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id']; // Get the logged-in user ID
    $station_id = intval($_POST['station_id']); // Get the station ID from the form
    $rating = intval($_POST['rating']); // Get the rating from the form
    $review = htmlspecialchars($_POST['review'], ENT_QUOTES); // Sanitize the review text

    // Insert the review into the database
    $result = createReview($user_id, $station_id, $rating, $review);
    
    if ($result) {
        // Redirect to a success page or show a success message
        header("Location: ../view/environmentalist/reviews_management.php?success");
        exit();
    } else {
        // Redirect to an error page or show an error message
        header("Location: ../view/environmentalist/reviews_management.php?error");
        exit();
    }
}
?>
