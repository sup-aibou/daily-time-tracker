<?php
session_start();
error_reporting(0);
include('includes/dbconn.php');

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password']; // Get the password entered by the user

    // Query to get the stored hash for the entered username
    $query = mysqli_query($con, "SELECT ID, password_hash FROM users WHERE username='$username'");
    $ret = mysqli_fetch_array($query);

    if ($ret) {
        // Check if the entered password matches the stored hash
        if (password_verify($password, $ret['password_hash'])) {
            // Password is correct
            $_SESSION['user_id'] = $ret['ID'];
            header('location:index.php');
        } else {
            // Incorrect password
            $msg = "Login Failed!!";
        }
    } else {
        // Username not found
        $msg = "Login Failed!!";
    }
}
