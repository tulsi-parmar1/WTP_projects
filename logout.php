<?php
session_start();
session_unset();   // removes all session variables
session_destroy(); // destroys the session completely

// redirect to login page
header("Location: login.php");
exit();
?>