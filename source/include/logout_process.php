<?php
function logout()
{
    session_unset(); // Unset all session variables
    session_destroy(); // Destroy the session itself
    exit();
}

// Call the logout function

logout();
?>