<?php
session_start(); // commence session
session_destroy(); // ferme session
header("Location: main.php"); // renvoie sur main
exit();
