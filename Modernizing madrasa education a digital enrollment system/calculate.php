<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grade Input</title>
    <!-- Include Bootstrap CSS if not already included -->
    <!-- <link rel="stylesheet" href="path/to/bootstrap.css"> -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 400px;
            width: 100%;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-control {
            width: 100%;
            box-sizing: border-box;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            outline: none;
            margin-top: 10px;
        }

        .btn {
            cursor: pointer;
            padding: 10px;
            border-radius: 4px;
            outline: none;
            border: none;
            margin-top: 20px;
        }

        .btn-success {
            background-color: #28a745;
            color: white;
        }

        .btn-primary {
            background-color: #007bff;
            color: white;
        }

        #averageResult {
            margin-top: 15px;
        }
    </style>
    </style>
</head>

<body>

    <div class="container-fluid">
        <div class="card">
            <div class="card-modal col-md-12">
                <form action="" id="manage-student">
                    <div class="form-group col-md-4">
                        <label for="type" class="control-label">Input Grades</label>
                        <!-- <input type="text" id="initialInput" name="grades[]" class="form-control" value=""> -->
                    </div>
                    <div id="data-field" class="row"></div>
                    <button type="button" class="btn btn-success btn-sm my-3" onclick="addInput()">Add Input</button>
                    <button type="button" class="btn btn-primary btn-sm my-3" onclick="calculateAverage()">Calculate
                        Average</button>
                    <p id="averageResult"></p>
                </form>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS if not already included -->
    <!--
<script src="path/to/bootstrap.js"></script>
-->

    <script>
        // Function to add an input text box
        function addInput() {
            var dataField = document.getElementById('data-field');
            var newInput = document.createElement('input');
            newInput.type = 'text';
            newInput.name = 'grades[]'; // Use brackets for array-like handling in form submission
            newInput.className = 'form-control mt-2 mx-3';
            newInput.placeholder = 'Enter grade';
            dataField.appendChild(newInput);
        }

        // Function to calculate the average of input grades
        function calculateAverage() {
            var inputs = document.getElementsByName('grades[]');
            var validInputs = [];

            for (var i = 0; i < inputs.length; i++) {
                var value = parseFloat(inputs[i].value);

                if (!isNaN(value)) {
                    validInputs.push(value);
                }
            }

            if (validInputs.length > 0) {
                var average = validInputs.reduce((sum, value) => sum + value, 0) / validInputs.length;
                document.getElementById('averageResult').innerText = 'Average Grade: ' + average.toFixed(2);
            } else {
                document.getElementById('averageResult').innerText = 'No valid grades to calculate average.';
            }
        }
    </script>

</body>

</html>