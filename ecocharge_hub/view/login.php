<?php
// Start session to show error messages if any
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .form-container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 70%;
            max-width: 700px;
            margin: 40px auto;
        }

        fieldset {
            border: none;
            padding: 20px;
        }

        legend {
            font-size: 1.5rem;
            font-weight: bold;
            color: #2d572c;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            color: #2d572c;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #2d572c;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
        }

        input[type="submit"]:hover {
            background-color: #3c7c44;
        }

        a {
            color: #2d572c;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        p {
            text-align: center;
            margin-top: 15px;
        }

        .error-message {
            color: red;
            text-align: center;
            margin-bottom: 15px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .form-container {
                width: 90%;
            }
        }
    </style>
</head>
<body>

    <div class="form-container">
        <form action="../controller/logincheck.php" method="POST">
            <fieldset>
                <legend>LOGIN</legend>

                <!-- Show error message if exists -->
                <?php
                if (isset($_SESSION['error'])) {
                    echo '<p class="error-message">' . $_SESSION['error'] . '</p>';
                    unset($_SESSION['error']);  // Clear the error message after displaying
                }
                ?>

                <!-- User Name -->
                <label for="name">User Name</label><br>
                <input type="text" name="name" required><br>

                <!-- Password -->
                <label for="pwd">Password</label><br>
                <input type="password" name="pwd" required><br>

                <!-- Submit Button -->
                <input type="submit" value="Login">
            </fieldset>
        </form>

        <!-- Sign Up Link with <p> tag -->
        <p>Don't have an account? <a href="registration.php">Register here</a></p>
    </div>

</body>
</html>
