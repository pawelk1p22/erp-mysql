<?php

$filePath = "../db_sprzedaz.txt";

$revenues = [];

$file = fopen($filePath, "r");

if ($file) {
    while (($line = fgets($file)) !== false) {
        $transaction = explode(",", $line);

        $product = $transaction[1];
        $price = intval($transaction[2]);

        if (!isset($revenues[$product])) {
            $revenues[$product] = 0;
        }
        $revenues[$product] += $price;
    }

    fclose($file);

    $maxRevenueProduct = "";
    $maxRevenue = 0;
    foreach ($revenues as $product => $revenue) {
        if ($revenue > $maxRevenue) {
            $maxRevenue = $revenue;
            $maxRevenueProduct = $product;
        }
    }

    echo "<table>";
    echo "<tr>";
    echo "<th>Produkt</th><th>Przychód</th>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>$maxRevenueProduct</td><td>$maxRevenue</td>";
    echo "</tr>";
    echo "</table>";
} else {
    echo "<p>Nie znaleziono pliku</p>";
}