<?php
include('../db.php');
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $username = $conn->real_escape_string($username);
    $password = $conn->real_escape_string($password);
    $role = $conn->real_escape_string($role);

    echo $username." ".$password;
    $sql = "SELECT * FROM users WHERE email = '$username' AND password = '$password' AND role = '$role'";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['username']=$user['username'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['logged_in']=true;
        echo "Login complete";
        if($user['role']=="admin")
        header("Location: ../index.php");
        if($user['role']=="student")
        header("Location: ../home_student.php");
        echo "You are student ";
        exit();
    } else {
        $error = "Invalid login credentials!";
        echo "Some error occured";
    }

}
$conn->close();
?>