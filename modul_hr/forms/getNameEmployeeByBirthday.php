<?php
header('Content-Type: text/html');

function calculateAge($birthday)
{
    $today = new DateTime();
    $diff = $today->diff(new DateTime($birthday));
    return $diff->y;
}

function isWithinTwoWeeks($birthday, $referenceDate)
{
    $birthdayDateTime = new DateTime($birthday);
    $twoWeeksAgo = new DateTime($referenceDate);
    $twoWeeksAgo->modify('-2 weeks');
    $twoWeeksLater = new DateTime($referenceDate);
    $twoWeeksLater->modify('+2 weeks');

    return ($birthdayDateTime >= $twoWeeksAgo && $birthdayDateTime <= $twoWeeksLater);
}

$referenceDate = $_POST["dateInput"];

$filePath = "../db_hr.txt";

$file = fopen($filePath, "r");

if ($file) {
    $table = "<table border='1'>
                <tr>
                    <th>Identyfikator</th>
                    <th>Imię i nazwisko</th>
                    <th>Urodziny</th>
                    <th>Oddział</th>
                    <th>Uprawnienia</th>
                </tr>";

    while (($line = fgets($file)) !== false) {
        $employeeData = explode(",", $line);
        $birthday = $employeeData[2];

        if (isWithinTwoWeeks($birthday, $referenceDate)) {
            $employee = [
                "id" => $employeeData[0],
                "name" => $employeeData[1],
                "birthday" => $employeeData[2],
                "department" => $employeeData[3],
                "permission" => trim($employeeData[4])
            ];

            $table .= "<tr>
                            <td>{$employee['id']}</td>
                            <td>{$employee['name']}</td>
                            <td>{$employee['birthday']}</td>
                            <td>{$employee['department']}</td>
                            <td>{$employee['permission']}</td>
                        </tr>";
        }
    }
    fclose($file);

    $table .= "</table>";

    echo $table;
} else {
    echo "<p>Nie znaleziono pliku</p>";
}
?>