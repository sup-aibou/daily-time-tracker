<!-- Purpose: Establishes a connection to the database -->
<?php
$host = 'localhost';
$dbname = 'daily-time-tracker-db';
$username = 'root';
$password = '';

$con = new mysqli($host, $username, $password, $dbname);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}