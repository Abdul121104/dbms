<?php
include '../../includes/header.php';
require_once '../../config/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['student_id'], $_POST['attendance'])) {
    $student_id = $_POST['student_id'];
    $attendance = $_POST['attendance'];
    $stmt = $conn->prepare("UPDATE attendance SET attendance = ? WHERE student_id = ?");
    $stmt->bind_param("ii", $attendance, $student_id);
    $stmt->execute();
}

$query = "SELECT id, name FROM users WHERE role = 'student'";
$students = $conn->query($query);
?>

<h2>Manage Attendance</h2>
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

<?php include '../../includes/footer.php'; ?>
