<?php include('db.php'); 
session_start();
if ($_SESSION['logged_in'] && $_SESSION['role']=="admin"){
    header("Location: index.php");
}else if($_SESSION['logged_in'] && $_SESSION['role']=="student"){
    
}else{
    header("Location: login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/styles.css">
</head>
<body>
    <h1>Hello, <?php echo $_SESSION['username']; ?></h1>
    <h2>Student Dashboard</h2>
    <div>
        <a href="pages/logout.php" class="nav-button">Logout</a>
    </div>
    <table>
        <tr>
            <th>Student ID</th>
            <th>Student Name</th>
            <th>Course ID</th>
            <th>Course Name</th>
            <th>Actions</th>
        </tr>
        <?php
        $uid = $_SESSION["user_id"];
        $result = $conn->query("SELECT enrollment.*, Student.student_name, Course.course_name FROM Enrollment JOIN Student ON Enrollment.student_id = Student.student_id JOIN Course ON Enrollment.course_id = Course.course_id WHERE Student.user_id=$uid");
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['student_id']}</td>
                    <td>{$row['student_name']}</td>
                    <td>{$row['course_id']}</td>
                    <td>{$row['course_name']}</td>
                    <td>
                        <a href='delete_enrollment.php?id={$row['enrollment_id']}&course_id={$row['course_id']}'>Delete</a>
                    </td>
                  </tr>";
        }
        ?>
    </table>
</body>
</html>