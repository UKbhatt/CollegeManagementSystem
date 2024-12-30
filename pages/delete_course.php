<?php
include('../db.php');

if (isset($_GET['id'])) {
    $course_id = $_GET['id'];
    $sql = "DELETE FROM Course WHERE course_id = $course_id";
    if ($conn->query($sql) === TRUE) {
        header("Location: ./index_course.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
