<?php
include('../db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dept_name = $_POST['dept_name'];
    $sql = "INSERT INTO Department (dept_name) VALUES ('$dept_name')";
    if ($conn->query($sql) === TRUE) {
        header("Location: ../index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
