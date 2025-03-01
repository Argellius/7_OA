<?php

require "config.php";

$query = "SELECT * FROM druhy";
$statement = $pdo->query($query);
$druhy = $statement->fetchAll();
?>


<?php
include "includes/header.php";
?>
<main>
    <h1>Přidat zvíře:</h1>
    <form action="create_animal.php" method="post">
        <label for="jmeno">Jméno:</label>
        <input name="jmeno" id="jmeno" required>
        <label for="druh">Druh:</label>
        <select id="druh" name="druh_id">
            <?php foreach ($druhy as $druh): ?>
                <option value="<?= $druh["id"] ?>">
                    <?= $druh["nazev"] ?>
                </option>
            <?php endforeach; ?>
        </select>

        <button type="submit"> Uložit změny </button>
    </form>
</main>

<?php
include "includes/footer.php";
?>