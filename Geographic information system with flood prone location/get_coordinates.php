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

// Select data from the database
$sql = "SELECT latitude, longitude FROM map where status = '1'";
$result = $conn->query($sql);

$coordinates = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $coordinates[] = array(
            'latitude' => $row['latitude'],
            'longitude' => $row['longitude'],
        );
    }
}

// Return coordinates as JSON
header('Content-Type: application/json');
echo json_encode($coordinates);

$conn->close();
?>