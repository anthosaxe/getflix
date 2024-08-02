<?php
include "connect.php";

function fill_db() {
    $pdo = connect();

    for ($number = 1; $number <= 100; $number++) {
        $baseUrl = "https://api.themoviedb.org/3/discover/movie?include_adult=true&include_video=false&language=en-US&page=$number&sort_by=popularity.desc&vote_average.gte=0.1&vote_average.lte=5&vote_count.gte=100";

        // Set up the cURL options
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $baseUrl,
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

        // Execute the cURL request and get the response
        $response = curl_exec($curl);

        // Check for cURL errors
        if ($response === false) {
            echo "cURL Error: " . curl_error($curl);
            curl_close($curl);
            exit();
        }

        // Close the cURL session
        curl_close($curl);

        // Decode the JSON response
        $data = json_decode($response, true);

        // Check if results are present
        if (isset($data['results']) && is_array($data['results'])) {
            foreach ($data['results'] as $movie) {
                $title = $movie['title'];
                $description = $movie['overview'];
                $release_date = $movie['release_date'];
                $rating = $movie['vote_average'];
                $genre_ids = $movie['genre_ids'];
                $image_url = isset($movie['backdrop_path']) ? "https://image.tmdb.org/t/p/w500" . $movie['backdrop_path'] : NULL;

                foreach ($genre_ids as $genre_id) {
                    $genre_name = get_genre_name($genre_id, $pdo);

                    // Check if the category already exists
                    $stmt = $pdo->prepare("SELECT id FROM categories WHERE id = ?");
                    $stmt->execute([$genre_id]);
                    if ($stmt->rowCount() == 0) {
                        // Insert new category
                        $stmt = $pdo->prepare("INSERT INTO categories (id, name) VALUES (?, ?)");
                        $stmt->execute([$genre_id, $genre_name]);
                    }

                    // Insert movie data
                    $stmt = $pdo->prepare("INSERT INTO movies (title, description, release_date, rating, category_id, image_url) VALUES (?, ?, ?, ?, ?, ?)");
                    $stmt->execute([$title, $description, $release_date, $rating, $genre_id, $image_url]);
                }
            }
        } else {
            echo "No results found for page $number.<br>";
        }
    }
}

function get_genre_name($genre_id, $pdo) {
    // You can fetch genre names from TMDb or hardcode the values
    // Here, we'll use a simple hardcoded mapping for demonstration purposes

    $genres = [
        28 => 'Action',
        12 => 'Adventure',
        16 => 'Animation',
        35 => 'Comedy',
        80 => 'Crime',
        99 => 'Documentary',
        18 => 'Drama',
        10751 => 'Family',
        14 => 'Fantasy',
        36 => 'History',
        27 => 'Horror',
        10402 => 'Music',
        9648 => 'Mystery',
        10749 => 'Romance',
        878 => 'Science Fiction',
        10770 => 'TV Movie',
        53 => 'Thriller',
        10752 => 'War',
        37 => 'Western'
    ];

    return isset($genres[$genre_id]) ? $genres[$genre_id] : 'Unknown';
}

?>
