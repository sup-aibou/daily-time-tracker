<?php
// Include the functions file to access PHP logic
include('functions/add-new-record.php');
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>AUTOMATED CPS</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">

	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

</head>

<body>
	<?php include 'includes/navigation.php' ?>

	<?php
	$page = "manage-vehicles";
	include 'includes/sidebar.php'
	?>

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
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

		<div class="panel panel-default">
			<div class="panel-heading">Manual Vehicle Entry(No RFID Card)</div>
			<div class="panel-body">
				<div class="col-md-12">

					<form method="POST">

						<div class="form-group">
							<label>Licensed Plate</label>
							<input type="text" class="form-control" placeholder="LOL-1869" id="vehreno" name="vehreno" required>
						</div>


						<div class="form-group">
							<label>Vehicle's Manufacturer</label>
							<select class="form-control" name="vehcomp" id="vehcomp">
								<option value="0">Select Category</option>
								<option>HONDA</option>
								<option>TOYOTA</option>
								<option>MITSUBISHI</option>
								<option>NISSAN</option>
								<option>FORD</option>
								<option>SUZUKI</option>
								<option>CHEVROLET</option>
								<option>HYUNDAI</option>
								<option>KIA</option>
								<option>ISUZU</option>
								<option>SUBARU</option>
								<option>MAZDA</option>
								<option>BMW</option>
								<option>MERCEDES-BENZ</option>
								<option>VOLKSWAGEN</option>
								<option>LEXUS</option>
								<option>LAND ROVER</option>
								<option>JEEP</option>
								<option>FERRARI</option>
								<option>LAMBORGHINI</option>
								<option>ROLLS-ROYCE</option>
								<option>BENTLEY</option>
								<option>ASTON MARTIN</option>
								<option>PORSCHE</option>
								<option>JAGUAR</option>
								<option>SUZUKI</option>
								<option>KAWASAKI</option>
								<option>KTM</option>
								<option>RUSI</option>
								<option>MOTORSTAR</option>
								<option>KYMCO</option>
								<option>TVS</option>
								<option>ROYAL ENFIELD</option>
								<option>DUCATI</option>
								<option>TRIUMPH</option>
								<option>HARLEY-DAVIDSON</option>
								<option>BENELLI</option>
								<option>SYM</option>

							</select>
						</div>



						<div class="form-group">
							<label>Vehicle Category</label>
							<select class="form-control" name="catename" id="catename">
								<option value="0">Select Category</option>
								<?php $query = mysqli_query($con, "select * from vcategory");
								while ($row = mysqli_fetch_array($query)) {
								?>
									<option value="<?php echo $row['VehicleCat']; ?>"><?php echo $row['VehicleCat']; ?></option>
								<?php } ?>
							</select>
						</div>


						<div class="form-group">
							<label>Vehicle's Model</label>
							<input type="text" class="form-control" placeholder="Montero" id="VehicleModel" name="VehicleModel" required>
						</div>

						<div class="form-group">
							<label>Vehicle's Color</label>
							<input type="text" class="form-control" placeholder="Color" id="VehicleColor" name="VehicleColor" required>
						</div>



						<div class="form-group">
							<label>Owner's Full Name</label>
							<input type="text" class="form-control" placeholder="Enter Here.." id="ownername" name="ownername" required>
						</div>


						<div class="form-group">
							<label>Driver's License #</label>
							<input type="text" class="form-control" placeholder="Enter Here.." id="DriversLicensed" name="DriversLicensed" required>
						</div>


						<div class="form-group">
							<label>Owner's Contact</label>
							<input type="text" class="form-control" placeholder="Enter Here.." maxlength="11" id="ownercontno" name="ownercontno" required>
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
		window.onload = function() {
			var chart1 = document.getElementById("line-chart").getContext("2d");
			window.myLine = new Chart(chart1).Line(lineChartData, {
				responsive: true,
				scaleLineColor: "rgba(0,0,0,.2)",
				scaleGridLineColor: "rgba(0,0,0,.05)",
				scaleFontColor: "#c5c7cc"
			});
		};
	</script>

</body>

</html>