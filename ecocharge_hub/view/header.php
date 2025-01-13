<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoCharge Hub</title>
    <style>
        /* Global Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0fdf4; /* Light greenish background */
            color: #2d572c; /* Dark green text */
        }

        header {
            background-color: #2d572c; /* Dark green */
            color: white;
            padding: 0;
            position: static;
            top: 0; /* Fix header at the top */
            left: 0;
            width: 100%; /* Ensure full width */
            box-sizing: border-box; /* Includes padding in the element's width */
            z-index: 1000; /* Ensure it stays on top */
        }

        /* Top Bar */
        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 2rem;
            width: 100%; /* Ensure full width */
            box-sizing: border-box;
        }

        .top-bar h1 {
            margin: 0;
            font-size: 1.8rem;
        }

        .nav-links {
            list-style: none;
            display: flex;
            gap: 1.5rem;
            margin: 0;
            padding: 0;
        }

        .nav-links li {
            display: inline;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            font-size: 1rem;
        }

        .nav-links a:hover {
            text-decoration: underline;
        }

        /* Subheader */
        .subheader {
            background-color: #1c7430; /* Lighter green for contrast */
            padding: 0.5rem 2rem;
            text-align: center;
            font-size: 1.1rem;
            font-style: italic;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .top-bar {
                flex-direction: column;
                align-items: start;
                gap: 1rem;
            }
            .nav-links {
                gap: 1rem;
            }
        }
    </style>
</head>
<body>
<header>
    <div class="top-bar">
        <h1>EcoCharge Hub</h1>
        <ul class="nav-links">
            <li><a href="../index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="../../controller/logout.php">Logout</a></li>
        </ul>
    </div>
    <div class="subheader">
        Join us in creating a greener future for electric vehicles!
    </div>
</header>

<!-- Content below the header -->
<div class="content">
    <!-- Your content here -->
</div>

</body>
</html>
