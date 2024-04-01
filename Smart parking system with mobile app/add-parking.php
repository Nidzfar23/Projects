<?php
session_start();
error_reporting(0);
include('includes/dbconn.php');

if (strlen($_SESSION['vpmsaid'] == 0)) {
    header('location:logout.php');
} else {

    // if (isset($_POST['submit-category'])) {
    //     $plname = $_POST['plot'];
    //     $targetFileName = $_FILES['parkingImage']['name'];
    //     $stt = 1;

    //     $query = mysqli_query($con, "INSERT into pslot (PLot,status, image) value('$plname','$stt','$targetFileName')");
    //     if ($query) {
    //         $msg = "Parking Lot has been added";
    //     } else {
    //         $msg = "Something Went Wrong";
    //     }


    // }
    // error_reporting(E_ALL);
    // ini_set('display_errors', 1);

    if (isset($_POST['submit-category'])) {
        $plname = $_POST['plot'];
        $catename = $_POST['catename'];
        $parea = $_POST['parea'];
        $stt = 1;

        // Check if a file was uploaded
        if ($_FILES['parkingImage']['error'] == UPLOAD_ERR_OK) {
            // Process uploaded image
            $targetDirectory = "../vehicle-parking/user/img/"; // Change this to your desired upload directory
            $targetFileName = $_FILES["parkingImage"]["name"];
            $targetFilePath = $targetDirectory . $targetFileName;

            // Move the uploaded file to the specified directory
            if (move_uploaded_file($_FILES["parkingImage"]["tmp_name"], $targetFilePath)) {
                // Insert data into the database
                $query = mysqli_query($con, "INSERT INTO pslot (PLot, avail_lot, total_lot, VehicleCat, status, image) VALUES ('$plname', '$parea', '$parea', '$catename', '$stt', '$targetFileName')");

                if ($query) {
                    $msg = "Parking Lot has been added";
                } else {
                    $msg = "Error inserting data into the database: " . mysqli_error($con);
                }
            } else {
                $msg = "Error moving the uploaded file to the target directory.";
            }
        } else {
            // Handle other form fields (e.g., parking lot name) without image
            $query = mysqli_query($con, "INSERT INTO pslot (PLot, status) VALUES ('$plname', '$stt')");

            if ($query) {
                $msg = "Parking Lot has been added (without image)";
            } else {
                $msg = "Error: " . mysqli_error($con);
            }
        }
    }


    ?>

    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>VPS</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/datatable.css" rel="stylesheet">
        <link href="css/datepicker3.css" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet">

        <!--Custom Font-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i"
            rel="stylesheet">

    </head>

    <body>
        <?php include 'includes/navigation.php' ?>

        <?php
        $page = "add-parking";
        include 'includes/sidebar.php'
            ?>

        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main"
            style="background-color: #D3C5E5; height: 93vh;">
            <div class="row">
                <ol class="breadcrumb">
                    <li><a href="dashboard.php">
                            <em class="fa fa-home"></em>
                        </a></li>
                    <li class="active">Parking Area Management</li>
                </ol>
            </div><!--/.row-->

            <div class="row">
                <div class="col-lg-12">
                    <!-- <h1 class="page-header">Vehicle Management</h1> -->
                </div>
            </div><!--/.row-->

            <div class="row" style="margin-top: 30px">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Add New Parking Area</div>
                        <div class="panel-body">

                            <?php if ($msg)
                                echo "<div class='alert bg-info ' role='alert'>
						<em class='fa fa-lg fa-warning'>&nbsp;</em> 
						$msg
						<a href='#' class='pull-right'>
						<em class='fa fa-lg fa-close'>
						</em></a></div>" ?>

                                <div class="col-md-12">

                                    <form method="POST" enctype="multipart/form-data">

                                        <div class="form-group">
                                            <label>Parking Area Name</label>
                                            <input type="text" class="form-control" placeholder="Enter Here.." id="plot"
                                                name="plot" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Vehicle Category</label>
                                            <select class="form-control" name="catename" id="catename">
                                                <option value="0">Select Category</option>
                                            <?php $query = mysqli_query($con, "select * from vcategory");
                            while ($row = mysqli_fetch_array($query)) {
                                ?>
                                                <option value="<?php echo $row['VehicleCat']; ?>">
                                                    <?php echo $row['VehicleCat']; ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Total Parking Lot</label>
                                        <input type="text" class="form-control" placeholder="Enter Here.." id="parea"
                                            name="parea" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="parkingImage">Parking Area Image</label>
                                        <input type="file" class="form-control-file" id="parkingImage" name="parkingImage"
                                            accept="image/*">
                                    </div>

                                    <div class="form-group" id="selectedImageContainer">
                                        <!-- This div will display the selected image -->
                                    </div>

                                    <button type="submit" class="btn btn-success" name="submit-category">Submit</button>
                                    <button type="reset" class="btn btn-default">Reset</button>
                                </form>
                            </div> <!--  col-md-12 ends -->


                        </div>
                    </div>
                </div>



            </div><!--/.row-->




            <?php include 'includes/footer.php' ?>
        </div> <!--/.main-->

        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/chart.min.js"></script>
        <script src="js/chart-data.js"></script>
        <script src="js/easypiechart.js"></script>
        <script src="js/easypiechart-data.js"></script>
        <script src="js/bootstrap-datepicker.js"></script>
        <script src="js/custom.js"></script>
        <script>
            window.onload = function () {
                var chart1 = document.getElementById("line-chart").getContext("2d");
                window.myLine = new Chart(chart1).Line(lineChartData, {
                    responsive: true,
                    scaleLineColor: "rgba(0,0,0,.2)",
                    scaleGridLineColor: "rgba(0,0,0,.05)",
                    scaleFontColor: "#c5c7cc"
                });
            };

            document.getElementById('parkingImage').addEventListener('change', function (event) {
                const selectedImageContainer = document.getElementById('selectedImageContainer');
                const fileInput = event.target;

                // Clear previous content
                selectedImageContainer.innerHTML = '';

                // Display the selected image
                if (fileInput.files.length > 0) {
                    const selectedImage = document.createElement('img');
                    selectedImage.src = URL.createObjectURL(fileInput.files[0]);
                    selectedImage.alt = 'Selected Parking Lot Image';
                    selectedImage.style.maxWidth = '80%';
                    selectedImageContainer.appendChild(selectedImage);
                }
            });
        </script>

        <script>
            $(document).ready(function () {
                $('#example').DataTable();
            });
        </script>

    </body>

    </html>

<?php } ?>