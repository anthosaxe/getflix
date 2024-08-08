<?php
session_start();

// Database connection setup
$servername = "db";
$db_username = "user";
$db_password = "pass";
$dbname = "mydb";

// Create connection
$conn = new mysqli($servername, $db_username, $db_password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the cookie is set and retrieve the username
$savedUsername = isset($_COOKIE['username']) ? htmlspecialchars($_COOKIE['username']) : '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and execute the SQL statement to find the user
    $stmt = $conn->prepare("SELECT id, password, role FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($user_id, $hashed_password, $role);
    $stmt->fetch();

    // Verify the password
    if ($user_id && password_verify($password, $hashed_password)) {
        // Set session variables
        $_SESSION['user_id'] = $user_id;
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $role;

        // If "Remember Me" is checked, set the cookie
        if (isset($_POST['remember'])) {
            setcookie('username', $username, time() + 86400, "/"); // 86400 seconds = 1 day
        }

        // Redirect to the dashboard
        header("Location: dashboard.php");
        exit;
    } else {
        // Authentication failed
        echo "Invalid username or password.";
    }

    $stmt->close();
}

$conn->close();
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">

<form method="post" action="test_connection.php">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" value="<?php echo $savedUsername; ?>" required>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>

    <input type="checkbox" id="remember" name="remember">
    <label for="remember">Remember Me</label>

    <button type="submit">Login</button>
</form>
<p>Don't have an account? <a href="register.php">Register here</a></p>