<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $idToDelete = $_POST["idInput"];

    $filePath = "../../db_sprzedaz.txt";

    $allData = file($filePath);

    $found = false;

    $file = fopen($filePath, "w");

    if ($file) {
        foreach ($allData as $line) {
            $record = explode(",", $line);

            if ($record[0] == $idToDelete) {
                $found = true;
            } else {
                fwrite($file, $line);
            }
        }

        fclose($file);

        if ($found) {
            echo "<p>Usunięto rekord</p>";
        } else {
            echo "<p>Nie znaleziono rekordu</p>";
        }
    } else {
        echo "<p>Nie udało się otworzyć pliku</p>";
    }
} else {
    echo "<p>Nieprawidłowe żądanie</p>";
}
