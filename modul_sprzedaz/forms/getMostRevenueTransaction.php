<?php

$filePath = "../db_sprzedaz.txt";
$file = fopen($filePath, "r");

if ($file) {
    $maxTransaction = null;
    $maxPrice = -1;

    while (($line = fgets($file)) !== false) {
        $transactionData = explode(",", $line);
        $price = intval($transactionData[2]);

        if ($price > $maxPrice) {
            $maxPrice = $price;
            $maxTransaction = $transactionData;
        }
    }

    fclose($file);

    if ($maxTransaction !== null) {
        echo "<tr><th>Identyfikator</th><th>Produkt</th><th>Cena</th><th>Data</th></tr>";

        echo "<td>$maxTransaction[0]</td><td>$maxTransaction[1]</td><td>$maxTransaction[2]</td><td>$maxTransaction[3]</td>";

    } else {
        echo json_encode(["error" => "Brak transakcji"]);
    }
} else {
    echo json_encode(["error" => "Nie znaleziono pliku"]);
}