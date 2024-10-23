<?php
session_start();
include 'includes/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
}

$query = "SELECT * FROM employees";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employees</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/employee.css?v=1.1">
</head>
<body>
    <div class="header">
        <h2>Employee Records</h2>
        <a href="logout.php">Logout</a> <!-- Logout link placed on the right -->
    </div>
    <a class="btn" href="add_employee.php?v=1.1">Add Employee</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Position</th>
            <th>Actions</th>
        </tr>
        <?php while ($employee = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $employee['id']; ?></td>
            <td><?php echo $employee['name']; ?></td>
            <td><?php echo $employee['email']; ?></td>
            <td><?php echo $employee['position']; ?></td>
            <td>
                <a class="btn" href="edit_employee.php?id=<?php echo $employee['id']; ?>">Edit</a>
                <a class="btn" href="delete_employee.php?id=<?php echo $employee['id']; ?>">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
