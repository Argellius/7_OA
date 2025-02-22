<?php
require "config.php";

if (!isset($_GET["id"])) {
    die("ID zviřete není uvedeno.");
}

$id = $_GET["id"];
$query = "SELECT * FROM zvirata WHERE id = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$id]);
$animal = $stmt->fetch();

if (!$animal) {
    die("Zvíře nenalazeno");
}

$query = "SELECT * FROM druhy";
$statement = $pdo->query($query);
$druhy = $statement->fetchAll();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["jmeno"];
    $druh = $_POST["druh_id"];

    $updateQuery = "UPDATE zvirata SET jmeno = ?, druh_id = ? WHERE id= ?";
    $updateStmt = $pdo->prepare($updateQuery);
    $updateStmt->execute([$name, $druh, $id]);

    header("Location: list_animals.php");
    exit;
}


?>

<?php
include "includes/header.php";
?>
<main>
    <h1>Editovat zvíře:</h1>
    <form action="" method="post">
        <label for="jmeno">Jméno:</label>
        <input name="jmeno" id="jmeno" value="<?= $animal["jmeno"] ?>" required>
        <label for="druh">Druh:</label>
        <select id="druh" name="druh_id">
            <?php foreach ($druhy as $druh): ?>
                <option value="<?= $druh["id"] ?>" <?= $animal["druh_id"] === $druh["id"] ? "selected" : "" ?>>
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