<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tierlist = [
        "Uprawnienia1" => 1,
        "Uprawnienia2" => 2,
        "Uprawnienia3" => 3
    ];

    $permission = $_POST["permissionInput"];
    $permissionTier = $tierlist[$permission];

    $filePath = "../db_hr.txt";

    $allData = file($filePath);


    echo "<table border='1'>";
    echo "<tr><th>Identyfikator</th><th>Imię i nazwisko</th><th>Data urodzenia</th><th>Oddzia</th><th>Uprawnienia</th></tr>";

    foreach ($allData as $line) {
        $record = explode(",", $line);

        if ($tierlist[trim($record[4])] >= $permissionTier) {
            echo "<tr>";
            foreach ($record as $value) {
                echo "<td>$value</td>";
            }
            echo "</tr>";
        }
    }

    echo "</table>";

}