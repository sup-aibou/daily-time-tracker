<?php
session_start();
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
    // Ensure session variable exists and is valid
    if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
        // Redirect if session variable is not set
        header('location:logout.php');
        exit();
    }

    // Use the user_id safely in the query
    $user_id = $_SESSION['user_id'];
    $query = "SELECT * FROM record WHERE user_id = '$user_id'"; // Modify query to properly use user_id
    return mysqli_query($con, $query);
}

// Function to render table rows with styled status

function renderTableRows($result) {
    $cnt = 1;
    while ($row = mysqli_fetch_array($result)) {
        // Normalize the case of the status value
        // 1 = pending, 2 = completed, 3 = rescheduled
        $status = (int)$row['status'];
        $statusText = '';
        $statusClass = '';

        // Map status to text and design
        if ($status === 1) {
            $statusText = 'Pending';
            $statusClass = 'badge badge-warning';
        } else if ($status === 2) {
            $statusText = 'On going';
            $statusClass = 'badge badge-info';
        } else if ($status === 3) {
            $statusText = 'Completed';
            $statusClass = 'badge badge-success';
        } else if ($status === 4) {
            $statusText = 'Rescheduled';
            $statusClass = 'badge badge-danger';
        } else {
            $statusText = 'Unknown';
            $statusClass = 'badge badge-count';
        }
        // Render table row
        // need to add function for the edit
        echo "<tr class='border-b hover:bg-gray-100'>
                <td class='px-4 py-2 text-left'>{$cnt}</td>
                <td class='px-4 py-2 text-left'>{$row['date']}</td>
                <td class='px-4 py-2 text-left'>{$row['time_in']}</td>
                <td class='px-4 py-2 text-left'>{$row['time_out']}</td>
                <td class='px-4 py-2 text-left'>" . calculateHours($row['time_in'], $row['time_out']) . "</td>
                <td class='px-4 py-2 text-left'>{$row['client']}</td>
                <td class='px-4 py-2 text-left'>{$row['type_of_work']}</td>
                <td class='px-4 py-2 text-left capitalize '>{$row['description']}</td>
                <td class='px-4 py-2 text-left'>
                    <span class='{$statusClass}'>{$statusText}</span>
                </td>
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
