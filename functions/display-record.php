<?php
// Include the database connection file
include('includes/dbconn.php');

// Function to check session validity
function checkSession() {
    if (!isset($_SESSION['user_id']) || strlen($_SESSION['user_id']) == 0) {
        header('location:logout.php');
        exit();
    }
}

// Function to fetch records from the database
function fetchRecords($con) {
    $query = "SELECT * FROM record"; // Modify query as needed
    return mysqli_query($con, $query);
}

// Function to render table rows
function renderTableRows($result) {
    $cnt = 1;
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>
                <td>{$cnt}</td>
                <td>{$row['date']}</td>
                <td>{$row['time_in']}</td>
                <td>{$row['time_out']}</td>
                <td>" . calculateHours($row['time_in'], $row['time_out']) . "</td>
                <td>{$row['client']}</td>
                <td>{$row['description']}</td>
                <td>{$row['status']}</td>
            </tr>";
        $cnt++;
    }
}

// Function to calculate hours rendered (time-out - time-in)
function calculateHours($time_in, $time_out) {
    $time_in_obj = new DateTime($time_in);
    $time_out_obj = new DateTime($time_out);
    $interval = $time_in_obj->diff($time_out_obj);
    return $interval->format('%h hours %i minutes');
}
?>
