<?php
    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASSWORD', '');
    define('DATABASE', 'brgy');

    $conn = mysqli_connect(HOST, USER, PASSWORD, DATABASE)
        or die ("ERROR: Unable to connect to the database!");

    mysqli_select_db($conn, DATABASE) or die ("ERROR: Cannot access the database!");
?>