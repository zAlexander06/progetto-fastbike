<?php
include "../../connDB.php";
include "../check_admin.php";

$query = "SELECT * FROM Biciclette";

$results = mysqli_query($conn, $query);
$numero_sedi = mysqli_num_rows($results);
?>

<?php if ($numero_sedi == 0): ?>
    <span>Non ci sono sedi in questa azienda</span>
<?php else: ?>
    <table>
        <tr>
            <th>id Sede</th>
            <th>CoordinataX</th>
            <th>CoordinataY</th>
            <th>via</th>
            <th>citta</th>
            <th>cap</th>
        </tr>

        <?php while ($row = mysqli_fetch_array($results, MYSQLI_BOTH)): ?>
            <tr>
                <td><?php echo $row['idSede']; ?></td>
                <td><?php echo $row['coordinataX']; ?></td>
                <td><?php echo $row['coordinataY']; ?></td>
                <td><?php echo $row['via']; ?></td>
                <td><?php echo $row['citta']; ?></td>
                <td><?php echo $row['cap']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
<?php endif; ?>