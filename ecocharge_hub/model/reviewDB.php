<?php
include_once 'db_connection.php'; // Include the database connection file

// Create a new review
function createReview($user_id, $station_id, $rating, $review) {
    $user_id = intval($user_id); // Ensure $user_id is an integer
    $station_id = intval($station_id); // Ensure $station_id is an integer
    $rating = intval($rating); // Ensure $rating is an integer
    $review = htmlspecialchars($review, ENT_QUOTES); // Sanitize input

    $query = "INSERT INTO REVIEWS VALUES (NULL, $user_id, $station_id, $rating, '$review', NOW(), NOW())";
    return execute($query); // Use execute() to run the query
}

// Read all reviews for a specific station
function readReviewsByStation($station_id) {
    $station_id = intval($station_id); // Ensure $station_id is an integer
    $query = "SELECT * FROM REVIEWS WHERE station_id = '$station_id' ORDER BY created_at DESC";
    return get($query); // Use get() to fetch data
}

// Read all reviews by a specific user
function readReviewsByUser($user_id) {
    $user_id = intval($user_id); // Ensure $user_id is an integer
    $query = "SELECT * FROM REVIEWS WHERE user_id = '$user_id' ORDER BY created_at DESC";
    return get($query); // Use get() to fetch data
}

// Read a single review
function readReview($review_id) {
    $review_id = intval($review_id); // Ensure $review_id is an integer
    $query = "SELECT * FROM REVIEWS WHERE review_id = '$review_id'";
    return get($query); // Use get() to fetch data
}

// Update a review
function updateReview($review_id, $rating, $review) {
    $review_id = intval($review_id); // Ensure $review_id is an integer
    $rating = intval($rating); // Ensure $rating is an integer
    $review = htmlspecialchars($review, ENT_QUOTES); // Sanitize input

    $query = "UPDATE REVIEWS SET rating = $rating, review = '$review', updated_at = NOW() WHERE review_id = '$review_id'";
    return execute($query); // Use execute() to run the query
}

// Delete a review
function deleteReview($review_id) {
    $review_id = intval($review_id); // Ensure $review_id is an integer

    $query = "DELETE FROM REVIEWS WHERE review_id = '$review_id'";
    return execute($query); // Use execute() to run the query
}


?>
