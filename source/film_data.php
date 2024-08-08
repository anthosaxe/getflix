<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Film Data</title>
  <link href="./css/style.css" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    .group:hover .overlay {
      opacity: 1;
    }

    .color-class {
      background-color: #4853e4;
    }

    body {
      padding-top: 72px;
      /* Adjust this value based on the actual height of your navbar */
    }

    .no-text-select {
      cursor: default;
    }

    ;

    /* Add any additional styles you need here */
    .movie-detail {
      margin: 20px;
    }

    .movie-detail img {
      max-width: 100%;
    }
  </style>
</head>

<body class="bg-gray-100">

  <nav class="color-class border-gray-200 fixed w-full top-0 left-0 z-50">
    <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-4">
      <a href="./index.php" class="flex items-center space-x-3 rtl:space-x-reverse">
        <img src="./images/cochon.jpg" class="h-8" alt="Flowbite Logo" />
        <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">FailFlix</span>
      </a>
    </div>
  </nav>

  <div class="container mx-auto px-4 mt-4">
    <div id="movie-detail" class="movie-detail"></div>
  </div>

  <div>
    <section class="bg-white dark:bg-gray-900 py-8 lg:py-16 antialiased">
      <div class="max-w-2xl mx-auto px-4">
        <div class="flex justify-between items-center mb-6">
          <h2 class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white">Discussion (20)</h2>
        </div>
        <form class="mb-6">
          <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
            <label for="comment" class="sr-only">Your comment</label>
            <textarea id="comment" rows="6" class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800" placeholder="Write a comment..." required></textarea>
          </div>
          <button type="submit" class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
            Post comment
          </button>
        </form>

      </div>
    </section>
  </div>
  <footer class="bg-white shadow dark:bg-gray-900">
    <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8 flex justify-between items-center">
      <div class="flex flex-col sm:flex-row items-start">
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
      </div>
      <div class="text-sm text-gray-500 dark:text-gray-400">
        © 2024 <a href="#" class="hover:underline">Failflix-corp</a>. All Rights Reserved.
      </div>
    </div>
  </footer>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Get the movie name from URL parameters
      const urlParams = new URLSearchParams(window.location.search);
      const movieName = urlParams.get('name');

      if (movieName) {
        fetchMovieData(movieName);
      } else {
        console.error('No movie name provided in the URL.');
      }
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
        <h1 class="text-3xl font-bold">${movie.title}</h1>
        <img src="${movie.image_url}" alt="Movie Poster" class="my-4">
        <p><strong>Genre:</strong> ${movie.category_name}</p>
        <p><strong>Rating:</strong> ${movie.rating}</p>
        <p><strong>Description:</strong> ${movie.description}</p>
      `;
    }
  </script>
</body>

</html>