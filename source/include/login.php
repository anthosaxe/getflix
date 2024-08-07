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
    $remember = isset($_POST['remember']);

    $isAuthenticated = true; // Replace with actual authentication logic

    $sql = "SELECT id, username, password, role FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = $row['role'];
            header("Location: dashboard.php");
        } else {
            $_SESSION['error'] = "Invalid username or password";
            header("Location: index.php");
        }
    } else {
        $_SESSION['error'] = "Invalid username or password";
        header("Location: index.php");
    }

    $stmt->close();
}
if ($isAuthenticated) {
    $_SESSION['user_id'] = $user_id;
    $_SESSION['username'] = $username;
    $_SESSION['role'] = $role;

    // Set the username in a cookie if "Remember Me" is checked
    if ($remember) {
        setcookie('username', $username, time() + (86400), "/"); // 86400 = 1 day, set for 30 days
    } else {
        // If "Remember Me" is not checked, clear the cookie
        setcookie('username', '', time() - 3600, "/");
    }

    // Redirect to the dashboard
    header("Location: dashboard.php");
    exit;
} else {
    echo "Invalid username or password.";
}
$conn->close();
?>
<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>

<body class="body-color">
    <div>
        <!-- <form action="<?php #$_SERVER['PHP_SELF'] 
                            ?>" method="get"> -->

<!-- <form action="../main.php" method="post">
    <label for="username">Username</label>
    <input type="text" name="username" placeholder="username">
    <br>
    <label for="password">Password please</label>
    <input type="password" name="password" placeholder="pass">
    <button type="submit">Click here for magic</button>
</form>
</div>
</body>

</html> -->