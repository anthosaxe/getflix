<?php
session_start();

$host = 'db';
$user = 'user';
$pass = 'pass';
$db = 'mydb';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $_POST['password'];

    $sql = "SELECT id, username, password FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            header("Location: dashboard.php");
        } else {
            $_SESSION['error'] = "Invalid username or password";
            header("Location: index.php");
        }
    } else {
        $_SESSION['error'] = "Invalid username or password";
        header("Location: index.php");
    }
}

$conn->close();
