<?php
include "../../connDB.php";
include "../check_admin.php";

$query = "SELECT * FROM Biciclette";

$results = mysqli_query($conn, $query);
$numero_bici = mysqli_num_rows($results);
?>

<?php if ($numero_bici == 0): ?>
    <span>Non ci sono biciclette</span>
<?php else: ?>
    <table>
        <tr>
            <th>id bicicletta</th>
            <th>marca</th>
            <th>modello</th>
            <th>prezzo</th>
            <th>descrizione</th>
            <th>stato</th>
            <th>ID Sede Appartenenza</th>
            <th>Creato il</th>
        </tr>

        <?php while ($row = mysqli_fetch_array($results, MYSQLI_BOTH)): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['marca']; ?></td>
                <td><?php echo $row['modello']; ?></td>
                <td><?php echo $row['prezzo_ora']; ?></td>
                <td><?php echo $row['descrizione']; ?></td>
                <td><?php echo $row['stato']; ?></td>
                <td><?php echo $row['idSede_appartenenza']; ?></td>
                <td><?php echo $row['creato_il']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
<?php endif; ?>