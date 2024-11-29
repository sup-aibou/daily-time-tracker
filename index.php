<?php
session_start();
error_reporting(E_ALL); // Enable error reporting for debugging
include('includes/dbconn.php');

// Enable mysqli error reporting
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

if (isset($_POST['login'])) {
	$adminuser = $_POST['username'];
	$Password = $_POST['password']; // Change to match form field name 'password'

	// Debugging: Check if username and password are set
	if (empty($adminuser) || empty($Password)) {
		echo "Username or Password is empty!";
	} else {
		// Query to fetch the admin data
		$query = mysqli_query($con, "SELECT ID, Password FROM admin WHERE UserName='$adminuser'");

		// Debugging: Check if the query returned a result
		if (mysqli_num_rows($query) > 0) {
			$ret = mysqli_fetch_array($query);

			// Debugging: Check the hashed password stored in the DB
			echo "DB Hashed Password: " . $ret['Password']; // Check what is stored in the database

			// Check if the entered password matches the stored hashed password
			if (password_verify($Password, $ret['Password'])) {
				$_SESSION['user_id'] = $ret['ID'];
				header('location:dashboard.php');
			} else {
				$msg = "Login Failed: Invalid Password!";
				echo $msg;
			}
		} else {
			echo "No user found with that username!";
		}
	}
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Daily Time Record</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
</head>

<body>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Please Log In To Continue</div>
				<div class="panel-body">

					<form method="POST">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Username" name="username" type="text" required>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="" required>
							</div>
							<div class="checkbox">
								<a href="forgot-password.php" style="text-decoration:none;">Forgot Password?</a>
							</div>
							<button class="btn btn-success" type="submit" name="login">Login</button>
						</fieldset>
					</form>

				</div>
			</div>
		</div>
	</div>


	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>

</html>