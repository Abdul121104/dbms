<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'college_erp';
$port = 3306; // Change to 3306 if 3307 was incorrect

// Create connection
$conn = new mysqli($servername, $username, $password, $database, $port);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
