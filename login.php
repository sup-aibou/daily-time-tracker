<?php
// Include the functions file to access PHP logic
include('functions/login.php');
?>
<!DOCTYPE html>
<html lang="en">

<?php include 'includes/head.php'; ?>

<body>
    <!-- Login Form Container -->
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card" style="width: 25rem;">
            <div class="card-body">
                <h5 class="card-title text-center mb-4">Login</h5>

                <!-- Login Form -->
                <form method="POST">
                    <div class="form-group form-group-default">
                        <label for="username">Username</label>
                        <input
                            id="username"
                            type="username"
                            name="username"
                            class="form-control"
                            placeholder="Enter your Username"
                            required />
                    </div>
                    <div class="form-group form-group-default">
                        <label for="password">Password</label>
                        <input
                            id="password"
                            type="password"
                            name="password"
                            class="form-control"
                            placeholder="Enter your Password"
                            required />
                    </div>
                    <!-- Remember Me Checkbox -->
                    <div class="form-check mb-3">
                        <input type="checkbox" class="form-check-input" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                    </div>

                    <!-- Forgot Password Link -->
                    <div class="mb-3 text-end">
                        <a href="#">Forgot password?</a>
                    </div>

                    <!-- Login Button -->
                    <button type="submit" class="btn btn-primary w-100" name="login">Sign in</button>
                </form>

                <!-- Sign Up Link -->
                <div class="text-center mt-3">
                    <p>Don't have an account? <a href="create-account.php">Sign up</a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <?php include 'includes/scripts.php'; ?>
</body>

</html>