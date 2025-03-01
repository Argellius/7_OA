<?php
require "config.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["jmeno"] ?? "";
    $druh_id = $_POST["druh_id"] ?? 0;

    if (empty($name))
        die("Chyba: Jméno zvířete není vyplněno");

    if ($druh_id <= 0) {
        die("Chyba: Neplatný druh zvířete");
    }

    $insertQuery = "INSERT INTO zvirata(jmeno, druh_id) VALUES (?, ?)";
    $insertStmt = $pdo->prepare($insertQuery);
    $insertStmt->execute([$name, $druh_id]);

    header("Location: list_animals.php");
    exit;
} else {
    die("Chyba");
}
