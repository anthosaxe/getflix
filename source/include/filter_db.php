<?php
include "connect.php";

function get_by_genre(){
    $pdo = connect();
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $genre = $_POST["genre"];
        $stmt = $pdo->prepare("SELECT movies.*, categories.name AS category_name FROM movies JOIN categories ON movies.category_id = categories.id 
            WHERE categories.name = :genre");
        $stmt->bindParam(':genre', $genre, PDO::PARAM_STR);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($results);
        // echo "<img src='" . $results[0]['image_url'] . "'>";
    }
}

function get_by_name(){
    $pdo = connect();
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $name = $_POST["name"];
        $name ="%$name%";
        $stmt = $pdo->prepare("SELECT movies.*, categories.name AS category_name FROM movies JOIN categories ON movies.category_id = categories.id 
        WHERE movies.title LIKE :name");
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($results);
        // echo "<img src='" . $results[0]['image_url'] . "'>";
    }
}

