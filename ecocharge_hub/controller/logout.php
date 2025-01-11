<?php

    session_start();
    unset($_SESSION['']);
    session_destroy();
    setcookie('status', 'true', time()-10, '/');
    header('location: ../index.php');

?>    


<!-- session_start();
// checking if the user is logged in or not. If not the redirect to log in!
if(!isset($_SESSION["loggeduser"])){
    header("Location: index.php");
} -->