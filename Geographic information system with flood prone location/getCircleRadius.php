<?php
// Assuming you have a MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gis";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get latitude and longitude from the query parameters
$latitude = isset($_GET['latitude']) ? floatval($_GET['latitude']) : null;
$longitude = isset($_GET['longitude']) ? floatval($_GET['longitude']) : null;

// Validate input
if ($latitude === null || $longitude === null || !is_numeric($latitude) || !is_numeric($longitude)) {
    // Handle invalid input
    echo json_encode(['error' => 'Invalid latitude or longitude. Please enter numeric values.']);
    exit;
}

// Define a function to calculate the radius based on your business logic
function calculateRadius($latitude, $longitude)
{
    // Replace this with your own logic for determining the radius
    // For demonstration purposes, using a fixed value of 200 meters
    return 200;
}

// Calculate the radius
$circleRadius = calculateRadius($latitude, $longitude);

// Return the radius as JSON
echo json_encode(['radius' => $circleRadius]);

// Close the database connection
$conn->close();
?>