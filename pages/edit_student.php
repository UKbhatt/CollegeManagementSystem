<?php
include('../db.php');

if (isset($_GET['id'])) {
    $student_id = $_GET['id'];
    $result = $conn->query("SELECT * FROM Student WHERE student_id = $student_id");
    $student = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Student</title>
</head>
<body>
    <h1>Edit Student</h1>
    <form action="update_student.php" method="POST">
        <input type="hidden" name="student_id" value="<?php echo $student['student_id']; ?>">
        <input type="text" name="student_name" value="<?php echo $student['student_name']; ?>" required>
        <button type="submit">Update Student</button>
    </form>
</body>
</html>
