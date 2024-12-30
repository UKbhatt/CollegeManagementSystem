<?php include('../db.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instructor Management</title>
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
    <h1>Instructor Management</h1>
    <form action="add_instructor.php" method="POST">
        <input type="text" name="instructor_name" placeholder="Instructor Name" required>
        <select name="dept_id">
            <?php
            $result = $conn->query("SELECT * FROM Department");
            while ($row = $result->fetch_assoc()) {
                echo "<option value='{$row['dept_id']}'>{$row['dept_name']}</option>";
            }
            ?>
        </select>
        <button type="submit">Add Instructor</button>
    </form>
    <button><a href="../index.php">HOME</a></button>
    <h2>All Instructors</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Department</th>
            <th>Actions</th>
        </tr>
        <?php
        $result = $conn->query("SELECT Instructor.*, Department.dept_name FROM Instructor JOIN Department ON Instructor.dept_id = Department.dept_id");
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['instructor_id']}</td>
                    <td>{$row['instructor_name']}</td>
                    <td>{$row['dept_name']}</td>
                    <td>
                        <a href='edit_instructor.php?id={$row['instructor_id']}'>Edit</a>
                        <a href='delete_instructor.php?id={$row['instructor_id']}'>Delete</a>
                    </td>
                  </tr>";
        }
        ?>
    </table>
</body>
</html>
