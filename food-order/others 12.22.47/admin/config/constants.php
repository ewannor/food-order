<?php

    //debug
    echo "\nconstants file opened\n";

    //Create constants to store non repeating values
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'food-order');

    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD);

    if (!$conn) {
        echo "no conn";
        die("Database connection failed:"); //Database connection
    }

    
    echo "<br> after conn check executed";
    
    $db_select = mysqli_select_db($conn, DB_NAME) or die("Failed to select database:" . mysqli_error($conn)); // Selecting Database

?>