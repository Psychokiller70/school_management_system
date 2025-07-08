<?php
$servername = "localhost";
$username = "root";      // Your DB username
$password = "";          // Your DB password
$dbname = "school_system";    // Your DB name

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>