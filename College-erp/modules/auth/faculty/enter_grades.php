<?php
require_once '../../../config/config.php';

$message = '';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['student_id'], $_POST['grade'], $_POST['course_id'])) {
    $student_id = $_POST['student_id'];
    $grade = $_POST['grade'];
    $course_id = $_POST['course_id'];

    $stmt = $conn->prepare("INSERT INTO grades (student_id, course_id, grade) VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE grade = ?");
    $stmt->bind_param("iisi", $student_id, $course_id, $grade, $grade);

    if ($stmt->execute()) {
        $message = "Grade successfully submitted.";
    } else {
        $message = "Failed to submit grade.";
    }
}

$students = $conn->query("SELECT id, name FROM users WHERE role = 'student'");
$courses = $conn->query("SELECT id, course_name FROM courses");
?>

<h2>Enter Grades</h2>
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
    <select name="course_id" required>
        <option value="">Select Course</option>
        <?php while ($course = $courses->fetch_assoc()): ?>
            <option value="<?php echo $course['id']; ?>"><?php echo htmlspecialchars($course['course_name']); ?></option>
        <?php endwhile; ?>
    </select>
    <input type="text" name="grade" placeholder="Grade" required>
    <button type="submit">Submit Grade</button>
</form>
