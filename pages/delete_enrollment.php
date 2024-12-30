<?php
include('../db.php');

if (isset($_GET['id']) && isset($_GET['course_id'])) {
    $student_id = $_GET['id'];
    $course_id = $_GET['course_id'];
    $sql = "DELETE FROM Enrollment WHERE enrollment_id = $student_id ";
    if ($conn->query($sql) === TRUE) {
        header("Location: ./index_enrollment.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
