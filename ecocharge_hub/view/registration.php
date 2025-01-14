<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
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

        input[type="text"], input[type="password"], input[type="email"], input[type="tel"], input[type="radio"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        input[type="radio"] {
            width: auto;
            margin-right: 5px;
            margin-left: 10px;
        }

        input[type="submit"] {
            background-color: #2d572c;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
            width: auto;
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

        .error {
            color: red;
            font-size: 0.9rem;
            margin-top: -10px;
            margin-bottom: 10px;
        }

        @media (max-width: 768px) {
            .form-container {
                width: 90%;
            }
        }
    </style>
</head>
<body>

    <!-- Registration Form -->
    <div class="form-container">
    <form method="post" action="../controller/regcheck.php">

            <fieldset>
                <legend>REGISTRATION</legend>

                <!-- Display error or success message -->
                <?php
                if (isset($_SESSION['error'])) {
                    echo "<p style='color: red;'>" . $_SESSION['error'] . "</p>";
                    unset($_SESSION['error']);
                }

                if (isset($_SESSION['success'])) {
                    echo "<p style='color: green;'>" . $_SESSION['success'] . "</p>";
                    unset($_SESSION['success']);
                }
                ?>
                
                <!-- User Type Selection -->
                <label for="userType">User Type</label><br>
                <input type="radio" name="userType" value="User" required> User
                <input type="radio" name="userType" value="Environmentalist" required> Environmentalist
                <input type="radio" name="userType" value="Supervisor" required> Supervisor
                <br><br>

                <!-- Full Name -->
                <label for="fullName">Full Name</label>
                <input type="text" name="fullName" maxlength="100" placeholder="Enter your full name" required>
                <br>

                <!-- Email -->
                <label for="email">Email</label>
                <input type="email" name="email" placeholder="Enter a valid email address" required>
                <br>

                <!-- Phone Number -->
                <label for="phone">Phone Number</label>
                <input type="tel" name="phone" pattern="[0-9]{10,15}" title="Enter a valid phone number (10-15 digits)" required>
                <br>

                <!-- Username -->
                <label for="name">Username</label>
                <input type="text" name="name" maxlength="50" placeholder="Choose a unique username" required>
                <br>

                <!-- Password -->
                <label for="pwd">Password</label>
                <input type="password" name="pwd" placeholder="Must include 8+ characters, uppercase, lowercase, number" 
                       pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
                       title="Password must be at least 8 characters, including uppercase, lowercase, and a number" required>
                <br>

                <!-- Confirm Password -->
                <label for="pwd2">Confirm Password</label>
                <input type="password" name="pwd2" placeholder="Re-enter your password" required>
                <br>

                <!-- Submit Button -->
                <input type="submit" value="Sign Up">
                
                <!-- Sign In Link -->
                <p>Already have an account? <a href="login.php">Sign In</a></p>
            </fieldset>
        </form>
    </div>
</body>
</html>
