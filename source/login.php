<?php
include "db_connect.php";
if (isset($_POST['uname']) && isset($_POST['password'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    };

    $uname = validate($_POST['uname']);
    $password = validate($_POST['password']);

    if (empty($uname)) {
        header("Location: index.php?error=User Name is required");
        exit();
    } else if (empty($password)) {
        header("Location: index.php?error=Password Name is required");
        exit();
    } else {
        $sql = "SELECT * FROM users WHERE user_name = '$uname' AND password ='$password'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result)) {
            echo "Hello, this just worked";
        }
    };
} else {
    header("Location: index.php?error");
    exit();
};
