<?php
include('../db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $instructor_id = $_POST['instructor_id'];
    $instructor_name = $_POST['instructor_name'];
    $dept_id = $_POST['dept_id'];
    $sql = "UPDATE Instructor SET instructor_name = '$instructor_name', dept_id = $dept_id WHERE instructor_id = $instructor_id";
    if ($conn->query($sql) === TRUE) {
        header("Location: ./index_instructor.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
