<?php
include('../db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST['student_id'];
    $student_name = $_POST['student_name'];
    $sql = "UPDATE Student SET student_name = '$student_name' WHERE student_id = $student_id";
    if ($conn->query($sql) === TRUE) {
        header("Location: ./index_student.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
