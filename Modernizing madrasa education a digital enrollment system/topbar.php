<?php
include 'db_connect.php';
$qry = $conn->query("SELECT * from settings limit 1");
if ($qry->num_rows > 0) {
	foreach ($qry->fetch_array() as $k => $val) {
		$meta[$k] = $val;
	}
}
?>
<nav class="navbar navbar-light fixed-top bg-info">
	<div class="container-fluid mt-2 ">
		<div class="col-lg-12">
			<img src="assets/img/<?php echo isset($meta['img_path']) ? $meta['img_path'] : '' ?>" class="float-left"
				alt="" width="35" height="35">
			<div class="col-md-5 float-left">
				<h4 class="text-white">
					<?php echo isset($meta['name']) ? $meta['name'] : '';
					echo " - Enrollment System"; ?>
				</h4>

			</div>
			<div class="col-md-2 float-right">
				<a href="ajax.php?action=logout" class=" text-white">
					<?php echo $_SESSION['login_name'] ?> <i class="fa fa-power-off"></i>
				</a>
			</div>
		</div>
	</div>

</nav>
<!-- <style>
	.custom-purple-gradient {
		background: linear-gradient(to top, #f6edff, #2575fc);
		/* Adjust the color stops and direction as needed */
		/* You can generate gradient codes using online tools */
		/* Example uses a gradient from purple to blue */
	}
</style>

<nav class=" navbar navbar-light fixed-top custom-purple-gradient">
	<div class="container-fluid mt-2">
		<div class="col-lg-12">
			<img src="assets/img/<?php echo isset($meta['img_path']) ? $meta['img_path'] : '' ?>" class="float-left"
				alt="" width="35" height="35">
			<div class="col-md-5 float-left">
				<h4 class="text-white">
					<?php echo isset($meta['name']) ? $meta['name'] : '';
					echo " - Enrollment System"; ?>
				</h4>
			</div>
			<div class="col-md-2 float-right">
				<a href="ajax.php?action=logout" class="text-dark">
					<?php echo $_SESSION['login_name'] ?> <i class="fa fa-power-off"></i>
				</a>
			</div>
		</div>
	</div>
</nav> -->