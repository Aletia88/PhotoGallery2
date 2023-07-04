<?php
session_start();

// Unset all session variables
session_unset();

// Destroy the session
session_destroy();

// Unset the cookie by setting an expired time in the past
setcookie("username", "", time() - 3600, "/");

// Redirect the user to the homepage or login page
header("Location: index.php"); 
exit();

?>