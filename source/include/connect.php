<?php

function connect()
{
    $host = 'db';
    $user = 'user';
    $pass = 'pass';
    $dbn = 'mydb';

    $dsn = 'mysql:host=' . $host . ';dbname=' . $dbn;

    try {
        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $exception) {
        echo 'Error :' . $exception->getMessage();
        die;
    }
}



// function getPopularMovies()
// {
//     $url = "https://api.themoviedb.org/3/movie/popular?language=en-US&page=1";

//     $curl = curl_init();

//     curl_setopt_array($curl, [
//         CURLOPT_URL => $url,
//         CURLOPT_RETURNTRANSFER => true,
//         CURLOPT_ENCODING => "",
//         CURLOPT_MAXREDIRS => 10,
//         CURLOPT_TIMEOUT => 30,
//         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//         CURLOPT_CUSTOMREQUEST => "GET",
//         CURLOPT_HTTPHEADER => [
//             "Authorization: Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiI3ZTczNmY0NzJmNmVjYTY1Nzg0ZDUxYTA3OTBiZTAzZiIsIm5iZiI6MTcyMjQxOTM3OS45MjkyNDMsInN1YiI6IjY2YTlmYzkxMzhlZjMwMDkxMjc1NjlmMiIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.84sHgCoX5lee3SOCv7yCwvHN-ReXYxa1Vi0DVVuGLiA",
//             "accept: application/json"
//         ],
//     ]);

//     $response = curl_exec($curl);
//     $err = curl_error($curl);

//     curl_close($curl);

//     if ($err) {
//         echo "cURL Error #:" . $err;
//     } else {
//         $data = json_decode($response, true);

//         if (json_last_error() === JSON_ERROR_NONE) {
//             return $data;
//         } else {
//             echo "Error decoding JSON: " . json_last_error_msg();
//         }
//     }
// }

// $datapopular = getPopularMovies();

// if ($datapopular) {
//     if (isset($datapopular['results'])) {
//         foreach ($datapopular['results'] as $movie) {

//             foreach ($movie as $key => $value) {
//                 if ($key == "title" || $key == "overview" || $key == "release_date" || $key == "vote_average" || $key == "genre_ids" || $key == "poster_path") {
//                 if (is_array($value)) {
//                     echo "<strong>$key:</strong><br>";
//                     foreach ($value as $subKey => $subValue) {
//                         echo "$subKey: $subValue<br>";
//                     }
//                 } else {
//                     echo "<strong>$key:</strong> $value<br>";
//                 }
//             }
//         }
//         }
//     }
// } else {
//     echo "No data available or error in fetching data.";
// }
// echo "<br>";

// if ($datapopular !== null) {
//     if (isset($datapopular['results'])) {
//         foreach ($datapopular['results'] as $movie) {
//             echo "Title: " . htmlspecialchars($movie['title']) . "<br>";
//             echo "Overview: " . htmlspecialchars($movie['overview']) . "<br>";
//             echo "Release Date: " . htmlspecialchars($movie['release_date']) . "<br>";
//             echo "Vote Average: " . htmlspecialchars($movie['vote_average']) . "<br>";
//             if (isset($movie['genre_ids']) && is_array($movie['genre_ids'])) {
//                 foreach ($movie['genre_ids'] as $genre_id) {
//                     if (isset($genres[$genre_id])) { // Assuming you have a $genres array that maps genre IDs to genre names
//                         echo "Genre: " . htmlspecialchars($genres[$genre_id]) . "<br>";
//                     }
//                 }
//             }
//             if (!empty($movie['backdrop_path'])) {
//                 echo "Image: <br> <img src=\"" . htmlspecialchars($movie['backdrop_path']) . "\" alt=\"Movie Image\"><br><br>";
//             }
//         }
//     }
// }

function get_genre()
{
    /*
    create a table with id as key and dedicated value
    */
    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://api.themoviedb.org/3/genre/movie/list?language=en",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "Authorization: Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiI3ZTczNmY0NzJmNmVjYTY1Nzg0ZDUxYTA3OTBiZTAzZiIsIm5iZiI6MTcyMjQxOTM3OS45MjkyNDMsInN1YiI6IjY2YTlmYzkxMzhlZjMwMDkxMjc1NjlmMiIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.84sHgCoX5lee3SOCv7yCwvHN-ReXYxa1Vi0DVVuGLiA",
            "accept: application/json"
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
        return null; // Return null if there's an error
    } else {
        return json_decode($response, true); // Decode the JSON response into an associative array
    }
}

function get_genre_array()
{
    $genre_data = get_genre();
    $genre_array = array();

    if ($genre_data && isset($genre_data['genres'])) {
        foreach ($genre_data["genres"] as $genre) {
            $genre_array[$genre['id']] = $genre['name'];
        }
    } else {
        echo "No genre data available or error in fetching data.";
    }

    return $genre_array;
}




// for($number=1;$number<=100;$number++){
//     $baseUrl = "https://api.themoviedb.org/3/discover/movie?include_adult=true&include_video=false&language=en-US&page=$number&sort_by=popularity.desc&vote_average.gte=0.1&vote_average.lte=5&vote_count.gte=100";

// // Set up the cURL options
// $curl = curl_init();
// curl_setopt_array($curl, [
//     CURLOPT_URL => $baseUrl,
//     CURLOPT_RETURNTRANSFER => true,
//     CURLOPT_ENCODING => "",
//     CURLOPT_MAXREDIRS => 10,
//     CURLOPT_TIMEOUT => 30,
//     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//     CURLOPT_CUSTOMREQUEST => "GET",
//     CURLOPT_HTTPHEADER => [
//         "Authorization: Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiI3ZTczNmY0NzJmNmVjYTY1Nzg0ZDUxYTA3OTBiZTAzZiIsIm5iZiI6MTcyMjQxOTM3OS45MjkyNDMsInN1YiI6IjY2YTlmYzkxMzhlZjMwMDkxMjc1NjlmMiIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.84sHgCoX5lee3SOCv7yCwvHN-ReXYxa1Vi0DVVuGLiA",
//         "accept: application/json"
//     ],
// ]);

// // Execute the cURL request and get the response
// $response = curl_exec($curl);

// // Check for cURL errors
// if ($response === false) {
//     echo "cURL Error: " . curl_error($curl);
//     curl_close($curl);
//     exit();
// }

// // Close the cURL session
// curl_close($curl);

// // Decode the JSON response
// $data = json_decode($response, true);

// // Check if results are present and display them
// if (isset($data['results']) && is_array($data['results'])) {
//     foreach ($data['results'] as $movie) {
//             echo "Title: " . htmlspecialchars($movie['title']) . "<br>";
//             echo "Overview: " . htmlspecialchars($movie['overview']) . "<br>";
//             echo "Release Date: " . htmlspecialchars($movie['release_date']) . "<br>";
//             echo "Vote Average: " . htmlspecialchars($movie['vote_average']) . "<br>";
//             echo "Vote Count: " . htmlspecialchars($movie['vote_count']) . "<br>";
//         if (!empty($movie['backdrop_path'])) {
//             echo "Image: <br> <img src=\"https://image.tmdb.org/t/p/w500" . htmlspecialchars($movie['backdrop_path']) . "\" alt=\"Movie Image\"><br><br>";
//         }
//         echo "<hr>";
//         }
//     } else {
//     echo "No results found.";
//         }
// }