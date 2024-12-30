<?php
include('../db.php');

if (isset($_GET['id'])) {
    $instructor_id = $_GET['id'];
    $sql = "DELETE FROM Instructor WHERE instructor_id = $instructor_id";
    if ($conn->query($sql) === TRUE) {
        header("Location: ./index_instructor.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
