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

// Ensure user is logged in
if (!isset($_SESSION['username'])) {
    die("You must be logged in to add a comment.");
}

// Get the username from session
$username = $_SESSION['username'];

// Get the movie name from the GET request
$movie_name = isset($_GET['name']) ? $_GET['name'] : '';

if (empty($movie_name)) {
    die("No movie specified.");
}

// Get the comment content from the POST request
$content = isset($_POST['comment']) ? $_POST['comment'] : '';

if (empty($content)) {
    die("Comment content cannot be empty.");
}

// Insert the comment into the database
$stmt = $conn->prepare("INSERT INTO comments (user_id, movie_id, content) VALUES ((SELECT id FROM users WHERE username = ?), (SELECT id FROM movies WHERE title = ?), ?)");
$stmt->bind_param("sss", $username, $movie_name, $content);

if ($stmt->execute()) {
    echo "Comment added successfully!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();