<?php
include('../db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_name = $_POST['student_name'];
    $sql = "INSERT INTO Student (student_name) VALUES ('$student_name')";
    if ($conn->query($sql) === TRUE) {
        header("Location: ./index_student.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
