<?php
require_once('config.php');

if (!isset($_GET["id"])) {
    die('ID zvířete není uvedeno.');
}

$id = $_GET["id"];

$query = "DELETE FROM zvirata WHERE id = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$id]);

header("Location: list_animals.php");
exit;
