<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>FailFlix</title>
  <link href="./css/style.css" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    .group:hover .overlay {
      opacity: 1;
    }

    .color-class {
      background-color: #4853e4;
    }

    html,
    body {
      height: 100%;
    }

    body {
      padding-top: 72px;
      display: flex;
      flex-direction: column;
    }

    .no-text-select {
      cursor: default;
    }

    .sidebar {
      background-color: #1c1c1e;
      min-height: 100vh;
    }

    .genre-button {
      width: 100%;
      color: white;
      transition: background-color 0.3s;
    }

    .genre-button:hover {
      background-color: #0056b3;
    }

    html,
    body {
      height: 100%;
      margin: 0;
      display: flex;
      flex-direction: column;
    }

    body {
      min-height: 100vh;
    }

    footer {
      margin-top: auto;
    }
  </style>
</head>

<body class="body-color">
  <nav class="color-class border-gray-200 fixed w-full top-0 left-0 z-50">
    <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-4">
      <a href="./index.php" class="flex items-center space-x-3 rtl:space-x-reverse">
        <img src="./images/cochon.jpg" class="h-8" alt="Flowbite Logo" />
        <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">FailFlix</span>
      </a>
      <div class="flex items-center space-x-6 rtl:space-x-reverse">
        <a href="login.php" class="border text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Login</a>
      </div>
    </div>
  </nav>

  <div class="flex w-full">
    <div class="sidebar p-4 w-1/5">

      <form class="flex items-center max-w-sm mx-auto" method="POST" action="./include/filter_db.php">
        <label for="simple-search" class="sr-only">Search</label>
        <div class="relative w-full">
          <input type="text" id="simple-search" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search movie title..." required />
        </div>
        <button type="submit" class="p-2.5 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
          <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
          </svg>
          <span class="sr-only">Search</span>
        </button>
      </form>
      <div id="genre" class="">
        <button id="comedy" class="genre-button">Comedy</button>
        <button id="western" class="genre-button">Cow-boy</button>
        <button id="adventure" class="genre-button">Adventure</button>
        <button id="animation" class="genre-button">Animation</button>
        <button id="action" class="genre-button">Action</button>
        <button id="crime" class="genre-button">Crime</button>
        <button id="documentary" class="genre-button">Documentary</button>
        <button id="drama" class="genre-button">Drama</button>
        <button id="family" class="genre-button">Family</button>
        <button id="fantasy" class="genre-button">Fantasy</button>
        <button id="history" class="genre-button">History</button>
        <button id="horror" class="genre-button">Horror</button>
        <button id="music" class="genre-button">Music</button>
        <button id="mystery" class="genre-button">Mystery</button>
        <button id="romance" class="genre-button">Romance</button>
        <button id="science fiction" class="genre-button">Science-fiction</button>
        <button id="thriller" class="genre-button">Thriller</button>
        <button id="TV Movie" class="genre-button">TV Movie</button>
        <button id="war" class="genre-button">War</button>
      </div>
    </div>

    <div class="w-4/5 p-4 border-l border-r">
      <div id="search-display" class="text-xl font-bold mb-4"></div>
      <div id="movie-grid" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4"></div>
      <div id="pagination-controls" class="flex justify-center mt-4 hidden">
        <button id="prev-btn" class="mr-2 bg-blue-500 text-white px-4 py-2 rounded" onclick="changePage(-1)">Previous</button>
        <button id="next-btn" class="bg-blue-500 text-white px-4 py-2 rounded" onclick="changePage(1)">Next</button>
      </div>
    </div>

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
    let movies = [];
    let currentPage = 0;
    const moviesPerPage = 12;
    let currentSearch = ''; // Track the current search term or genre

    document.addEventListener("DOMContentLoaded", function() {
      const genre = "comedy";
      currentSearch = `Genre: 'comedy'`;
      fetchMoviesByGenre(genre);
    });

    // Fonction pour gérer la recherche par nom
    document.querySelector('form').addEventListener('submit', function(event) {
      event.preventDefault(); // Empêche l'envoi classique du formulaire

      const name = document.getElementById('simple-search').value;
      currentSearch = `Results for: "${name}"`;
      fetchMovieByName(name);
    });

    // Fonction pour gérer la recherche par genre
    document.querySelectorAll('#genre button').forEach(button => {
      button.addEventListener('click', (event) => {
        const genre = event.target.id;
        currentSearch = `Genre: ${event.target.textContent}`;
        fetchMoviesByGenre(genre);
      });
    });

    function fetchMoviesByGenre(genre) {
      fetch('./include/filter_db.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
          },
          body: new URLSearchParams({
            genre: genre
          })
        })
        .then(response => response.json())
        .then(data => {
          movies = data;
          displayMovies();
          updatePaginationControls();
        })
        .catch(error => console.error('Error fetching data:', error));
    }

    function fetchMovieByName(name) {
      fetch('./include/filter_db.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
          },
          body: new URLSearchParams({
            name: name
          })
        })
        .then(response => response.json())
        .then(data => {
          movies = data;
          displayMovies();
          updatePaginationControls();
        })
        .catch(error => console.error('Error fetching data:', error));
    }

    function displayMovies() {
      const movieGrid = document.getElementById('movie-grid');
      movieGrid.innerHTML = '';
      const searchDisplay = document.getElementById('search-display');
      searchDisplay.textContent = currentSearch; // Update the search display

      const start = currentPage * moviesPerPage;
      const end = start + moviesPerPage;
      const paginatedMovies = movies.slice(start, end);

      paginatedMovies.forEach(movie => {
        const movieDiv = document.createElement('div');
        movieDiv.className = 'relative group w-full';
        movieDiv.setAttribute('data-name', movie.title);

        const movieImg = document.createElement('img');
        movieImg.src = movie.image_url;
        movieImg.alt = 'Movie Poster';
        movieImg.className = 'w-full h-full object-cover';

        const overlayDiv = document.createElement('div');
        overlayDiv.className = 'absolute inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center opacity-0 overlay transition-opacity duration-300';

        const textDiv = document.createElement('div');
        textDiv.className = 'text-center text-white';

        const title = document.createElement('h2');
        title.className = 'text-xl font-bold no-text-select';
        title.textContent = movie.title;

        const rating = document.createElement('p');
        rating.className = 'mt-2 text-lg no-text-select';
        rating.textContent = `Note: ${movie.rating}`;

        textDiv.appendChild(title);
        textDiv.appendChild(rating);
        overlayDiv.appendChild(textDiv);
        movieDiv.appendChild(movieImg);
        movieDiv.appendChild(overlayDiv);

        movieDiv.addEventListener('click', () => {
          window.location.href = `film_data.php?name=${encodeURIComponent(movie.title)}`;
        });

        movieGrid.appendChild(movieDiv);
      });
    }

    function changePage(direction) {
      currentPage += direction;
      displayMovies();
      updatePaginationControls();
    }

    function updatePaginationControls() {
      const totalPages = Math.ceil(movies.length / moviesPerPage);
      const paginationControls = document.getElementById('pagination-controls');
      if (movies.length > moviesPerPage) {
        paginationControls.classList.remove('hidden');
      } else {
        paginationControls.classList.add('hidden');
      }
      document.getElementById('prev-btn').disabled = currentPage === 0;
      document.getElementById('next-btn').disabled = currentPage >= totalPages - 1;
    }
  </script>

</body>

</html>