<?php

include 'db_connect.php';

// if (isset($_GET['id'])) {
//     $qry = $conn->query("
//         SELECT e.*, sl.*
//         FROM enrollment e
//         INNER JOIN student_list sl ON sl.id = e.student_id
//         WHERE e.faculty_id = " . $_GET['id']
//     );

//     // Fetch all rows into an associative array
//     $data = array();
//     while ($row = $qry->fetch_assoc()) {
//         $data[] = $row;
//     }

//     if (!empty($data)) {
//         $adviser_firstname = $data[0]['firstname'];

//         echo "<h4>Adviser: $adviser_firstname</h4>";
//     }
// }
if (isset($_GET['id'])) {
    $facultyId = $_GET['id'];

    // Modify the query to join the faculty table and fetch the adviser's firstname
    $qry = $conn->query("
        SELECT e.*, sl.*, f.firstname as adviser_firstname, f.lastname as adviser_lastname
        FROM enrollment e
        INNER JOIN student_list sl ON sl.id = e.student_id
        INNER JOIN faculty f ON f.id = e.faculty_id
        WHERE e.faculty_id = $facultyId and sl.status = 1
    ");

    // Fetch all rows into an associative array
    $data = array();
    while ($row = $qry->fetch_assoc()) {
        $data[] = $row;
    }

    if (!empty($data)) {
        $adviser_firstname = $data[0]['adviser_firstname'];
        $adviser_lastname = $data[0]['adviser_lastname'];

        echo "<h4>Adviser: $adviser_firstname $adviser_lastname</h4>";
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custom Modal Design</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container-fluid {
            width: 100%;
            padding: 20px;
        }

        .card {
            border: 1px solid #ccc;
            border-radius: 8px;
        }

        .card-body {
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        td center {
            display: flex;
            justify-content: center;
        }

        /* Additional styles can be added based on your preferences */
    </style>
</head>

<body>

    <div class="container-fluid">
        <div class="card col-md-12">
            <div class="card-body">
                <div class="col-md-12">
                    <table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Student Code</th>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Date of Birth</th>
                                <th>Address</th>
                                <!-- Add additional headers if needed -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($data) && !empty($data)) {
                                $i = 1;
                                foreach ($data as $row) {
                                    echo '<tr>';
                                    echo '<td>' . $i++ . '</td>';
                                    echo '<td>' . $row['student_code'] . '</td>';
                                    echo '<td>' . $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['lastname'] . '</td>';
                                    echo '<td>' . $row['gender'] . '</td>';
                                    echo '<td>' . $row['dob'] . '</td>';
                                    echo '<td>' . $row['address'] . '</td>';

                                    echo '</tr>';
                                }
                            } else {
                                echo '<tr><td colspan="7" class="text-center">No Data...</td></tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>

</html>

<!-- Your HTML structure -->

<!-- <div class="container-fluid">
    <div class="card col-md-12">

        <div class="card-body">
            <br>
            <div class="col-md-12">
                <table class="table table-bordered" id="student-tbl">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Student Code</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Gender</th>
                            <th class="text-center">Date of Birth</th>
                            <th class="text-center">Address</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($data) && !empty($data)) {
                            $i = 1;
                            foreach ($data as $row) {
                                echo '<tr>';
                                echo '<td>' . $i++ . '</td>';
                                echo '<td>' . $row['student_code'] . '</td>';
                                echo '<td>' . $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['lastname'] . '</td>';
                                echo '<td>' . $row['gender'] . '</td>';
                                echo '<td>' . $row['dob'] . '</td>';
                                echo '<td>' . $row['address'] . '</td>';
                                echo '</tr>';
                            }
                        } else {
                            echo '<tr><td colspan="7" class="text-center">No Data...</td></tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div> -->

<!-- <div class="container-fluid">
    <div class="card col-md-12">
        <div class="card-body">
            <br>
            <div class="col-md-12">
                <form id="print-form">
                    <table class="table table-bordered" id="student-tbl">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Student Code</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Gender</th>
                                <th class="text-center">Date of Birth</th>
                                <th class="text-center">Address</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($data) && !empty($data)) {
                                $i = 1;
                                foreach ($data as $row) {
                                    echo '<tr>';
                                    echo '<td>' . $i++ . '</td>';
                                    echo '<td>' . $row['student_code'] . '</td>';
                                    echo '<td>' . $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['lastname'] . '</td>';
                                    echo '<td>' . $row['gender'] . '</td>';
                                    echo '<td>' . $row['dob'] . '</td>';
                                    echo '<td>' . $row['address'] . '</td>';
                                    echo '</tr>';
                                }
                            } else {
                                echo '<tr><td colspan="7" class="text-center">No Data...</td></tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </form>
                <button onclick="printTable()">Print Table</button>
            </div>
        </div>
    </div>
</div>
<script>
    function printTable() {
        var printContents = document.getElementById('print-form').outerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }

</script> -->