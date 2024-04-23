<?php
header('Content-Type: application/json');

$filePath = "../db_hr.txt";

$file = fopen($filePath, "r");

if ($file) {
    $departmentCounts = [];

    while (($line = fgets($file)) !== false) {
        $employeeData = explode(",", $line);
        $department = trim($employeeData[3]);
        if (array_key_exists($department, $departmentCounts)) {
            $departmentCounts[$department]++;
        } else {
            $departmentCounts[$department] = 1;
        }
    }
    fclose($file);

    print_r($departmentCounts);
} else {
    echo "Nie znaleziono pliku";
}