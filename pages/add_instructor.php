<?php
include('../db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $instructor_name = $_POST['instructor_name'];
    $dept_id = $_POST['dept_id'];
    $sql = "INSERT INTO Instructor (instructor_name, dept_id) VALUES ('$instructor_name', $dept_id)";
    if ($conn->query($sql) === TRUE) {
        header("Location: ./index_instructor.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
