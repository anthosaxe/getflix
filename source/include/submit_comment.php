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

$username = $_SESSION['username'];
$movie_name = $_POST['movie_name'];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['comment'])){
    $content = $_POST['comment'];
    $stmt = $conn->prepare("INSERT INTO comments (user_id, movie_id, content) VALUES ((SELECT id FROM users WHERE username = ?), (SELECT id FROM movies WHERE title = ?), ?)");
    $stmt->bind_param("sss", $username, $movie_name, $content);

    if ($stmt->execute()) {
        echo "Comment added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

