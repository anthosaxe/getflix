<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>FailFlix</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="./css/style.css" rel="stylesheet">
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
      </div>
    </div>
  </nav>
  <form action="index.php" method="post" class="container-form">
    <div>
      <h2>Mot de passe oublié</h2>
    </div>
    <br>
    <div class="mb-3">
      <label for="userName">Nom d'utilisateur</label>
      <input type="text" placeholder="Nom d'utilisateur" required>
    </div>
    <div class="mb-3">
      <label for="userEmail">Email</label>
      <input type="mail" placeholder="email ici !" required>
    </div>
    <div class="mb-3">
      <label for="userPassword">Le nouveau</label>
      <input type="password" placeholder="Votre mot de passe" required>
    </div>
    <div class="mb-3">
      <label for="userPassword">Confirmer</label>
      <input type="password" placeholder="Votre mot de passe" required>
    </div>
    <br>

    <div class="mb-3">
      <input type="submit">
    </div>
  </form>


  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>