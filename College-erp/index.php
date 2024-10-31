<?php
session_start();
if (isset($_SESSION['user_id'])) {
    switch ($_SESSION['role']) {
        case 'student':
            header("Location: modules/student/dashboard.php");
            break;
        case 'faculty':
            header("Location: modules/faculty/dashboard.php");
            break;
        case 'admin':
            header("Location: modules/admin/dashboard.php");
            break;
    }
    exit;
} else {
    header("Location: modules/auth/login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>College ERP</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
<h1>Welcome to the College ERP System</h1>
<p>Please <a href="modules/auth/login.php">login</a> to access the system.</p>
</body>
</html>