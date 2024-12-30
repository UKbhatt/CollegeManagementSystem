<?php
include('../db.php');

if (isset($_GET['id'])) {
    $student_id = $_GET['id'];
    $sql = "DELETE FROM Student WHERE student_id = $student_id";
    if ($conn->query($sql) === TRUE) {
        header("Location: ./index_student.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
