<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include '../includes/dbconn.php';

// Ensure the user is logged in
if (!isset($_SESSION['user_id']) || strlen($_SESSION['user_id']) == 0) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}

// Check if the form is submitted via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Retrieve and sanitize form inputs
    $user_id = $_SESSION['user_id'];
    $date = trim($_POST['date']);
    $time_in = trim($_POST['time_in']);
    $time_out = trim($_POST['time_out']);
    $client = trim($_POST['client']);
    $type_of_work = trim($_POST['type_of_work']);
    $description = trim($_POST['description']);
    $status = trim($_POST['status']);

    // Validate inputs
    $errors = [];
    if (empty($date)) $errors[] = "Date is required.";
    if (empty($time_in)) $errors[] = "Time in is required.";
    if (empty($time_out)) $errors[] = "Time out is required.";
    if (empty($client)) $errors[] = "Client is required.";
    if (empty($type_of_work)) $errors[] = "Type of work is required.";
    if (empty($description)) $errors[] = "Description is required.";
    if (empty($status)) $errors[] = "Status is required.";

    // If errors exist, redirect with errors
    if (!empty($errors)) {
        $_SESSION['errors'] = implode(' ', $errors);  // Store error messages in session
        header("Location: ./add_record.php");  // Redirect to the form page
        exit();
    }
    if (isset($_SESSION['errors'])) {
        echo '<div class="alert alert-danger">' . $_SESSION['errors'] . '</div>';
        unset($_SESSION['errors']);
    }

    // Prepare the insert statement
    $stmt = $con->prepare("INSERT INTO record (user_id, date, time_in, time_out, client, type_of_work, description, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

    if ($stmt) {
        $stmt->bind_param("ssssssss", $user_id, $date, $time_in, $time_out, $client, $type_of_work, $description, $status);
        
        if ($stmt->execute()) {
            // Success
            header("Location: ../records.php");
            exit();
        } else {
            $_SESSION['errors'] = "Failed to insert data: " . $stmt->error;
            header("Location: ./save-record.php");
            exit();
        }
        
    } else {
        // If the statement preparation fails, show an error
        $_SESSION['errors'] = "Failed to prepare SQL statement: " . $con->error;
        header("Location: ./save-record.php");
        exit();
    }
}
?>
