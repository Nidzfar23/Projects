<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Process Form</title>
</head>

<body>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Handle the submitted data
        $studentIds = isset($_POST['student_id']) ? $_POST['student_id'] : [];

        // Display the submitted student IDs
        echo '<h2>Submitted Student IDs:</h2>';
        echo '<ul>';
        foreach ($studentIds as $studentId) {
            echo '<li>' . $studentId . '</li>';
        }
        echo '</ul>';
    } else {
        echo 'Invalid request';
    }
    ?>

</body>

</html>