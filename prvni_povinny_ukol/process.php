<?php

$name = isset($_POST["name"]) ?  trim($_POST["name"]) : "";
$email = isset($_POST["email"]) ?  trim($_POST["email"]) : "";
$arrival = isset($_POST["arrival"]) ?  trim($_POST["arrival"]) : "";
$departure = isset($_POST["departure"]) ?  trim($_POST["departure"]) : "";
$room = isset($_POST["room"]) ?  trim($_POST["room"]) : "";
$services = isset($_POST["services"]) ?  $_POST["services"] : array();

if (empty($name) || empty($email) || empty($arrival) || empty($departure)) {
    die("Prosím vyplňte všechny povinná pole");
}

if (strtotime($arrival) >= strtotime($departure)) {
    die("Datum odjezdu musí být pozdější než datum příjezdu");
}

//Počet nocí
$arrivalDate = new DateTime($arrival);
$departureDate = new DateTime($departure);
$night = $arrivalDate->diff($departureDate)->days;

//Ceny
$roomPrices = [
    "jednoluzkovy" => 1000,
    "dvouluzkovy" => 1800,
    "apartman" => 3000,
];

$roomPrice = $roomPrices[$room];

$servicesPrices = [
    "snidane" => 150,
    "obed" => 250,
    "vecere" => 150,
    "parkovani" => 100,
];

$servicesPrice = 0;

foreach ($services as $service) {
    if ($servicesPrices[$service])
        $servicesPrice += $servicesPrices[$service];
}


$totalServicePrice = $servicesPrice * $night;
$totalRoomPrice = $roomPrice * $night;

$totalPrice = $totalServicePrice + $totalRoomPrice;

?>

<!DOCTYPE HTML>

<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Fiktivní hotel - Výsledek</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div>
        <h2>Celková hodnota rezervace je: <?= $totalPrice ?> Kč, včetně DPH</h2>
        <h3>Jmeno rezervace: <?= $name ?> </h3>
        <h3>Email rezervace: <?= $email ?> </h3>
        <h3> Pokoj: <?= $room ?> <h3>
                <?php foreach ($services as $service): ?>
                    <h3> Služy: <?= $service  ?> <h3>
                        <?php endforeach; ?>

</body>

</html>