<?php
// session_start(); // commence session
function logout()
{
    session_destroy(); // ferme session
    header("Location: main.php"); // renvoie sur main
    exit();
}
