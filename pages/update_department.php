<?php
include('../db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dept_id = $_POST['dept_id'];
    $dept_name = $_POST['dept_name'];
    $sql = "UPDATE Department SET dept_name = '$dept_name' WHERE dept_id = $dept_id";
    if ($conn->query($sql) === TRUE) {
        header("Location: ../index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
