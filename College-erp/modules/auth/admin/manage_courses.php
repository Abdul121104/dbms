<?php
require_once '../../../config/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add_course'])) {
        $course_name = $_POST['course_name'];
        $stmt = $conn->prepare("INSERT INTO courses (course_name) VALUES (?)");
        $stmt->bind_param("s", $course_name);
        $stmt->execute();
    } elseif (isset($_POST['delete_course'])) {
        $course_id = $_POST['course_id'];
        $stmt = $conn->prepare("DELETE FROM courses WHERE id = ?");
        $stmt->bind_param("i", $course_id);
        $stmt->execute();
    }
}

$courses = $conn->query("SELECT id, course_name FROM courses");
?>

<h2>Manage Courses</h2>
<form method="POST" action="">
    <input type="text" name="course_name" placeholder="New Course Name" required>
    <button type="submit" name="add_course">Add Course</button>
</form>
<table>
    <tr>
        <th>Course ID</th>
        <th>Course Name</th>
        <th>Action</th>
    </tr>
    <?php while ($course = $courses->fetch_assoc()): ?>
        <tr>
            <td><?php echo $course['id']; ?></td>
            <td><?php echo htmlspecialchars($course['course_name']); ?></td>
            <td>
                <form method="POST" action="" style="display:inline;">
                    <input type="hidden" name="course_id" value="<?php echo $course['id']; ?>">
                    <button type="submit" name="delete_course">Delete</button>
                </form>
            </td>
        </tr>
    <?php endwhile; ?>
</table>
