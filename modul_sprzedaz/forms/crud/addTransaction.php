<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product = $_POST["productInput"];
    $price = $_POST["priceInput"];
    $date = $_POST["dateInput"];

    $randomId = uniqid();

    $dataToWrite = "$randomId,$product,$price,$date\n";

    $filePath = "../../db_sprzedaz.txt";

    $file = fopen($filePath, "a");

    if ($file) {
        fwrite($file, $dataToWrite);
        fclose($file);
        echo "<p>Udało się zapisać</p>";
    } else {
        echo "<p>Nie znaleziono pliku</p>";
    }
} else {
    echo "<p>Złe żądanie</p>";
}