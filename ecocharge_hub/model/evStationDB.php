<?php
include_once('db_connection.php'); // Include your database connection file

// Function to get all EV stations
function getAllStations() {
    $query = "SELECT * FROM EV_STATIONS";
    return get($query); // Assuming get() is a function to fetch data from the database
}

// Function to get a specific EV station by its ID
function getStationById($station_id) {
    $station_id = intval($station_id); // Ensure station_id is an integer
    $query = "SELECT * FROM EV_STATIONS WHERE station_id = '$station_id'";
    return get($query); // Assuming get() is a function to fetch data from the database
}
function getStationByName($name) {
    $name = htmlspecialchars($name, ENT_QUOTES);
    $query = "SELECT * FROM EV_STATIONS WHERE name LIKE '%$name%'";
    return get($query); // Assuming get() is a function to fetch data from the database
}
// Function to get the station name by its ID
function getStationName($station_id) {
    $station_id = intval($station_id); // Ensure station_id is an integer
    $query = "SELECT name FROM EV_STATIONS WHERE station_id = '$station_id'";
    $result = get($query); // Assuming get() is a function to fetch data from the database

    if (!empty($result)) {
        return $result[0]['name']; // Return the station name
    } else {
        return 'Unknown Station'; // Default if station is not found
    }
}

// Function to create a new EV station (if needed)
function createStation($name, $address, $facilities, $contact_info, $created_by) {
    $name = htmlspecialchars($name, ENT_QUOTES);
    $address = htmlspecialchars($address, ENT_QUOTES);
    $facilities = htmlspecialchars($facilities, ENT_QUOTES);
    $contact_info = htmlspecialchars($contact_info, ENT_QUOTES);
    $created_by = intval($created_by);

    $query = "INSERT INTO EV_STATIONS (name, address, facilities, contact_info, created_by, created_at) 
              VALUES ('$name', '$address', '$facilities', '$contact_info', '$created_by', NOW())";
    return execute($query); // Assuming execute() is a function to execute the query
}

// Function to update an EV station (if needed)
function updateStation($station_id, $name, $address, $facilities, $contact_info) {
    $station_id = intval($station_id);
    $name = htmlspecialchars($name, ENT_QUOTES);
    $address = htmlspecialchars($address, ENT_QUOTES);
    $facilities = htmlspecialchars($facilities, ENT_QUOTES);
    $contact_info = htmlspecialchars($contact_info, ENT_QUOTES);

    $query = "UPDATE EV_STATIONS SET name = '$name', address = '$address', facilities = '$facilities', 
              contact_info = '$contact_info' WHERE station_id = '$station_id'";
    return execute($query); // Assuming execute() is a function to execute the query
}

// Function to delete an EV station (if needed)
function deleteStation($station_id) {
    $station_id = intval($station_id); // Ensure station_id is an integer
    $query = "DELETE FROM EV_STATIONS WHERE station_id = '$station_id'";
    return execute($query); // Assuming execute() is a function to execute the query
}
?>
