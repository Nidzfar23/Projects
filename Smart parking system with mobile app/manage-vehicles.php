<?php
session_start();
error_reporting(0);
include('includes/dbconn.php');
if (strlen($_SESSION['vpmsaid'] == 0)) {
	header('location:logout.php');
} else {

	// if (isset($_POST['submit-vehicle'])) {
	// 	$plotId = $_POST['plotId'];
	// 	$parkingnumber = $_POST['plnumber'];
	// 	$catename = $_POST['catename'];
	// 	$vehcomp = $_POST['vehcomp'];
	// 	$vehreno = $_POST['vehreno'];
	// 	$ownername = $_POST['ownername'];
	// 	$ownercontno = $_POST['ownercontno'];
	// 	$enteringtime = $_POST['enteringtime'];
	// 	$pic = $_POST['imgg'];

	// 	// mysqli_query($con, "UPDATE `pslot` SET `status`='0' WHERE  id = $parkingnumber");

	// 	$query = mysqli_query($con, "INSERT into vehicle_info(ParkingNumber,VehicleCategory,VehicleCompanyname,RegistrationNumber,OwnerName,OwnerContactNumber,picture) value('$parkingnumber','$catename','$vehcomp','$vehreno','$ownername','$ownercontno','$pic')");
	// 	if ($query) {
	// 		$up = mysqli_query($con, "UPDATE `pslot` SET `status`='0' WHERE id = '$plotId'");
	// 		if ($up) {
	// 			$msg = "Vehicle Entry is successful!";
	// 			// echo "<script>window.location.href ='in-vehicles.php'</script>";
	// 		}
	// 	} else {
	// 		$msg = "Something Went Wrong";
	// 	}
	// }

	if (isset($_POST['submit-vehicle'])) {
		$plotId = $_POST['plotId'];
		$parkingnumber = $_POST['plnumber'];
		$catename = $_POST['catename'];
		$vehcomp = $_POST['vehcomp'];
		$vehreno = $_POST['vehreno'];
		$ownername = $_POST['ownername'];
		$ownercontno = $_POST['ownercontno'];
		$enteringtime = $_POST['enteringtime'];
		$pic = $_POST['imgg'];

		// Check if the plot is available before inserting the vehicle
		$selectQuery = mysqli_query($con, "SELECT `avail_lot` FROM `pslot` WHERE PLot = '$parkingnumber' AND VehicleCat = '$catename'");
		$row = mysqli_fetch_assoc($selectQuery);
		$availLot = $row['avail_lot'];

		// Check if there are available lots before updating
		if ($availLot > 0) {
			// Insert vehicle information into the 'vehicle_info' table
			$query = mysqli_query($con, "INSERT INTO vehicle_info (ParkingNumber, VehicleCategory, VehicleCompanyname, RegistrationNumber, OwnerName, OwnerContactNumber, picture) VALUES ('$parkingnumber', '$catename', '$vehcomp', '$vehreno', '$ownername', '$ownercontno', '$pic')");

			if ($query) {
				// Decrement the avail_lot value by 1
				$newAvailLot = $availLot - 1;

				// Update the pslot table with the new avail_lot value
				$updateQuery = mysqli_query($con, "UPDATE `pslot` SET `avail_lot`='$newAvailLot' WHERE PLot = '$parkingnumber' AND VehicleCat = '$catename'");

				if ($updateQuery) {
					$msg = "Vehicle Entry is successful!";
					// echo "<script>window.location.href ='in-vehicles.php'</script>";
				} else {
					$msg = "Error updating the database: " . mysqli_error($con);
				}
			} else {
				$msg = "Error inserting vehicle information: " . mysqli_error($con);
			}
		} else {
			$msg = "No available lots left for plot with ID: $plotId";
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
		<link href="css/datepicker3.css" rel="stylesheet">
		<link href="css/styles.css" rel="stylesheet">

		<!--Custom Font-->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i"
			rel="stylesheet">

	</head>

	<body>
		<?php include 'includes/navigation.php' ?>

		<?php
		$page = "manage-vehicles";
		include 'includes/sidebar.php'
			?>

		<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main"
			style="background-color: #D3C5E5; height: 93vh;">
			<div class="row">
				<ol class="breadcrumb">
					<li><a href="dashboard.php">
							<em class="fa fa-home"></em>
						</a></li>
					<li class="active">Manage Vehicle Entry</li>
				</ol>
			</div><!--/.row-->

			<div class="row">
				<div class="col-lg-12">
					<!-- <h1 class="page-header">Vehicle Management</h1> -->
				</div>
			</div><!--/.row-->

			<div class="panel panel-default" style="margin-top: 30px">
				<div class="panel-heading">Vehicle Entry</div>
				<div class="panel-body">

					<?php if ($msg)
						echo "<div class='alert bg-info ' role='alert'>
						<em class='fa fa-lg fa-warning'>&nbsp;</em> 
						$msg
						<a href='#' class='pull-right'>
						<em class='fa fa-lg fa-close'>
						</em></a></div>" ?>

						<div class="col-md-12">

							<form method="POST">

								<div class="form-group">
									<label>Registration Number</label>
									<input type="text" class="form-control" placeholder="LOL-1869" id="vehreno" name="vehreno"
										required>
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
								<label>Parking Slot</label>
								<select class="form-control" name="plnumber" id="plnumber">
									<option value="0">Select Category</option>
									<?php
									$plotIds = []; // Initialize an array to store plot IDs
								
									$query = mysqli_query($con, "SELECT * FROM pslot WHERE status = 1 GROUP BY PLot");

									while ($row = mysqli_fetch_array($query)) {
										$plotimg = $row['image'];
										$plotId = $row['id'];
										$plotName = $row['PLot'];
										$plotIds[] = $plotId; // Store the plot ID in the array
										?>
										<option value="<?php echo $plotName; ?>" data-img="<?php echo $plotimg; ?>"
											data-id="<?php echo $plotId; ?>">
											<?php echo $plotName; ?>
										</option>
									<?php } ?>
								</select>
								<input type="hidden" name="plotId" id="plotId" value="">
							</div>

							<div class="form-group">

								<input type="hidden" class="form-control" placeholder="Picture Name" id="imgg" name="imgg"
									value="" required readonly>
							</div>


							<div class=" form-group">
								<label>Vehicle's Company Name</label>
								<input type="text" class="form-control" placeholder="Tesla" id="vehcomp" name="vehcomp"
									required>
							</div>


							<div class="form-group">
								<label>Owner's Full Name</label>
								<input type="text" class="form-control" placeholder="Enter Here.." id="ownername"
									name="ownername" required>
							</div>


							<div class="form-group">
								<label>Owner's Contact</label>
								<input type="text" class="form-control" placeholder="Enter Here.." maxlength="10"
									pattern="[0-9]+" id="ownercontno" name="ownercontno" required>
							</div>


							<button type="submit" class="btn btn-success" name="submit-vehicle">Submit</button>
							<button type="reset" class="btn btn-default">Reset</button>
					</div> <!--  col-md-12 ends -->
					</form>
				</div>
			</div>




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

			$(document).ready(function () {
				// On change of the select box
				$('#plnumber').change(function () {
					// Get the selected option's data-img attribute
					var selectedImg = $('option:selected', this).attr('data-img');

					// Set the input field's value to the selected image
					$('#imgg').val(selectedImg);
				});
			});

			$(document).ready(function () {
				// On change of the select box
				$('#plnumber').change(function () {
					// Get the selected option's data-img attribute
					var selectedid = $('option:selected', this).attr('data-id');

					// Set the input field's value to the selected image
					$('#plotId').val(selectedid);
				});
			});
		</script>

	</body>

	</html>

<?php } ?>