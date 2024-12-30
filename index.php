<?php include('db.php'); 
session_start();
if ($_SESSION['logged_in'] && $_SESSION['role']=="admin"){
    
}else if($_SESSION['logged_in'] && $_SESSION['role']=="student"){
    header("Location: home_student.php");
}else{
    header("Location: login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Department Management</title>
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
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
    
</head>
<body>
    <h1>Hello, <?php echo $_SESSION['username']; ?></h1>
    <h1>Department Management</h1>
    
    <div>
        <a href="pages/index_instructor.php" class="nav-button">Manage Instructors</a>
        <a href="pages/index_course.php" class="nav-button">Manage Courses</a>
        <a href="pages/index_student.php" class="nav-button">Manage Students</a>
        <a href="pages/index_enrollment.php" class="nav-button">Manage Enrollments</a>
        <a href="pages/logout.php" class="nav-button">Logout</a>
    </div>
    
    <form action="pages/add_department.php" method="POST">
        <input type="text" name="dept_name" placeholder="Department Name" required>
        <button type="submit">Add Department</button>
    </form>

    <h2>All Departments</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>
        <?php
        $result = $conn->query("SELECT * FROM Department");
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['dept_id']}</td>
                    <td>{$row['dept_name']}</td>
                    <td>
                        <a href='pages/edit_department.php?id={$row['dept_id']}'>Edit</a>
                        <a href='pages/delete_department.php?id={$row['dept_id']}'>Delete</a>
                    </td>
                  </tr>";
        }
        ?>
    </table>
</body>
</html>
