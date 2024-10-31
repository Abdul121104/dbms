<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: /college-erp/modules/auth/login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College ERP</title>
    <link rel="stylesheet" href="/college-erp/assets/css/styles.css">
</head>
<body>
<nav>
    <a href="/college-erp/modules/student/dashboard.php">Dashboard</a>
    <a href="/college-erp/modules/auth/logout.php">Logout</a>
</nav>
