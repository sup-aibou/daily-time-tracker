<?php
// Load environment variables from a secure location
$db_host = getenv('DB_HOST') ?: 'localhost'; // Default to localhost if not set
$db_user = getenv('DB_USER') ?: 'root';      // Default to 'root' if not set
$db_pass = getenv('DB_PASS') ?: '';          // Default to empty password
$db_name = getenv('DB_NAME') ?: 'daily-time-tracker-db'; // Default database name

// Use mysqli_report to handle errors properly
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);


try {
    // Establish a secure database connection
    $con = new mysqli($db_host, $db_user, $db_pass, $db_name);

    // Set the charset to UTF-8 to prevent encoding issues
    $con->set_charset('utf8mb4');
} catch (mysqli_sql_exception $e) {
    // Log error details securely (avoid showing them to users)
    error_log("Database connection failed: " . $e->getMessage());
    die('Database connection failed. Please try again later.');
}
?>
