<?php

$filePath = "../../db_sprzedaz.txt";

$allData = file($filePath);

echo "<table border='1'>";
echo "<tr><th>Identyfikator</th><th>Produkt</th><th>Cena</th><th>Data</th></tr>";

foreach ($allData as $line) {
    $record = explode(",", $line);

    echo "<tr>";
    foreach ($record as $value) {
        echo "<td>$value</td>";
    }
    echo "</tr>";
}

echo "</table>";
