<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["idInput"];
    $name = $_POST["nameInput"];
    $birthday = $_POST["birthdayInput"];
    $department = $_POST["departmentInput"];
    $permission = $_POST["permissionInput"];

    $filePath = "../../db_hr.txt";

    $allData = file($filePath);

    $found = false;

    $file = fopen($filePath, "w");

    if ($file) {
        foreach ($allData as $line) {
            $record = explode(",", $line);

            if ($record[0] == $id) {
                $found = true;

                $updatedName = empty($name) ? $record[1] : $name;
                $updatedbirthday = empty($birthday) ? $record[2] : $birthday;
                $updateddepartment = empty($department) ? $record[3] : $department;
                $updatedPermission = empty($permission) ? $record[4] : $permission;

                $updatedData = "$id,$updatedName,$updatedbirthday,$updateddepartment,$updatedPermission\n";
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
