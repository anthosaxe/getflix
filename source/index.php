<?php
require_once 'config.php';

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $conn = new mysqli($db_host, $db_user, $db_password, $db_name);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo "Login successful!";
    } else {
        echo "Invalid username or password";
    }

    $conn->close();
}

?>

<form action="" method="post">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username">


    <label for="password">Password:</label>
    <input type="password" id="password" name="password">


    <input type="submit" value="Login">
</form>