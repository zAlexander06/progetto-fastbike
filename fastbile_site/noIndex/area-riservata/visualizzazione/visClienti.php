<?php
include "../../connDB.php";
include "../check_admin.php";

$query = "SELECT * FROM Biciclette";

$results = mysqli_query($conn, $query);
$numero_clienti = mysqli_num_rows($results);
?>

<?php if ($numero_clienti == 0): ?>
    <span>Non ci sono clienti in questa azienda</span>
<?php else: ?>
    <table>
        <tr>
            <th>id Cliente</th>
            <th>Nome</th>
            <th>Cognome</th>
            <th>Email</th>
            <th>Telefono</th>
            <th>Codice Fiscale</th>
            <th>Data di nascita</th>
            <th>Data di registrazione</th>
        </tr>

        <?php while ($row = mysqli_fetch_array($results, MYSQLI_BOTH)): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['nome']; ?></td>
                <td><?php echo $row['cognome']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['telefono']; ?></td>
                <td><?php echo $row['codiceFiscale']; ?></td>
                <td><?php echo $row['dataNascita']; ?></td>
                <td><?php echo $row['data_registrazione']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
<?php endif; ?>