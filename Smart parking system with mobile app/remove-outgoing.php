<?php


session_start();
error_reporting(0);


if (isset($_GET['editid'])) {
    $id = $_GET['editid'];

    include('includes/dbconn.php');


    $qry = "DELETE from vehicle_info where id=$id";
    $result = mysqli_query($con, $qry);

    if ($result) {
        echo "DELETED";
        header('Location:out-vehicles.php');
    } else {
        echo "ERROR!!";
    }
}
?>