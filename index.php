<?php
session_start();
error_reporting(0);
include('includes/dbconn.php');

if (isset($_POST['login'])) {
	$adminuser = $_POST['username'];
	$password = md5($_POST['password']);
	$query = mysqli_query($con, "SELECT ID from admin where  UserName='$adminuser' && Password='$password' ");
	$ret = mysqli_fetch_array($query);
	if ($ret > 0) {
		$_SESSION['user_id'] = $ret['ID'];
		header('location:dashboard.php');
	} else {
		$msg = "Login Failed !!";
	}
}
// to do change the password from md5 to bcrypt
?>

<!DOCTYPE html>
<html>

<?php include 'includes/head.php' ?>

<body>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Please Log In To Continue</div>
				<div class="panel-body">
					<form method="POST">
						<?php if ($msg)
							echo "<div class='alert bg-danger' role='alert'>
						<em class='fa fa-lg fa-warning'>&nbsp;</em> 
						$msg
						<a href='#' class='pull-right'>
						<em class='fa fa-lg fa-close'>
						</em></a></div>" ?>


						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Username" name="username" type="text">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="">
							</div>
							<div class="checkbox">

								<a href="forgot-password.php" style="text-decoration:none;">Forgot Password?</a>
							</div>
							<button class="btn btn-success" type="submit" name="login">Login</button>
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->


	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>

</html>