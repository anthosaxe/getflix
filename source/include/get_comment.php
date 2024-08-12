<?php

$servername = "db";
$db_username = "user";
$db_password = "pass";
$dbname = "mydb";

$conn = new mysqli($servername, $db_username, $db_password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_SESSION['username'];
$movie_title = $_SESSION['film'];
$movie_title = "%$movie_title%"; 

$stmt = $conn->prepare("SELECT comments.id AS comment_id, comments.content AS comment_content, comments.validate AS comment_validated, movies.title AS movie_title, users.username AS user_username FROM comments INNER JOIN movies ON comments.movie_id = movies.id INNER JOIN users ON comments.user_id = users.id WHERE movies.title LIKE ?");

$stmt->bind_param("s", $movie_title);

$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='bg-gray-700 border border-gray-600 rounded-lg p-4 mb-4'>";
        echo "<p class='font-bold text-white'>" . htmlspecialchars($row['user_username']) . " :</p>";
        echo "<p class='text-gray-300'>" . htmlspecialchars($row['comment_content']) . "</p>";
        echo "</div>";
    }
} else {
    echo "<p class='text-white'>Be the first to comment !</p>";
}

$stmt->close();
$conn->close();
?>



