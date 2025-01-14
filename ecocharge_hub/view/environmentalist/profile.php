<?php
session_start();
include_once('../../controller/authGuard.php');
include_once '../../model/userDB.php';
$id = intval($_SESSION['user_id']);
$userProfile = viewProfile($id)[0];

// Determine the mode (view or edit) based on the query parameter
$isEditMode = isset($_GET['edit']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Environmentalist Profile</title>
</head>

<body>
    <div class="profile-container">
        <h1><?php echo $isEditMode ? 'Edit Profile' : 'Environmentalist Profile'; ?></h1>

        <?php if ($isEditMode): ?>
            <!-- Edit Profile Section -->
            <div class="edit-profile-container">
                <?php if (isset($errorMessage)) { ?>
                    <p class="error-message"><?php echo $errorMessage; ?></p>
                <?php } ?>
                <form method="POST" action="../../controller/profileController.php">
                    <label for="name"><strong>Name:</strong></label>
                    <input type="text" id="name" name="name" value="<?php echo $userProfile['name']; ?>" required>

                    <label for="username"><strong>Username:</strong></label>
                    <input type="text" id="username" name="username" value="<?php echo $userProfile['username']; ?>" required>

                    <label for="email"><strong>Email:</strong></label>
                    <input type="email" id="email" name="email" value="<?php echo $userProfile['email']; ?>" required>

                    <label for="phone"><strong>Phone Number:</strong></label>
                    <input type="text" id="phone" name="phone" value="<?php echo $userProfile['phone']; ?>" required>

                    <label for="user_type"><strong>User Role:</strong></label>
                    <input type="text" id="user_type" value="<?php echo $userProfile['user_type']; ?>" disabled>

                    <!-- Action Buttons -->
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                        <a href="profile.php" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        <?php else: ?>
            <!-- View Profile Section -->
            <div class="profile-details">
                <h2>Welcome <?php echo $_SESSION['username']; ?></h2>
                <img src="" alt="Profile Picture" class="profile-picture">
                <h2>Name: <?php echo $userProfile['name']; ?></h2>
                <p><strong>Username:</strong> <?php echo $userProfile['username']; ?></p>
                <p><strong>Email:</strong> <?php echo $userProfile['email']; ?></p>
                <p><strong>Phone Number:</strong> <?php echo $userProfile['phone']; ?></p>
                <p><strong>User Role:</strong> <?php echo $userProfile['user_type']; ?></p>
            </div>
            <div class="profile-actions">
                <a href="profile.php?edit" class="btn btn-primary">Edit Profile</a>
                <a href="dashboard.php" class="btn btn-secondary">Go Back</a>
            </div>
        <?php endif; ?>
    </div>
</body>

<!-- CSS at the end -->
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f7fc;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .profile-container {
        background-color: white;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        width: 70%;
        max-width: 800px;
        text-align: center;
    }

    h1 {
        font-size: 26px;
        margin-bottom: 20px;
        color: #333;
    }

    .edit-profile-container, .profile-details {
        margin-bottom: 20px;
    }

    label {
        font-size: 16px;
        font-weight: bold;
        margin-bottom: 5px;
        display: block;
        text-align: left;
    }

    input[type="text"], input[type="email"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 14px;
    }

    .form-actions {
        margin-top: 20px;
    }

    .btn {
        display: inline-block;
        padding: 10px 20px;
        font-size: 16px;
        text-align: center;
        text-decoration: none;
        border-radius: 5px;
        margin: 5px;
        cursor: pointer;
    }

    .btn-primary {
        background-color: #4CAF50;
        color: white;
    }

    .btn-primary:hover {
        background-color: #45a049;
    }

    .btn-secondary {
        background-color: #f44336;
        color: white;
    }

    .btn-secondary:hover {
        background-color: #e53935;
    }

    .profile-actions {
        margin-top: 20px;
    }

    .profile-picture {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        margin-bottom: 20px;
        object-fit: cover;
    }

    .profile-details h2 {
        font-size: 22px;
        color: #333;
    }

    .profile-details p {
        font-size: 16px;
        color: #666;
    }

    .error-message {
        color: red;
        background-color: #fdd;
        padding: 15px;
        border: 1px solid red;
        border-radius: 5px;
        margin-top: 20px;
    }
</style>
</html>
