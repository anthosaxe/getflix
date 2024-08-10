let movies = [];
    let currentPage = 0;
    const moviesPerPage = 12;
    let currentSearch = ''; // Track the current search term or genre

    document.addEventListener("DOMContentLoaded", function() {
      const genre = "comedy";
      currentSearch = `Genre: Comedy`;
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
      searchDisplay.classList = 'text-white mb-3';

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
        movieImg.className = 'w-full h-full object-cover rounded-lg';

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
      const pageNumbers = document.getElementById('page-numbers');
      pageNumbers.innerHTML = ''; // Clear the current page numbers

      if (movies.length > moviesPerPage) {
        paginationControls.classList.remove('hidden');
      } else {
        paginationControls.classList.add('hidden');
        return; // No need to update pagination if there's only one page
      }

      // Determine the range of page numbers to display
      let startPage = Math.max(0, currentPage - 2);
      let endPage = Math.min(totalPages - 1, currentPage + 2);

      if (currentPage < 2) {
        endPage = Math.min(totalPages - 1, 4);
      } else if (currentPage > totalPages - 3) {
        startPage = Math.max(0, totalPages - 5);
      }

      // Add the page number buttons
      for (let i = startPage; i <= endPage; i++) {
        const pageNumberButton = document.createElement('button');
        pageNumberButton.textContent = i + 1;
        pageNumberButton.className = 'px-3 py-1 rounded-lg';

        if (i === currentPage) {
          pageNumberButton.classList.add('bg-gray-400', 'text-white');
        } else {
          pageNumberButton.classList.add('bg-gray-200', 'text-gray-700');
        }

        pageNumberButton.addEventListener('click', () => {
          currentPage = i;
          displayMovies();
          updatePaginationControls();
        });

        pageNumbers.appendChild(pageNumberButton);
      }

      // Update the disabled state of the navigation buttons
      document.getElementById('prev-btn').disabled = currentPage === 0;
      document.getElementById('next-btn').disabled = currentPage >= totalPages - 1;
    }