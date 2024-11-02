<?php
require_once '../../../config/config.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST['student_id'];
    $course_id = $_POST['course_id'];

    // Query to calculate attendance percentage for the selected student and course
    $query = "
        SELECT ROUND((SUM(CASE WHEN status = 'present' THEN 1 ELSE 0 END) / COUNT(id)) * 100, 2) AS attendance_percentage
        FROM attendance
        WHERE student_id = ? AND course_id = ?
    ";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $student_id, $course_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $attendance_percentage = $result->fetch_assoc()['attendance_percentage'] ?? 'No data available';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f6;
            text-align: center;
        }
        form, .result-container {
            margin: 20px auto;
            width: 80%;
            max-width: 400px;
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 8px;
        }
        label, input[type="submit"] {
            display: block;
            margin: 10px 0;
        }
    </style>
</head>
<body>

<h2>Check Attendance Percentage</h2>

<form method="post" action="">
    <label for="student_id">Student ID:</label>
    <input type="number" id="student_id" name="student_id" required>

    <label for="course_id">Course ID:</label>
    <input type="number" id="course_id" name="course_id" required>

    <input type="submit" value="Check Attendance">
</form>

<?php if (isset($attendance_percentage)): ?>
    <div class="result-container">
        <h3>Attendance Percentage</h3>
        <p>Student ID: <?php echo htmlspecialchars($student_id); ?></p>
        <p>Course ID: <?php echo htmlspecialchars($course_id); ?></p>
        <p>Attendance: <?php echo htmlspecialchars($attendance_percentage); ?>%</p>
    </div>
<?php endif; ?>

</body>
</html>
