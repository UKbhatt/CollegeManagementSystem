<?php
include('../db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST['student_id'];
    $course_id = $_POST['course_id'];
    $sql = "INSERT INTO Enrollment (student_id, course_id) VALUES ($student_id, $course_id)";
    if ($conn->query($sql) === TRUE) {
        header("Location: ./index_enrollment.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
