<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "FastbikeDB"; // Come dovremo chiamare il database?, funziona, ma va specificato il nome del database

$conn = mysqli_connect($server, $username, $password);

if (!$conn) {
    die("Connessione fallita: " . mysqli_connect_error());
}

$query_create_db = "CREATE DATABASE IF NOT EXISTS $database";

if (mysqli_query($conn, $query_create_db)) {
    mysqli_select_db($conn, $database);
    $conn->set_charset("utf8");
} else {
    echo "Errore nella creazione del database: " . mysqli_error($conn);
}
