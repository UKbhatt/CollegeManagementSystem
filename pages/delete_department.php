<?php
include('../db.php');

if (isset($_GET['id'])) {
    $dept_id = $_GET['id'];
    $sql = "DELETE FROM Department WHERE dept_id = $dept_id";
    if ($conn->query($sql) === TRUE) {
        header("Location: ../index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
