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
<nav class="navbar navbar-expand-lg" id="navbar-color">
        <div class="container-fluid">
            <div class="d-flex ms-auto">
            <input class="form-control me-2" type="search" placeholder="Tu veux quoi ?" aria-label="Search">
                <button class="btn btn-success" type="submit">Rechercher</button>
            </div>
            <div>
                <a href="#"><button>profil</button></i></a>
            </div>
        </div>
    </nav>
   
    <div>
    <i class="fas fa-sliders-h" id="filtre-video"></i>
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

    <div class="text-video">    
<h3>Suggestions</h3>
<?php
/*DATA BASE*/
?>
<br><br><br>
<h3>Reprendre</h3>
<?php
/*DATA BASE*/
?>
<br><br><br>

<h3>Non recommandé</h3>
<?php
/*DATA BASE*/
?>
<br><br><br>

<h3>Action</h3>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="./js/script.js"></script>
</body>

</html>