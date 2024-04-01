<?php
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

// Get data from POST request
$name = $_POST['name'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
$stat = "0";

// Insert data into the database
// $sql = "INSERT INTO map (latitude, longitude) VALUES ('$latitude', '$longitude')";
$sql = "INSERT INTO map (locName, latitude, longitude, status) VALUES ('$name', '$latitude', '$longitude', '$stat')";

if ($conn->query($sql) === TRUE) {
    echo "Coordinates inserted successfully";
} else {
    echo "Error inserting coordinates: " . $conn->error;
}

$conn->close();
?>