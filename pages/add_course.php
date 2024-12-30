<?php
include('../db.php'); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course_name = $_POST['course_name'];
    $dept_id = $_POST['dept_id'];
    $instructor_id = $_POST['instructor_id'];
    $credits = $_POST['credits'];

    $stmt = $conn->prepare("INSERT INTO Course (course_name, dept_id, instructor_id, credits) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("siii", $course_name, $dept_id, $instructor_id, $credits);

    if ($stmt->execute()) {
        echo "New course added successfully";
        header("Location: ./index_course.php");
    } else {
        echo "Error: " . $stmt->error;
    }
  
    $stmt->close();
}

$conn->close();
?>
