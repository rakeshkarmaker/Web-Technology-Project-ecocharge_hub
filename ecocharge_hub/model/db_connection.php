<?php

// Default: values in a server application
$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "ecocharge_hub"; // Your project database name, adjust accordingly

// Establish a global database connection
function connection() {
    global $db_server, $db_user, $db_pass, $db_name;

    // Establish a connection to the database
    $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

    // Handle connection errors
    if (mysqli_connect_errno()) {
        return null;
    }
    return $conn;
}

// Function to execute queries that modify data (Insert, Update, Delete)
function execute($query)
{
    $conn = connection();
    
    if ($conn) {
        if (mysqli_query($conn, $query)) {
            mysqli_close($conn);  // Close the connection after query execution
            return true;
        } else {
            mysqli_close($conn);  // Close the connection after query execution
            return mysqli_error($conn);  // Return error message if query fails
        }
    } else {
        return "Database connection failed: " . mysqli_connect_error();
    }
}

// Function to get data (Select query)
function get($query)
{
    $conn = connection();
    $data = array();

    if ($conn) {
        $result = mysqli_query($conn, $query);

        // Fetch all rows from the result set
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row; // Add each row to the data array
        }

        mysqli_free_result($result); // Free result set memory
        mysqli_close($conn);  // Close the connection after the query
    } else {
        return "Database connection failed: " . mysqli_connect_error();
    }

    // Return the array of data
    return $data;
}

?>
