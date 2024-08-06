<?php
include "connect.php";

function get_by_genre($genre) {
    $pdo = connect();
    $stmt = $pdo->prepare("SELECT movies.*, categories.name AS category_name FROM movies JOIN categories ON movies.category_id = categories.id 
        WHERE categories.name = :genre");
    $stmt->bindParam(':genre', $genre, PDO::PARAM_STR);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

function get_by_name($name) {
    $pdo = connect();
    $name = "%$name%";
    $stmt = $pdo->prepare("SELECT movies.*, categories.name AS category_name FROM movies JOIN categories ON movies.category_id = categories.id 
        WHERE movies.title LIKE :name");
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

function show_films($data){
    foreach($data as $res){
        echo "<div class='relative group w-full'>";
        echo "<a>";
        echo "<img src='".$res['image_url']."' alt='Movie Poster' class='w-full h-full object-cover'>";
        echo "<div class='absolute inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center opacity-0 overlay transition-opacity duration-300'>";
        echo "<div class='text-center text-white'>";
        echo "<h2 class='text-2xl font-bold'>".$res['title']."</h2>";
        echo "<p class='mt-2 text-lg'>Note: ".$res['rating']."</p>";
        echo "</div>";
        echo "</div>";
        echo "</a>";
        echo "</div>";
      }
}

$results = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['genre']) && !empty($_POST['genre'])) {
        $genre = $_POST['genre'];
        echo '<h1 class="text-5xl font-extrabold dark:text-white">'.$genre.'</h1>';
        $results = get_by_genre($genre);
        show_films($results);
    } elseif (isset($_POST['name']) && !empty($_POST['name'])) {
        $name = $_POST['name'];
        echo '<h1 class="text-5xl font-extrabold dark:text-white"> Recherche pour : '.$Name.'</h1>';
        $results = get_by_name($name);
        show_films($results);
    } else {
        $results = ["error" => "Search type or value not specified"];
    }
}



