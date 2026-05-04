<?php

function get_db_connection(): mysqli {
    static $conn = null;

    if ($conn instanceof mysqli) {
        return $conn;
    }

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "kitchen jungle";

    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    return $conn;
}

$conn = get_db_connection();

?>