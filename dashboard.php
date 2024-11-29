<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
error_reporting(0);
if (strlen($_SESSION['user_id'] == 0)) {
	header('location:logout.php');
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>AUTOMATED CPS </title>
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
	$page = "dashboard";
	include 'includes/sidebar.php'
	?>

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
						<em class="fa fa-home"></em>
					</a></li>
				<li class="active">Dashboard</li>
			</ol>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><?php include 'includes/greetings.php' ?></h1>
			</div>
		</div>

		<div class="panel panel-container">
			<div class="row">

				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-orange panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-car color-teal"></em>
							<div class="large"><?php include 'counters/count-parking.php' ?></div>
							<div class="text-muted">Parking Slot Available</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-blue panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-toggle-on color-orange"></em>
							<div class="large"><?php include 'counters/invehicles-count.php' ?></div>
							<div class="text-muted">Vehicles IN</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-orange panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-toggle-off color-teal"></em>
							<div class="large"><?php include 'counters/outvehicles-count.php' ?></div>
							<div class="text-muted">Vehicles OUT</div>
						</div>
					</div>
				</div>

				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-red panel-widget ">
						<div class="row no-padding"><em class="fa fa-xl fa-clock-o color-red"></em>
							<div class="large"><?php include 'counters/current-parkingCount.php' ?></div>
							<div class="text-muted">Parking Done within 24 hrs</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading">Parked Vehicles</div>
						<div class="panel-body">
							<table id="example" class="table table-striped table-hover table-bordered" style="width:100%">

								<thead>
									<tr>
										<th>#</th>
										<th>Date</th>
										<th>Licensed Plate</th>
										<th>Manufacturer</th>
										<th>Category</th>
										<th>RFID Number</th>
										<th>Vehicle's Owner</th>
										<th></th>

									</tr>
								</thead>
								<tbody>
									<?php
									$ret = mysqli_query($con, "SELECT * FROM vehicle_info WHERE Status='' ORDER BY InTime DESC");
									$cnt = 1;
									while ($row = mysqli_fetch_array($ret)) {

									?>

										<tr>

											<td><?php echo $cnt; ?></td>
											<td><?php echo $row['InTime']; ?></td>

											<td><?php echo $row['RegistrationNumber']; ?></td>

											<td><?php echo $row['VehicleCompanyname']; ?></td>

											<td><?php echo $row['VehicleCategory']; ?></td>

											<td><?php echo $row['RFIDNumber']; ?></td>

											<td><?php echo $row['OwnerName']; ?></td>

											<td><a href="update-incomingdetail.php?updateid=<?php echo $row['ID']; ?>"><button type="button" class="btn btn-sm btn-danger">Take Action</button></a>
											</td>

										</tr>

									<?php $cnt = $cnt + 1;
									} ?>


								</tbody>

							</table>
						</div>
					</div>
				</div>
			</div>

		<?php include 'includes/footer.php' ?>
	</div>
	<script>
			$(document).ready(function() {
				$('#example').DataTable();
			});
		</script>


	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.2.2/Chart.min.js'></script>
</body>

</html>