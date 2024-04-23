<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["idInput"];
    $product = $_POST["productInput"];
    $price = $_POST["priceInput"];
    $date = $_POST["dateInput"];

    $filePath = "../../db_sprzedaz.txt";

    $allData = file($filePath);

    $found = false;

    $file = fopen($filePath, "w");

    if ($file) {
        foreach ($allData as $line) {
            $record = explode(",", $line);

            if ($record[0] == $id) {
                $found = true;

                $updatedproduct = empty($product) ? $record[1] : $product;
                $updatedprice = empty($price) ? $record[2] : $price;
                $updateddate = empty($date) ? $record[3] : $date;

                $updatedData = "$id,$updatedproduct,$updatedprice,$updateddate\n";
                fwrite($file, $updatedData);
            } else {
                fwrite($file, $line);
            }
        }

        fclose($file);

        if ($found) {
            echo "<p>Zaktualizowano rekord</p>";
        } else {
            echo "<p>Nie znaleziono rekordu</p>";
        }
    } else {
        echo "<p>Nie udało się otworzyć pliku</p>";
    }
} else {
    echo "<p>Nieprawidłowe żądanie</p>";
}
