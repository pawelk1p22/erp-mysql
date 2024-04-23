<?php

$filePath = "../../db_hr.txt";

$allData = file($filePath);


echo "<table border='1'>";
echo "<tr><th>Identyfikator</th><th>Imię i nazwisko</th><th>Data urodzenia</th><th>Oddzia</th><th>Uprawnienia</th></tr>";

foreach ($allData as $line) {
    $record = explode(",", $line);

    echo "<tr>";
    foreach ($record as $value) {
        echo "<td>$value</td>";
    }
    echo "</tr>";
}

echo "</table>";
