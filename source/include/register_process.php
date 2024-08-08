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
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $newsletter = isset($_POST['newsletter']) ? 1 : 0;

    if ($password !== $confirm_password) {
        $_SESSION['error'] = "Passwords do not match";
        header("Location: ../formulaireIn.php");
        exit();
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $role = 'user'; // Default role is 'user'

    $sql = "INSERT INTO users (username, email, password, role, newsletter) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $username, $email, $hashed_password, $role, $newsletter);

    try {
        if ($stmt->execute()) {
            $_SESSION['success'] = "Registration successful. You can now log in.";
            header("Location: ../main.php");
            exit();
        } else {
            throw new Exception("Registration failed. Please try again.");
        }
    } catch (mysqli_sql_exception $e) {
        if ($e->getCode() == 1062) { // Duplicate entry error code
            if (strpos($e->getMessage(), 'username') !== false) {
                $_SESSION['error'] = "Username already exists. Please choose a different username.";
            } elseif (strpos($e->getMessage(), 'email') !== false) {
                $_SESSION['error'] = "Email address already registered. Please use a different email.";
            } else {
                $_SESSION['error'] = "Registration failed. Please try again with different information.";
            }
        } else {
            $_SESSION['error'] = "An error occurred during registration. Please try again.";
        }
        header("Location: ../register.php");
        exit();
    } catch (Exception $e) {
        $_SESSION['error'] = $e->getMessage();
        header("Location: register.php");
        exit();
    }

    $stmt->close();
}

$conn->close();
// session_start();

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $username = $_POST['username'];
//     $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash the password
//     $email = $_POST['email'];

//     // Database connection
//     $servername = "db";
//     $db_username = "user";
//     $db_password = "pass";
//     $dbname = "mydb";

//     $conn = new mysqli($servername, $db_username, $db_password, $dbname);

//     if ($conn->connect_error) {
//         die("Connection failed: " . $conn->connect_error);
//     }

//     // Insert user into the database
//     $stmt = $conn->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
//     $stmt->bind_param("sss", $username, $password, $email);

//     if ($stmt->execute()) {
//         $_SESSION['user_id'] = $conn->insert_id;
//         $_SESSION['username'] = $username;
//         $_SESSION['role'] = 'user'; // Default role
//         header("Location: dashboard.php");
//     } else {
//         echo "Error: " . $stmt->error;
//     }
//     try {
//                 if ($stmt->execute()) {
//                     $_SESSION['success'] = "Registration successful. You can now log in.";
//                     header("Location: ../main.php");
//                     exit();
//                 } else {
//                     throw new Exception("Registration failed. Please try again.");
//                 }
//             } catch (mysqli_sql_exception $e) {
//                 if ($e->getCode() == 1062) { // Duplicate entry error code
//                     if (strpos($e->getMessage(), 'username') !== false) {
//                         $_SESSION['error'] = "Username already exists. Please choose a different username.";
//                     } elseif (strpos($e->getMessage(), 'email') !== false) {
//                         $_SESSION['error'] = "Email address already registered. Please use a different email.";
//                     } else {
//                         $_SESSION['error'] = "Registration failed. Please try again with different information.";
//                     }
//                 } else {
//                     $_SESSION['error'] = "An error occurred during registration. Please try again.";
//                 }
//             }

//     $stmt->close();
//     $conn->close();
// }