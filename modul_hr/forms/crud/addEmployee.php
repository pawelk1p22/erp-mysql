<?php
header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["nameInput"];
    $birthday = $_POST["birthdayInput"];
    $department = $_POST["departmentInput"];
    $permission = $_POST["permissionInput"];

    $randomId = uniqid();

    $dataToWrite = "$randomId,$name,$birthday,$department,$permission\n";

    $filePath = "../../db_hr.txt";

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