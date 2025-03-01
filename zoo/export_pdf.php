<?php
require_once __DIR__ . '/vendor/autoload.php'; // Autoload Dompdf
require_once 'config.php'; // Konfigurace databáze

use Dompdf\Dompdf;
use Dompdf\Options;

// Nastavení Dompdf s podporou UTF-8
$options = new Options();
$options->set('defaultFont', 'DejaVu Sans'); // Nastaví písmo s podporou UTF-8
$options->set('isHtml5ParserEnabled', true);

$dompdf = new Dompdf($options);

// Načtení dat z databáze
$query = 'SELECT z.jmeno, z.datum_prichodu
          FROM zvirata z
          JOIN druhy d ON z.druh_id = d.id';
$stmt = $pdo->query($query);
$animals = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Generování HTML obsahu
$html = '
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: "DejaVu Sans", sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        table th {
            background-color: #f4f4f4;
        }
        h1 {
            text-align: center;
            color: #344e41;
        }
    </style>
</head>
<body>
    <h1>Seznam Zvířat</h1>
    <table>
        <thead>
            <tr>
                <th>Jméno</th>
                <th>Datum příchodu</th>
            </tr>
        </thead>
        <tbody>';

foreach ($animals as $animal) {
    $html .= '
        <tr>
            <td>' . htmlspecialchars($animal['jmeno'], ENT_QUOTES, 'UTF-8') . '</td>
            <td>' . htmlspecialchars($animal['datum_prichodu'], ENT_QUOTES, 'UTF-8') . '</td>
        </tr>';
}

$html .= '
        </tbody>
    </table>
</body>
</html>';

// Načtení HTML do Dompdf
$dompdf->loadHtml($html);

// Nastavení velikosti papíru a orientace
$dompdf->setPaper('A4', 'portrait');

// Vykreslení HTML jako PDF
$dompdf->render();

// Výstup PDF do prohlížeče
$dompdf->stream("Seznam_Zvirat.pdf", ["Attachment" => false]);
