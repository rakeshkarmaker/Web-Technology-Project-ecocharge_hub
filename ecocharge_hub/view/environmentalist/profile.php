<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Environmentalist Profile</title>
    <link rel="stylesheet" href="/path/to/your/css/styles.css">
</head>
<body>
    <div class="profile-container">
        <h1>Environmentalist Profile</h1>
        <div class="profile-details">
            <img src="/path/to/profile/image.jpg" alt="Profile Picture" class="profile-picture">
            <h2><?php echo $_SESSION['username']; ?></h2>
            <p><strong>Email:</strong> <?php echo $_SESSION['email']; ?></p>
            <p><strong>Location:</strong> <?php echo $_SESSION['location']; ?></p>
            <p><strong>About:</strong> <?php echo $_SESSION['about']; ?></p>
        </div>
        <div class="profile-actions">
            <a href="/edit-profile.php" class="btn btn-primary">Edit Profile</a>
            <a href="/logout.php" class="btn btn-secondary">Logout</a>
        </div>
    </div>
</body>
</html>