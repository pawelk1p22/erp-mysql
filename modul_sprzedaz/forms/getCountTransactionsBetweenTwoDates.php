<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date1 = $_POST["date1"];
    $date2 = $_POST["date2"];

    $filePath = "../db_sprzedaz.txt";

    if (!file_exists($filePath)) {
        echo "<p>Nie znaleziono pliku</p>";
        exit();
    }

    $file = fopen($filePath, "r");
    if ($file) {
        $count = 0;
        while (($line = fgets($file)) !== false) {
            $transactionData = explode(",", $line);
            $transactionDate = $transactionData[3];
            if (!empty($transactionDate) && $transactionDate >= $date1 && $transactionDate <= $date2) {
                $count++;
            }
        }
        fclose($file);
        echo "<p>$count</p>";
    } else {
        echo "<p>Nie można otworzyć pliku</p>";
    }
} else {
    echo "<p>Złe żądanie</p>";
}