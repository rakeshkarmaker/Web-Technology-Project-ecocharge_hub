<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Footer</title>
    <style>
        /* Reset default margin and padding */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
        }

        footer {
            background-color: #2d572c;
            color: white;
            text-align: center;
            padding: 1rem;
            position: static;
            bottom: 0;
            width: 100%;
        }

        footer p {
            margin: 0;
            font-size: calc(0.8rem + 0.4vw);
        }

        footer a {
            color: white;
            text-decoration: none;
            margin: 0 10px;
            font-weight: bold;
            font-size: calc(0.8rem + 0.4vw);
            transition: color 0.3s ease;
        }

        footer a:hover {
            color: #90ee90;
        }
    </style>
</head>
<body>
    <footer>
        <p>&copy; <?php echo date("Y"); ?> EcoCharge Hub. All rights reserved.</p>
        <div>
            <a href="about.php">About Us</a> | <a href="contact.php">Contact Us</a>
        </div>
    </footer>
</body>
</html>
