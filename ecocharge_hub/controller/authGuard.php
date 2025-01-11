<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    // checking if the user is logged in or not. If not the redirect to log in!
    if(!isset($_SESSION["user_id"]) || !isset($_SESSION["username"]) || !isset($_SESSION["user_type"]) || !isset($_SESSION["last_activity"]) ){
        header("Location: ../../index.php?message=invalid_credentials");
        exit();

    }
  // Session timeout logic (optional)
if (time() - $_SESSION["last_activity"] > 1800) { // 30 minutes
    session_unset();
    session_destroy();
    header("Location: ../../index.php?message=session_expired");
    exit();
}


// Role-based directory restriction
$currentDir = basename(dirname($_SERVER['PHP_SELF'])); // Get current directory name
$userRole = $_SESSION["user_type"]; // Current user's role

// Map directory names to roles
if ( ($currentDir === 'environmentalist' && $userRole !== 'Environmentalist') ||($currentDir === 'supervisor' && $userRole !== 'Supervisor') ) {
    echo "ERROR! You don't have permission.";
    header("Location: ../../index.php?message=invalid_access");
    exit();
}
//Resetinng the time of last activity. When a user logges in   and all the checks are done. he will be directed to the respective page after updating recent activity.
$_SESSION["last_activity"] = time();

?>