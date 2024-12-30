<?php
include('../db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course_id = $_POST['course_id'];
    $course_name = $_POST['course_name'];
    $credits = $_POST['credits'];
    $instructor_id = $_POST['instructor_id'];

    $stmt = $conn->prepare("UPDATE Course SET course_name = ?, credits = ?, instructor_id = ? WHERE course_id = ?");
    $stmt->bind_param("siii", $course_name, $credits, $instructor_id, $course_id);

    if ($stmt->execute()) {
        header("Location: ./index_course.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
