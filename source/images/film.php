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
  </style>
</head>
<body class="body-color">
  <nav class="color-class border-gray-200">
    <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-4">
      <a href="./main.php" class="flex items-center space-x-3 rtl:space-x-reverse">
        <img src="./images/cochon.jpg" class="h-8" alt="Flowbite Logo" />
        <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">FailFlix</span>
      </a>
      <div class="flex items-center space-x-6 rtl:space-x-reverse">
        <a href="login.php" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Login</a>
      </div>
    </div>
  </nav>

  <div class="container mx-auto px-4">
    <div id="movie-grid" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4"></div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      fetchMovies({ name: 'p' });
    });

    function fetchMovies(filter) {
      fetch('./include/filter_db.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify(filter),
      })
      .then(response => response.json())
      .then(data => {
        const movieGrid = document.getElementById('movie-grid');
        movieGrid.innerHTML = '';

        data.forEach(movie => {
          const movieDiv = document.createElement('div');
          movieDiv.className = 'relative group w-full';
          
          const movieImg = document.createElement('img');
          movieImg.src = movie.image_url;
          movieImg.alt = 'Movie Poster';
          movieImg.className = 'w-full h-full object-cover';
          
          const overlayDiv = document.createElement('div');
          overlayDiv.className = 'absolute inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center opacity-0 overlay transition-opacity duration-300';
          
          const textDiv = document.createElement('div');
          textDiv.className = 'text-center text-white';
          
          const title = document.createElement('h2');
          title.className = 'text-2xl font-bold';
          title.textContent = movie.title;
          
          const rating = document.createElement('p');
          rating.className = 'mt-2 text-lg';
          rating.textContent = `Note: ${movie.rating}`;
          
          textDiv.appendChild(title);
          textDiv.appendChild(rating);
          overlayDiv.appendChild(textDiv);
          movieDiv.appendChild(movieImg);
          movieDiv.appendChild(overlayDiv);
          
          movieGrid.appendChild(movieDiv);
        });
      })
      .catch(error => console.error('Error fetching data:', error));
    }
  </script>
</body>
</html>