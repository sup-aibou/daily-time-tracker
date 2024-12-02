<?php
include 'includes/dbconn.php';
// Include the functions file to access PHP logic
include('functions/create-account.php');
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

                <!-- Display Errors -->
                <?php if (!empty($errors)): ?>
                    <div class="alert alert-danger">
                        <?php foreach ($errors as $error): ?>
                            <p><?php echo htmlspecialchars($error); ?></p>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <!-- Login Form -->
                <form method="POST" action="functions/create-account.php">
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
                        <label for="name">Name</label>
                        <input
                            id="name"
                            type="name"
                            name="name"
                            class="form-control"
                            placeholder="Enter your Name"
                            required />
                    </div>
                    <!-- Email input -->
                    <div class="form-group form-group-default">
                        <label for="email">Email Address</label>
                        <input
                            id="email"
                            type="email"
                            name="email"
                            class="form-control"
                            placeholder="Enter your email"
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
                    <div class="form-group form-group-default">
                        <label for="confirm_password">Confirm Password</label>
                        <input
                            id="confirm_password"
                            type="password"
                            name="confirm_password"
                            class="form-control"
                            placeholder="Confirm your Password"
                            required />
                    </div>

                    <!-- Login Button -->
                    <button type="submit" class="btn btn-primary w-100">Register</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <?php include 'includes/scripts.php'; ?>
</body>

</html>