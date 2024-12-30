<?php
include('../db.php');

if (isset($_GET['id'])) {
    $course_id = $_GET['id'];
    $result = $conn->query("SELECT * FROM Course WHERE course_id = $course_id");
    $course = $result->fetch_assoc();
    $instructor_result = $conn->query("SELECT * FROM Instructor");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Course</title>
</head>
<body>
    <h1>Edit Course</h1>
    <form action="update_course.php" method="POST">
        <input type="hidden" name="course_id" value="<?php echo $course['course_id']; ?>">
        <input type="text" name="course_name" value="<?php echo $course['course_name']; ?>" required>
        <input type="number" name="credits" value="<?php echo $course['credits']; ?>" required>
        <select name="instructor_id">
            <?php
            while ($row = $instructor_result->fetch_assoc()) {
                $selected = ($row['instructor_id'] == $course['instructor_id']) ? 'selected' : '';
                echo "<option value='{$row['instructor_id']}' $selected>{$row['instructor_name']}</option>";
            }
            ?>
        </select>
        <button type="submit">Update Course</button>
    </form>
</body>
</html>
