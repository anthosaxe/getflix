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
  <nav class="navbar" id="navbar-color">
    <div class="container-fluid">
      <a href= "./main.php" class="navbar-brand" id="custom-color">FailFlix</a>
      <form class="d-flex ms-auto" role="search">        <input class="form-control me-2" type="search" placeholder="Tu veux quoi ?" aria-label="Search">
        <button class="btn btn-success" type="submit">Rechercher</button>
      </form>
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