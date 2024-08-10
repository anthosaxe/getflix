<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>FailFlix</title>
  <link href="./css/style.css" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

  <div class="flex flex-col h-screen justify-between">
    <header>
      <nav class="color-class border-gray-200 fixed w-full top-0 left-0 z-50 bg-gray-900">
        <div class="container mx-auto p-4">
          <div class="flex flex-wrap justify-between items-center">
            <a href="./index.php" class="flex items-center space-x-3 rtl:space-x-reverse">
              <img src="./images/cochon.jpg" class="h-8" />
              <span class="self-center text-2xl font-semibold whitespace-nowrap text-white">FailFlix</span>
            </a>

            <button class="inline-flex items-center p-2 w-12 h-8 text-sm text-gray-500 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="nav-menu" aria-expanded="false">
              <a href="login.php">login</a>
            </button>
          </div>
        </div>
      </nav>
    </header>

    <main class="">
      <div class="flex flex-wrap w-full pb-0 mb-0 h-full">
        <div class="sidebar p-2 w-full md:w-1/4 lg:w-1/5">
          <form class="flex items-center max-w-sm mx-auto mb-4 lg:mx-16" method="POST" action="./include/filter_db.php">
            <label for="simple-search" class="sr-only">Search</label>
            <div class="relative w-full">
              <input
                type="text"
                id="simple-search"
                name="name"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Search movie title..."
                required />
              <button
                type="submit"
                class="absolute inset-y-0 right-0 flex items-center px-3 text-sm font-medium text-white rounded-lg border bg-gray-400 hover:bg-black ">
                <svg class="w-4 h-4" id="svs" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
                <span class="sr-only">Search</span>
              </button>
            </div>
          </form>

          <div id="genre" class="flex flex-wrap">
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



        <div class="w-full md:w-3/4 lg:w-4/5 p-4">
          <div id="search-display" class="text-xl font-bold mb-4"></div>
          <div id="movie-grid" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 lg:mr-20"></div>

          <!-- Section de pagination modifiée -->
          <div id="pagination-controls" class="flex justify-center mt-8 lg:mr-20">
            <button id="prev-btn" class="mr-2 px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-800" onclick="changePage(-1)">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
              </svg>
            </button>
            <div id="page-numbers" class="flex space-x-2"></div>
            <button id="next-btn" class="ml-2 px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-800" onclick="changePage(1)">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
              </svg>
            </button>
          </div>
        </div>
      </div>
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

  <script src="./ind-script.js"></script>

</body>

</html>