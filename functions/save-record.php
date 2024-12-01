<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include('includes/dbconn.php');

// Set the response type to JSON
header('Content-Type: application/json');

// Ensure the user is logged in
if (!isset($_SESSION['user_id']) || strlen($_SESSION['user_id']) == 0) {
    echo json_encode(['success' => false, 'message' => 'User not logged in.']);
    exit();
}

// Check if the form is submitted via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $date = $_POST['date'] ?? null;
    $time_in = $_POST['time_in'] ?? null;
    $time_out = $_POST['time_out'] ?? null;
    $client = $_POST['client'] ?? null;
    $type_of_work = $_POST['type_of_work'] ?? null;
    $description = $_POST['description'] ?? null;
    $status = $_POST['status'] ?? null;

    // Validate required fields
    if ($date && $time_in && $time_out && $client && $type_of_work && $description && $status) {
        // Prepare the SQL statement (fix the extra comma in the values)
        $stmt = $con->prepare("INSERT INTO record (date, time_in, time_out, client, type_of_work, description, status) 
                                VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $date, $time_in, $time_out, $client, $type_of_work, $description, $status);

        if ($stmt->execute()) {
            echo json_encode(['success' => true, 'message' => 'Record saved successfully!']);
        } else {
            echo json_encode(['success' => false, 'message' => $stmt->error]);
        }

        $stmt->close();
    } else {
        echo json_encode(['success' => false, 'message' => 'All fields are required.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
?>
