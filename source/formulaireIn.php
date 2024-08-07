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
            <a class="nav-link" href="#">About us</a>
          </li>
        <li class="nav-item">
     <a class="nav-link" href="#" >Team</a>
        </li>
          
        </ul>
      </div>
    </div>
  </nav>

  <div class="container mt-5 pt-5">
    <form action="./formulaireIn.php" method="post" class="container-form mt-4">
      <div>
        <h2>Formulaire de bienvenue</h2>
      </div>
      <br>
      <div class="mb-3">
        <label for="userName" class="form-label">Nom d'utilisateur</label>
        <input type="text" class="form-control" id="userName" placeholder="Nom d'utilisateur" required>
      </div>
      <div class="mb-3">
        <label for="userEmail" class="form-label">Email</label>
        <input type="email" class="form-control" id="userEmail" placeholder="email ici !" required>
      </div>
      <div class="mb-3">
        <label for="userPassword" class="form-label">Mot de passe</label>
        <input type="password" class="form-control" id="userPassword" placeholder="Votre mot de passe" required>
      </div>
      <div class="mb-3">
        <label for="confirmPassword" class="form-label">Taper à nouveau</label>
        <input type="password" class="form-control" id="confirmPassword" placeholder="Votre mot de passe" required>
      </div>
      <div class="mb-3">
        <label for="Abonnement" class="form-label">Quel abonnement ?</label>
        <select class="form-select" id="Abonnement" required>
          <option value="Option 1">Albert Einstein</option>
          <option value="Option 2">Faker</option>
          <option value="Option 3">Lionel Messi</option>
          <option value="Option 4">Charles Bukowski</option>
        </select>
      </div>
      <br>
      <div>
        <p>En soumettant ce formulaire, vous acceptez que FailFlix utilise vos données conformément à notre <a href="./confidential.php">Politique de Confidentialité</a>.
        </p>
      </div>
      <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="newsletter" name="newsletter" required>
        <label class="form-check-label" for="newsletter">Abonnez-vous à notre newsletter</label>
      </div>
      <div class="mb-3">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
