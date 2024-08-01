<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <title>Login Page</title>
</head>

<body>
    <h1>Login Page Test</h1>
    <?php if (isset($_GET['error'])) { ?>
    <p class="error">
        <?php echo $_GET['error']; ?>
    </p>
    <?php } ?>

    <form action="login.php" method="post">
        <label for="user">User Name</label>
        <input type="text" name="uname" placeholder="User Name">

        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Password Please">

        <button type="submit">Login, now!</button>

    </form>
</body>

</html>