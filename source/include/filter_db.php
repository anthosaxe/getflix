<?php
include "connect.php";

function get_by_genre($genre)
{
    $pdo = connect();
    $stmt = $pdo->prepare("SELECT movies.*, categories.name AS category_name FROM movies JOIN categories ON movies.category_id = categories.id 
        WHERE categories.name = :genre");
    $stmt->bindParam(':genre', $genre, PDO::PARAM_STR);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

function get_by_name($name)
{
    $pdo = connect();
    $name = "%$name%";
    $stmt = $pdo->prepare("SELECT movies.*, categories.name AS category_name FROM movies JOIN categories ON movies.category_id = categories.id 
        WHERE movies.title LIKE :name");
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

$results = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Les données envoyées sont en `application/x-www-form-urlencoded`
    if (isset($_POST['genre']) && !empty($_POST['genre'])) {
        $genre = $_POST['genre'];
        $results = get_by_genre($genre);
    } elseif (isset($_POST['name']) && !empty($_POST['name'])) {
        $name = $_POST['name'];
        $results = get_by_name($name);
    } else {
        $results = ["error" => "Search type or value not specified"];
    }

    echo json_encode($results);
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['name']) && !empty($_GET['name'])) {
        $name = $_GET['name'];
        $results = get_by_name($name);
    } else {
        $results = ["error" => "Search type or value not specified"];
    }

    echo json_encode($results);
}
