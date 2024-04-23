<?php
header('Content-Type: application/json');

function calculateAge($birthday)
{
    $today = new DateTime();
    $diff = $today->diff(new DateTime($birthday));
    return $diff->y;
}

$filePath = "../db_hr.txt";
$file = fopen($filePath, "r");
if ($file) {
    $totalAge = 0;
    $totalEmployees = 0;
    while (($line = fgets($file)) !== false) {
        $employeeData = explode(",", $line);
        $birthday = $employeeData[2];
        $age = calculateAge($birthday);
        $totalAge += $age;
        $totalEmployees++;
    }

    fclose($file);

    if ($totalEmployees > 0) {
        $averageAge = $totalAge / $totalEmployees;
        echo $averageAge;
    } else {
        echo "Brak pracowników";
    }
} else {
    echo "Nie znaleziono pliku";
}