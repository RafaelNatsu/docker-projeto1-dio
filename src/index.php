<?php
    echo '<h1>Hello World!</h1><br>';
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $mysqli = new mysqli("mysql_database", 'myUser' , 'myPassword', 'myDatabase');

    if ($mysqli->connect_error) {
        echo "Not connected, error: " . $mysqli_connection->connect_error;
     }
     else {
        echo "Database: Connected.";
     }