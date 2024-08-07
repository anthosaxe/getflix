<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="./css/style.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/d6bd908ca7.js" crossorigin="anonymous"></script>
</head>

<body class="body-color">
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="navbar-color">
    <div class="container-fluid">
      <a class="navbar-brand" href="./main.php" id="custom-color">FailFlix</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="#">About us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact us</a>
          </li>
        <li class="nav-item">
     <a class="nav-link" href="#" >Team</a>
        </li>
        </ul>
            <div class="d-flex ms-auto">
            <input class="form-control me-2" type="search" placeholder="Tu veux quoi ?" aria-label="Search">
                <button class="btn btn-success" type="submit">Rechercher</button>
            </div>
       
      </div>
    </div>
  </nav>
  <br>
  <br>
  <br> 
  <div class="filter-box">
        <input type="checkbox" id="filter-toggle">
        <div class="btn-filter">
            <label for="filter-toggle">
                <i class="fa-solid fa-sliders"></i>
                Genres
            </label>
        </div>
        <div class="filter-menu">
            <div class="filter-content">
                <h4>Filtrer par Genre</h4>
                <div class="genre-buttons">
                    <button class="genre-btn" data-genre="Action">Action</button>
                    <button class="genre-btn" data-genre="Adventure">Aventure</button>
                    <button class="genre-btn" data-genre="Animation">Animation</button>
                    <button class="genre-btn" data-genre="Comedy">Comédie</button>
                    <button class="genre-btn" data-genre="Crime">Crime</button>
                    <button class="genre-btn" data-genre="Documentary">Documentaire</button>
                    <button class="genre-btn" data-genre="Drama">Drame</button>
                    <button class="genre-btn" data-genre="Family">Famille</button>
                    <button class="genre-btn" data-genre="Fantasy">Fantaisie</button>
                    <button class="genre-btn" data-genre="History">Histoire</button>
                    <button class="genre-btn" data-genre="Horror">Horreur</button>
                    <button class="genre-btn" data-genre="Music">Musique</button>
                    <button class="genre-btn" data-genre="Mystery">Mystère</button>
                    <button class="genre-btn" data-genre="Romance">Romance</button>
                    <button class="genre-btn" data-genre="ScienceFiction">Science Fiction</button>
                    <button class="genre-btn" data-genre="Thriller">Thriller</button>
                    <button class="genre-btn" data-genre="TvMovie">TV Movie</button>
                    <button class="genre-btn" data-genre="War">Guerre</button>
                    <button class="genre-btn" data-genre="Western">Western</button>
                </div>
            </div>
        </div>
    </div>

    
    <div class="main-box">
        <input type="checkbox" id="check">
        <div class="btn-one">
            <label for="check">
                <i class="fas fa-bars"></i>
            </label>
        </div>
        <div class="sidebar_menu">
            <div class="logo">
                <a href="#">FailFlix</a>
            </div>
            <div class="btn-two">
                <label for="check">
                    <i class="fas fa-times"></i>
                </label>
            </div>
            <div class="menu">
                <ul>
                    <li><a href="genres.php"><i class="fa-solid fa-eye"></i>
                            Genres</a></li>
                    <li><a href="series.php"><i class="fa-solid fa-clapperboard"></i>
                            Séries</a></li>
                    <li><a href="films.php"><i class="fa-solid fa-film"></i>
                            Films</a></li>
                    <li><a href="maListe.php"><i class="fa-solid fa-face-kiss-wink-heart"></i>
                            Ma liste</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="text-video" id="contenu">    
<h3>Suggestions</h3>

<br><br><br>
<h3>Reprendre</h3>
<?php
/*DATA BASE*/
?>
<br><br><br>

<h3>Action</h3>
<?php
/*DATA BASE*/
?>
<br><br><br>

<h3>Aventure</h3>
<?php
/*DATA BASE*/
?>
<br><br><br>

<h3>Comédie</h3>
<?php
/*DATA BASE*/
?>
<br><br><br>

<h3>Fantastique</h3>
<?php
/*DATA BASE*/
?>
  </div>

  <footer>

  </footer>

<script>
    // Récupérer les éléments de la fenêtre modale
    const genreModal = document.getElementById('genreModal');
    const genreBtn = document.getElementById('genreBtn');
    const closeBtn = document.querySelector('.close');

    // Ouvrir la fenêtre modale lorsque l'utilisateur clique sur le bouton Genre
    genreBtn.onclick = function() {
        genreModal.style.display = 'block';
    }

    // Fermer la fenêtre modale lorsque l'utilisateur clique sur le bouton de fermeture
    closeBtn.onclick = function() {
        genreModal.style.display = 'none';
    }

    // Fermer la fenêtre modale si l'utilisateur clique en dehors du contenu de la fenêtre modale
    window.onclick = function(event) {
        if (event.target === genreModal) {
            genreModal.style.display = 'none';
        }
    }

    // Gérer la sélection des boutons de genre
    document.querySelectorAll('.genre-btn').forEach(button => {
        button.onclick = function() {
            this.classList.toggle('active');
            filtrerContenu();
        }
    });

    // Fonction pour filtrer le contenu basé sur les genres sélectionnés
    function filtrerContenu() {
        const selectedGenres = Array.from(document.querySelectorAll('.genre-btn.active'))
            .map(button => button.getAttribute('data-genre'));

        console.log('Genres sélectionnés:', selectedGenres);
        // Ici, tu peux ajouter la logique pour filtrer les films selon les genres sélectionnés
        // Exemple : appeler une fonction de filtrage ou mettre à jour l'affichage
    }
</script>
  </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="./js/script.js"></script>
</body>

</html>