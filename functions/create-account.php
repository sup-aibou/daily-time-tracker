<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include '../includes/dbconn.php';

if (isset($con)) {
    echo "Database connection successful!";
} else {
    echo "Failed to connect to the database.";
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Retrieve and sanitize form inputs
    $username = trim($_POST['username']);
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    // Validate inputs
    $errors = [];
    if (empty($username)) $errors[] = "Username is required.";
    if (empty($name)) $errors[] = "Name is required.";
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "A valid email is required.";
    if (empty($password)) $errors[] = "Password is required.";
    if ($password !== $confirm_password) $errors[] = "Passwords do not match.";

    // If no errors, proceed
    if (empty($errors)) {
        // Hash the password with bcrypt
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // Check if the email or username already exists
        $stmt = $con->prepare("SELECT id FROM users WHERE email = ? OR username = ?");
        $stmt->bind_param("ss", $email, $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $errors[] = "Email or username is already registered.";
        } else {
            // Insert user into the database
            $stmt = $con->prepare("INSERT INTO users (username, name, email, password) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $username, $name, $email, $hashed_password);

            if ($stmt->execute()) {
                // Registration successful
                header("Location: ./login.php");
                exit;
            } else {
                $errors[] = "An error occurred. Please try again.";
            }
        }
    }
}