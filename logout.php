<?php
# log out the user from the current session !
session_start();
session_destroy();
header("location: index.php");
echo '<script> alert("Logged out successfully.");</script>';
?>