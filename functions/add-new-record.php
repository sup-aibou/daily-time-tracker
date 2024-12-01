<?php
session_start();  // Start the session

// Include the database connection
include('includes/dbconn.php');

// Function to insert data into the database
function saveRecord($con) {
    if (isset($_POST['submit'])) {
        $date = $_POST['date'];
        $time_in = $_POST['time_in'];
        $time_out = $_POST['time_out'];
        $client = $_POST['client'];
        $description = $_POST['description'];
        $status = $_POST['status'];

        // Prepare an insert statement
        $stmt = $con->prepare("INSERT INTO record (date, time_in, time_out, client, description, status) 
                                VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $date, $time_in, $time_out, $client, $description, $status);

        if ($stmt->execute()) {
            echo "Record saved successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }
}


// Call the function to insert the data if the form is submitted
saveRecord($con);

// Function to check if the user is logged in (from your previous code)
if (!isset($_SESSION['user_id']) || strlen($_SESSION['user_id']) == 0) {
    header('location:logout.php');
    exit();
}
?>

<!-- The rest of your page content goes here (e.g., table, data display, etc.) -->
