<?php
$server = "localhost";
$username = "root";
$password = "";
$database = ""; // Come dovremo chiamare il database?, funziona, ma va specificato il nome del database

$conn = mysqli_connect($server, $username, $password, $database);

if (!$conn) {
    die("Connessione fallita: " . mysqli_connect_error());
}

echo "Connessione riuscita!";

mysqli_close($conn);
