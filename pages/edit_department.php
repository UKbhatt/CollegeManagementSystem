<?php
include('../db.php');

if (isset($_GET['id'])) {
    $dept_id = $_GET['id'];
    $result = $conn->query("SELECT * FROM Department WHERE dept_id = $dept_id");
    $department = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Department</title>
</head>
<body>
    <h1>Edit Department</h1>
    <form action="update_department.php" method="POST">
        <input type="hidden" name="dept_id" value="<?php echo $department['dept_id']; ?>">
        <input type="text" name="dept_name" value="<?php echo $department['dept_name']; ?>" required>
        <button type="submit">Update Department</button>
    </form>
</body>
</html>
