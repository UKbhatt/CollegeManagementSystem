<?php
include('../db.php');
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $username = $conn->real_escape_string($username);
    $email = $conn->real_escape_string($email);
    $password = $conn->real_escape_string($password);
    $role = $conn->real_escape_string($role);

    echo $username." ".$password;
    $sql = "INSERT INTO users(email,password,role,username) VALUES('$email','$password','$role','$username');";

    if ($conn->query($sql) === TRUE) {
     
        $last_id = $conn->insert_id;
        $_SESSION['user_id'] = $last_id;
        $_SESSION['email'] = $email;
        $_SESSION['username']=$username;
        $_SESSION['role'] = $role;
        $_SESSION['logged_in']=true;
        echo "Login complete";
        if($role=="admin")
        header("Location: ../index.php");
        if($role=="student"){
            $sql = "INSERT INTO Student(student_name,user_id) VALUES ('$username',$last_id)";
            if($conn->query($sql) === TRUE)
                header("Location: ../home_student.php");
            else{
                $sql = "DELETE FROM users WHERE id=$last_id";
                if($conn->query($sql) === TRUE){
                    header("Location: ../signup.php");
                }else{
                    header("Location: ../signup.php");
                }
            }
        }
        else
        echo "You are Teacher ";
        exit();
        echo "New record created successfully. Last inserted ID is: " . $last_id;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        $error = "Invalid login credentials!";
        echo "Some error occured";
    }

}
$conn->close();
?>