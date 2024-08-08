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
        header("Location: index.php");
        exit;
    } else {
        // Authentication failed
        echo "Invalid username or password.";
    }

    $stmt->close();
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="./css/style.css">
    <title>Failflix</title>
</head>

<body>

    <body class="body-color">
        <nav class="color-class border-gray-200 fixed w-full top-0 left-0 z-50">
            <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-4">
                <a href="./index.php" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img src="./images/cochon.jpg" class="h-8" alt="Flowbite Logo" />
                    <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">FailFlix</span>
                </a>
                <div class="flex items-center space-x-6 rtl:space-x-reverse">
                    <a href="login.php" class="border text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Login</a>
                </div>
            </div>
        </nav>
        <form class="max-w-sm mx-auto my-5" method="post" action="login.php">
            <div class="mb-5">
                <label for="username" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                <input id="username" name="username" value="<?php echo $savedUsername; ?>" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="JOJO L CROCO" required />
            </div>
            <div class="mb-5">
                <label for="password" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                <input type="password" id="password" name="password" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required />
            </div>
            <div class="flex items-start mb-5">
                <div class="flex items-center h-5">
                    <input id="terms" type="checkbox" name="newsletter" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" />
                </div>
                <label for="terms" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Remember Me</a></label>
            </div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Log In</button>
            <p>No account? Register <a href="register.php" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">here</a></p>
        </form>
        </div>
        <footer class="bg-white shadow dark:bg-gray-900">
            <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8 flex justify-between items-center">
                <div class="flex flex-col sm:flex-row items-start">
                    <ul class="flex flex-wrap justify-start mb-6 text-sm font-medium text-gray-500 sm:mb-0 dark:text-gray-400">
                        <li>
                            <a href="#" class="hover:underline me-4 md:me-6">About</a>
                        </li>
                        <li>
                            <a href="#" class="hover:underline me-4 md:me-6">Privacy Policy</a>
                        </li>
                        <li>
                            <a href="#" class="hover:underline me-4 md:me-6">Licensing</a>
                        </li>
                        <li>
                            <a href="#" class="hover:underline">Contact</a>
                        </li>
                    </ul>
                </div>
                <div class="text-sm text-gray-500 dark:text-gray-400">
                    © 2024 <a href="#" class="hover:underline">Failflix-corp</a>. All Rights Reserved.
                </div>
            </div>
        </footer>


    </body>
</body>

</html>


<!-- <form method="post" action="test_connection.php">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" value="<?php //echo $savedUsername; 
                                                            ?>" required>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>

    <input type="checkbox" id="remember" name="remember">
    <label for="remember">Remember Me</label>

    <button type="submit">Login</button>
</form>
<p>Don't have an account? <a href="register.php">Register here</a></p> -->