<?php
$host = 'db';
$user = 'user';
$pass = 'pass';
$dbn = 'mydb';

$dsn = 'mysql:host=' . $host . ';dbname=' . $dbn;

try {
    $pdo = new PDO($dsn, $user, $pass);
} catch (PDOException $exception) {
    echo 'Error :' . $exception->getMessage();
    die;
}


function getPopularMovies()
{
    $url = "https://api.themoviedb.org/3/movie/popular?language=en-US&page=1";

    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => $url,
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
    } else {
        $data = json_decode($response, true);

        if (json_last_error() === JSON_ERROR_NONE) {
            return $data;
        } else {
            echo "Error decoding JSON: " . json_last_error_msg();
        }
    }
}

$datapopular = getPopularMovies();

if ($datapopular && isset($datapopular['results'][0])) {
    $firstMovie = $datapopular['results'][0];
    
    foreach ($firstMovie as $key => $value) {
        if (is_array($value)) {
            echo "<strong>$key:</strong><br>";
            foreach ($value as $subKey => $subValue) {
                echo "$subKey: $subValue<br>";
            }
        } else {
            echo "<strong>$key:</strong> $value<br>";
        }
    }
} else {
    echo "No data available or error in fetching data.";
}
echo "<br>";

// if ($datapopular !== null) {
//     if (isset($datapopular['results'])) {
//         foreach ($datapopular['results'] as $movie) {
//             echo "Title: " . $movie['title'] . "<br>";
//             echo "Release Date: " . $movie['release_date'] . "<br>";
//             echo "Overview: " . $movie['overview'] . "<br><br>";
//         }
//     }
// }

function get_genre(){
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
    } else {
        echo $response;
    }
}

$genre_data = get_genre();

if ($genre_data && isset($genre_data['genres'])) {
    echo "<h2>Genres:</h2>";
    foreach ($genre_data["genres"] as $genre) {
        echo "L'id " . $genre['id'] . " est pour " . $genre['name'] . "<br>";
    }
} else {
    echo "No genre data available or error in fetching data.";
}