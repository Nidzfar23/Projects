<?php
// Include your database connection file here
//include('db_connection.php'); // Replace with the actual file name
include 'connect.php';

// Check if the 'id' parameter is set in the URL
if (isset($_GET['id'])) {
    // Sanitize the 'id' parameter to prevent SQL injection
    $id = mysqli_real_escape_string($con, $_GET['id']);

    // Construct the SQL query to delete the record
    $query = "DELETE FROM clients WHERE id = $id";

    // Execute the query
    $result = mysqli_query($con, $query);

    // Check if the deletion was successful
    if ($result) {
        echo "Record with ID $id has been deleted successfully.";
        header("location:patients1.php");
    } else {
        echo "Error deleting record: " . mysqli_error($con);
    }
} else {
    echo "Invalid request. Please provide an 'id' parameter.";
}

// Close the database connection
mysqli_close($con);
?>