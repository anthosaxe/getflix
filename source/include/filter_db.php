<?php
include "connect.php";

function get_by_genre(){
    $pdo = connect();
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        if (isset($_POST["genre"]) && !empty($_POST["genre"])) {
            $genre = $_POST["genre"];
            $stmt = $pdo->prepare("SELECT movies.*, categories.name AS category_name FROM movies JOIN categories ON movies.category_id = categories.id 
                WHERE categories.name = :genre");
            $stmt->bindParam(':genre', $genre, PDO::PARAM_STR);
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } else {
            return ["error" => "Genre not specified"];
        }
    }
}


function get_by_name(){
    $pdo = connect();
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        if (isset($_POST["name"]) && !empty($_POST["name"])) {
            $name = $_POST["name"];
            $name = "%$name%";
            $stmt = $pdo->prepare("SELECT movies.*, categories.name AS category_name FROM movies JOIN categories ON movies.category_id = categories.id 
            WHERE movies.title LIKE :name");
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } else {
            return ["error" => "Name not specified"];
        }
    }
}


