<?php
include "check_admin.php";
include "../connDB.php";

$lang = $_POST['lang'] ?? 'it';

if ($lang != "it") {
    include "../../lang/en.php";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fastbike: Utente <?php echo $cognomeUtente ?></title>
    <link rel="stylesheet" href="../../style/areaRiservata.css">
</head>

<body>
    <center>ciao admin</center>
</body>

</html>