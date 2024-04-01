<?php
session_start();
error_reporting(0);
include('includes/dbconn.php');
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

<body style="background-color: #D3C5E5; height: 93vh;">

    <div class="col-lg-2"></div>
    <div class="col-lg-8">
        <div class="row">

        </div><!--/.row-->
        <a href="parking-slot.php"><button class="btn btn-primary">Back</button></a>
        <?php
        $cid = $_GET['vid'];
        $ret = mysqli_query($con, "SELECT * from pslot where ID='$cid'");
        $cnt = 1;
        while ($row = mysqli_fetch_array($ret)) {

            ?>

            <div id="exampl" style="margin-top: 30px">
                <table id="dom-jqry" class="table table-striped table-bordered">
                    <tr>
                        <th colspan="6" style="text-align: center; font-size:22px;">Parking Area Overview</th>
                    </tr>

                    <tr>

                        <th>Parking Lot Name</th>
                        <td>
                            <?php echo $row['PLot']; ?>
                        </td>


                        <th>Vehicle Type</th>
                        <td>
                            <?php echo $row['VehicleCat']; ?>
                        </td>

                        <th>Descriptions</th>
                        <td>
                            <?php echo $row['des']; ?>
                        </td>
                    </tr>

                    <tr>

                        <th>Total Parking Lot</th>
                        <td>
                            <?php echo $row['total_lot']; ?>
                        </td>

                        <th>Available Parking Lot</th>
                        <td>
                            <?php echo $row['avail_lot']; ?>
                        </td>




                        <th>Status</th>
                        <td>
                            <?php
                            if ($row['status'] == "1") {
                                echo "Active";
                            }
                            if ($row['status'] == "0") {
                                echo "Not Active";
                            }
                            ;
                            ?>
                        </td>
                    </tr>


                    <tr>
                        <th>Parking Lot Picture</th>
                        <td colspan="6" style="text-align:center;">
                            <?php
                            $pictureName = $row['image'];
                            $picturePath = "img/" . $pictureName; // Assuming images are in the "img" directory
                        
                            // Check if the file exists before displaying the image
                            if (file_exists($picturePath)) {
                                echo "<img src='$picturePath' alt='Parking Lot Picture' height='450' width='650'>";
                            } else {
                                echo "Image not found";
                            }
                            ?>
                        </td>
                    </tr>
                    <!-- <tr>
                        <td colspan="4" style="text-align:center; cursor:pointer"><i class="fa fa-print fa-4x"
                                aria-hidden="true" OnClick="CallPrint(this.value)"></i></td>
                    </tr> -->

                </table>

            <?php } ?>
        </div>

        <script>
            function CallPrint(strid) {
                var prtContent = document.getElementById("exampl");
                var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
                WinPrint.document.write(prtContent.innerHTML);
                WinPrint.document.close();
                WinPrint.focus();
                WinPrint.print();
                WinPrint.close();
            }
        </script>



    </div> <!--/.main-->
    <div class="col-lg-2"></div>

    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/chart.min.js"></script>
    <script src="js/chart-data.js"></script>
    <script src="js/easypiechart.js"></script>
    <script src="js/easypiechart-data.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap4.min.js"></script>
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
    </script>

    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>

</body>

</html>