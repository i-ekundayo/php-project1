<?php
    define('DB_HOST', 'localhost');
    define('DB_USER', 'Israel');
    define('DB_PASS', 'Ekundayo700');
    define('DB_NAME', 'student_profile');

    // Create connection
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    // Check connection
    if($conn->connect_error) {
        die('Connection Failed ' . $conn->connect_error);
    }
?>