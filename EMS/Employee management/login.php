<?php
session_start();
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($query);
    $user = $result->fetch_assoc();

    if ($user['username'] && $user['password']) {
        $_SESSION['user_id'] = $user['id'];
        header("Location: employees.php");
    } else {
        echo "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css?v=1.1">
</head>

<body>
    <form method="POST">
        <div class="container">
            <h1 class="head1">Employee Management System</h1>
            <div class="card">
                <h2 class="head">LOGIN</h2>
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <button class="login" type="submit">LOGIN</button>
            </div>  
        </div>
    </form>
</body>

</html>