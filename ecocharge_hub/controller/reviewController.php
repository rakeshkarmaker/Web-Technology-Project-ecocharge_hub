<?php
session_start();
include_once('../model/reviewDB.php'); // Include the Review database functions
include_once('../model/evStationDB.php'); // Include the EV Station database functions


function handleReviewCreation(){

    $user_id = $_SESSION['user_id']; // Get the logged-in user ID
    $station_id = intval($_POST['station_id']); // Get the station ID from the form
    $rating = intval(value: $_POST['rating']); // Get the rating from the form
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

function handleReviewEditing(){

    $review_id = $_POST['id']; // Get review ID
    $rating = intval(value: $_POST['rating']); // Get the rating from the form
    $review = htmlspecialchars($_POST['review'], ENT_QUOTES); // Sanitize the review text

    // Insert the review into the database
    $result = updateReview($review_id, $rating, $review);
    
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

function handleReviewDeletion(){
    $review_id = trim($_GET["id"]) ?? null;

    if (empty($review_id)) {
        echo "Error. Review Not found.";
        return;
    }
    if (deleteBlog($review_id)) {
        header("Location: ../view/environmentalist/review_management.php");
        exit();
    } else {
        echo "Failed to delete the blog.";
    }

}

function handleReviewSearch(){
    $searchText = trim($_GET['searchText']);
    $reviews = readReviewByName($searchText);

    if (!$reviews) {
        echo json_encode(["error" => "No reviews found"]);
        return;
    } else {
        echo json_encode($reviews); // Return JSON response
        return;
    }

}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST["add"])) {
        handleReviewCreation();
    } elseif (isset($_POST["edit"])) {
        handleReviewEditing();
    } else {
        echo "Invalid action.";
    }


} elseif($_SERVER["REQUEST_METHOD"] === "GET"){

    // Handling the AJAX Delete request
    if (isset($_GET['action']) && $_GET['action'] === 'delete') {
        handleReviewDeletion();
    }
    // Handling the AJAX Search request
    elseif (isset($_GET['action']) && $_GET['action'] === 'search') {
        handleReviewSearch();
    }

}else {
    echo "ERROR! Bad Request.";
}
?>
