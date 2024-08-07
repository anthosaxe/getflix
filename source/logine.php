<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>FailFlix</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="./css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl7/5cr3YLX+1j9kl8AJlt4Ksf6V4YzJ+ozw5YP4d8" crossorigin="anonymous">
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
            <a class="nav-link" href="#">À Propos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contactez-nous</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Équipe</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <br><br><br>
  <div class="container">
    <div class="log-box">
      <h1 id="title">Inscription</h1>
      <form action="logine.php">
        <div class="input-group">
          <div class="input-field" id="nameField">
            <i class="fa-solid fa-user"></i>
            <input type="text" id="nameInput" placeholder="Nom" required class="input">
          </div>
          <div class="input-field" id="emailField">
            <i class="fa-solid fa-envelope"></i>
            <input type="email" id="emailInput" placeholder="Email" required class="input">
          </div>
        </div>
        <div class="input-field" id="passwordField">
          <i class="fa-solid fa-lock"></i>
          <input type="password" id="passwordInput" placeholder="Mot de passe" required class="input">
        </div>
    
        <div>
          <p>Mot de passe perdu ? <a href="#">Cliquez ici !</a></p>
        </div>
        <div class="btn-field">
          <button type="button" id="signupBtn1">S'inscrire</button>
          <button type="button" id="signupBtn2" class="disable">Connexion</button>
        </div>
      </form>
    </div>
  </div>

  <!-- js -->
  <script>
    document.addEventListener("DOMContentLoaded", function() {
        console.log("Test JavaScript en ligne : DOM entièrement chargé et analysé");

        let signupBtn = document.getElementById("signupBtn1");
        let signinBtn = document.getElementById("signupBtn2");
        let nameField = document.getElementById("nameField");
        let emailField = document.getElementById("emailField");
        let passwordField = document.getElementById("passwordField");
        let title = document.getElementById("title");

        console.log("Éléments récupérés :", { signupBtn, signinBtn, nameField, emailField, passwordField, title });

        signinBtn.onclick = function(){
            console.log("Bouton Connexion cliqué");
            nameField.style.display = "none";
            emailField.querySelector('input').setAttribute('placeholder', 'Nom');
            title.innerHTML = "Connexion";
            signupBtn.classList.add("disable");
            signinBtn.classList.remove("disable");
        }

        signupBtn.onclick = function(){
            console.log("Bouton Inscription cliqué");
            nameField.style.display = "flex";
            emailField.querySelector('input').setAttribute('placeholder', 'Email');
            title.innerHTML = "Inscription";
            signupBtn.classList.remove("disable");
            signinBtn.classList.add("disable");
        }
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="./js/script.js"></script>
</body>

</html>
