<?php
require_once '../../../config/config.php';

$message = '';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['student_id'], $_POST['attendance'])) {
    $student_id = $_POST['student_id'];
    $attendance = $_POST['attendance'];

    // Check if attendance record exists
    $stmt = $conn->prepare("SELECT 1 FROM attendance WHERE student_id = ?");
    $stmt->bind_param("i", $student_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $stmt = $conn->prepare("UPDATE attendance SET attendance = ? WHERE student_id = ?");
        $stmt->bind_param("ii", $attendance, $student_id);
    } else {
        $stmt = $conn->prepare("INSERT INTO attendance (student_id, attendance) VALUES (?, ?)");
        $stmt->bind_param("ii", $student_id, $attendance);
    }

    if ($stmt->execute()) {
        $message = "Attendance successfully updated.";
    } else {
        $message = "Failed to update attendance.";
    }
}

$students = $conn->query("SELECT id, name FROM users WHERE role = 'student'");
?>

<h2>Manage Attendance</h2>
<?php if ($message): ?>
    <p><?php echo htmlspecialchars($message); ?></p>
<?php endif; ?>
<form method="POST" action="">
    <select name="student_id" required>
        <option value="">Select Student</option>
        <?php while ($student = $students->fetch_assoc()): ?>
            <option value="<?php echo $student['id']; ?>"><?php echo htmlspecialchars($student['name']); ?></option>
        <?php endwhile; ?>
    </select>
    <input type="number" name="attendance" placeholder="Attendance (%)" min="0" max="100" required>
    <button type="submit">Update</button>
</form>
