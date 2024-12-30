<?php include('../db.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enrollment Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
        }

        h1 {
            color: #333;
        }

        .nav-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-right: 10px;
            margin-bottom: 10px;
        }

        .nav-button:hover {
            background-color: #0056b3;
        }

        form {
            margin-top: 20px;
            margin-bottom: 30px;
        }

        input[type="text"] {
            padding: 10px;
            width: 200px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #218838;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        a {
            color: #ffffff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Enrollment Management</h1>
    <form action="add_enrollment.php" method="POST">
        <select name="student_id">
            <?php
            $result = $conn->query("SELECT * FROM Student");
            while ($row = $result->fetch_assoc()) {
                echo "<option value='{$row['student_id']}'>{$row['student_name']}</option>";
            }
            ?>
        </select>
        <select name="course_id">
            <?php
            $result = $conn->query("SELECT * FROM Course");
            while ($row = $result->fetch_assoc()) {
                echo "<option value='{$row['course_id']}'>{$row['course_name']}</option>";
            }
            ?>
        </select>
        <button type="submit">Enroll Student</button>
    </form>
    <button><a href="../index.php">HOME</a></button>

    <h2>All Enrollment</h2>
    <table>
        <tr>
            <th>Student ID</th>
            <th>Student Name</th>
            <th>Course ID</th>
            <th>Course Name</th>
            <th>Actions</th>
        </tr>
        <?php
        $result = $conn->query("SELECT enrollment.*, Student.student_name, Course.course_name FROM Enrollment JOIN Student ON Enrollment.student_id = Student.student_id JOIN Course ON Enrollment.course_id = Course.course_id");
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['student_id']}</td>
                    <td>{$row['student_name']}</td>
                    <td>{$row['course_id']}</td>
                    <td>{$row['course_name']}</td>
                    <td>
                        <a href='delete_enrollment.php?id={$row['enrollment_id']}&course_id={$row['course_id']}'>Delete</a>
                    </td>
                  </tr>";
        }
        ?>
    </table>
</body>
</html>
