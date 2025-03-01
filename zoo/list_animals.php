<?php
require "config.php";

$query = "SELECT zvirata.id as id, zvirata.jmeno as jmeno, druhy.nazev as nazev FROM zvirata JOIN druhy ON zvirata.druh_id=druhy.id";
$statement = $pdo->query($query);
$animals = $statement->fetchAll();
?>


<?php
include_once "includes/header.php";
?>

<main>
    <h1>Seznam zvířat</h1>
    <a href="add_animal.php">Přidat</a>
    <table>
        <tr>
            <th>Jméno</th>
            <th>Druh</th>
            <th>Akce</th>
        </tr>
        <?php foreach ($animals as $animal): ?>
            <tr>
                <td><?php echo $animal["jmeno"] //z tabulky ZVIRATA 
                    ?></td>
                <td><?php echo $animal["nazev"] //z tabulky DRUHY 
                    ?></td>
                <td>
                    <a href="edit_animal.php?id=<?php echo $animal["id"] ?>">Editovat</a>
                    <a
                        href="delete_animal.php?id=<?php echo $animal["id"] ?>"
                        onclick="return confirm('Opravdu si přejete smazat záznam <?php echo $animal['jmeno'] ?>');">Smazat</a>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>
</main>


<?php
include_once "includes/footer.php";
?>