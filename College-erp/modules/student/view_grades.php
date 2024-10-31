<?php
include '../../includes/header.php';
require_once '../../config/config.php';

$user_id = $_SESSION['user_id'];
$query = "SELECT course_name, grade FROM grades WHERE student_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<h2>Your Grades</h2>
<table>
    <tr>
        <th>Course</th>
        <th>Grade</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo htmlspecialchars($row['course_name']); ?></td>
            <td><?php echo htmlspecialchars($row['grade']); ?></td>
        </tr>
    <?php endwhile; ?>
</table>

<?php include '../../includes/footer.php'; ?>
