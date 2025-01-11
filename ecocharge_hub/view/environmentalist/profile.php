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
                <a href="../../controller/logout.php" class="btn btn-secondary">Logout</a>
            </div>
        <?php endif; ?>
    </div>
</body>

</html>