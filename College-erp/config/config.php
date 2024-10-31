<?php
$host = 'localhost';
$user = 'root';
$password = 'root'; // replace with your password if not empty
$dbname = 'college-erp';
$port = 3307; // Ensure this matches your MySQL port, often 3306 by default

$connection = new mysqli($host, $user, $password, $dbname, $port);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
?>