<?php
include('../db.php');

if (isset($_GET['id'])) {
    $instructor_id = $_GET['id'];
    $result = $conn->query("SELECT * FROM Instructor WHERE instructor_id = $instructor_id");
    $instructor = $result->fetch_assoc();
    $dept_result = $conn->query("SELECT * FROM Department");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Instructor</title>
</head>
<body>
    <h1>Edit Instructor</h1>
    <form action="update_instructor.php" method="POST">
        <input type="hidden" name="instructor_id" value="<?php echo $instructor['instructor_id']; ?>">
        <input type="text" name="instructor_name" value="<?php echo $instructor['instructor_name']; ?>" required>
        <select name="dept_id">
            <?php
            while ($row = $dept_result->fetch_assoc()) {
                $selected = ($row['dept_id'] == $instructor['dept_id']) ? 'selected' : '';
                echo "<option value='{$row['dept_id']}' $selected>{$row['dept_name']}</option>";
            }
            ?>
        </select>
        <button type="submit">Update Instructor</button>
    </form>
</body>
</html>
