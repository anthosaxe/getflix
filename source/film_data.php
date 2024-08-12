<?php
session_start();
// include "./include/submit_comment.php";
// $nom = $_GET['name'];
// $session = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Film Data</title>
  <link href="./css/style.css" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="body-color">

  <div class="flex flex-col h-screen justify-between">
    <header>
      <nav class="color-class border-gray-200 fixed w-full top-0 left-0 z-50 bg-gray-900">
        <div class="container mx-auto p-4">
          <div class="flex flex-wrap justify-between items-center">
            <a href="./index.php" class="flex items-center space-x-3 rtl:space-x-reverse">
              <img src="./images/cochon.jpg" class="h-8" />
              <span class="self-center text-2xl font-semibold whitespace-nowrap text-white">FailFlix</span>
            </a>

            <?php
            if (isset($_SESSION['username']) && $_SESSION['username'] !== null) {
              echo '<div>';
              echo "<p class='text-white'>connected as " . htmlspecialchars($_SESSION['username']) . "</p>";
              echo '<button class="inline-flex text-center text-sm rounded-lg focus:outline-none focus:ring-2 text-gray-400 hover:bg-gray-700 focus:ring-gray-600">
                    <a href="logout.php">logout</a>
                    </button>';
              echo '</div>';
            } else {
              echo '<button class="inline-flex items-center p-2 w-12 h-8 text-sm rounded-lg focus:outline-none focus:ring-2 text-gray-400 hover:bg-gray-700 focus:ring-gray-600">
                    <a href="login.php">login</a>
                    </button>';
            }
            ?>
          </div>
        </div>
      </nav>
    </header>

    <main class="mb-auto">
      <div class="container mx-auto px-4 mt-20">
        <div id="movie-detail" class="text-white bg-gray-800 movie-detail flex p-6 rounded-lg shadow-md"></div>
      </div>

      <?php
      // Afficher le formulaire de commentaire uniquement si l'utilisateur est connecté
      if (isset($_SESSION['username']) && $_SESSION['username'] !== null) {
        echo '<div>
        <section class="body-color py-8 lg:py-16 antialiased">
          <div class="max-w-2xl mx-auto px-4">
            <div class="flex justify-between items-center mb-6">
              <h2 class="text-lg lg:text-2xl font-bold text-white">Leave a comment</h2>
            </div>
            <form id="comment-form" class="mb-6" method="post">
              <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                <label for="comment" class="sr-only">Your comment</label>
                <textarea id="comment" name="comment" rows="6" class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800" required></textarea>
              </div>
              <input type="hidden" id="movie-name" name="movie_name" value="">
              <button type="submit" class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                Post comment
              </button>
            </form>
          </div>
        </section>
      </div>';
      } else {
        echo '<div class="flex justify-center">
                <h1 class="text-4xl text-center text-white text-extrabold">
                    You need an account to comment and see details,<br>
                    <p class="text-white">Log in <a href="login.php" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">here</a></p>
                    <p class="text-white">Or register <a href="register.php" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">here</a></p>
                </h1>
            </div>';
      }
      ?>
    </main>

    <footer class="shadow bg-gray-900">
      <div class="container mx-auto p-4 md:py-8">
        <div class="flex flex-col sm:flex-row justify-between items-center">
          <ul class="flex flex-wrap justify-start mb-6 text-sm font-medium text-gray-500 sm:mb-0 dark:text-gray-400">
            <li>
              <a href="#" class="hover:underline me-4 md:me-6">About</a>
            </li>
            <li>
              <a href="#" class="hover:underline me-4 md:me-6">Privacy Policy</a>
            </li>
            <li>
              <a href="#" class="hover:underline me-4 md:me-6">Licensing</a>
            </li>
            <li>
              <a href="#" class="hover:underline">Contact</a>
            </li>
          </ul>
          <div class="text-sm text-gray-500 dark:text-gray-400">
            © 2024 <a href="#" class="hover:underline">Failflix-corp</a>. All Rights Reserved.
          </div>
        </div>
      </div>
    </footer>

  </div>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const urlParams = new URLSearchParams(window.location.search);
      const movieName = urlParams.get('name');
      document.getElementById('movie-name').value = movieName; // Set the movie name in the hidden input

      if (movieName) {
        fetchMovieData(movieName);
      } else {
        console.error('No movie name provided in the URL.');
      }

      // Handle form submission with AJAX
      document.getElementById('comment-form').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent default form submission
        submitComment(movieName); // Call the submitComment function
      });
    });

    function fetchMovieData(name) {
      fetch(`./include/filter_db.php?name=${encodeURIComponent(name)}`, {
          method: 'GET'
        })
        .then(response => {
          if (!response.ok) {
            throw new Error('Network response was not ok');
          }
          return response.json();
        })
        .then(data => {
          if (Array.isArray(data) && data.length > 0) {
            displayMovieDetails(data[0]);
          } else {
            console.log('No movie found with the name:', name);
          }
        })
        .catch(error => console.error('Error fetching data:', error));
    }

    function displayMovieDetails(movie) {
      const movieDetailDiv = document.getElementById('movie-detail');
      movieDetailDiv.innerHTML = `
        <div class="left-side w-1/2">
          <h1 class="text-2xl font-bold mb-4">${movie.title}</h1>
          <img src="${movie.image_url}" alt="Movie Poster" class="w-full max-w-sm rounded-lg shadow-md mb-4">
          <p class="rating text-xl"><strong>Rating:</strong> ${movie.rating}</p>
          <p class="genre text-lg"><strong>Genre:</strong> ${movie.category_name}</p>
        </div>
        <div class="right-side w-1/2 p-4 rounded-lg">
          <p class="text-gray-200">${movie.description}</p>
        </div>
      `;
    }

    function submitComment(movieName) {
      const comment = document.getElementById('comment').value;

      fetch('./include/submit_comment.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
          },
          body: new URLSearchParams({
            comment: comment,
            movie_name: movieName
          })
        })
        .then(response => {
          if (!response.ok) {
            throw new Error('Network response was not ok');
          }
          return response.text();
        })
        .then(data => {
          console.log('Comment submitted:', data);
          document.getElementById('comment-form').reset(); // Clear the form
        })
        .catch(error => console.error('Error submitting comment:', error));
    }
  </script>

</body>

</html>