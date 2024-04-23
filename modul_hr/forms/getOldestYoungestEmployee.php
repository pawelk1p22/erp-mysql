<?php
header('Content-Type: text/html');

function calculateAge($birthday)
{
    $today = new DateTime();
    $diff = $today->diff(new DateTime($birthday));
    return $diff->y;
}

$filePath = "../db_hr.txt";

$file = fopen($filePath, "r");

if ($file) {
    $employees = [];
    while (($line = fgets($file)) !== false) {
        $employeeData = explode(",", $line);
        $employee = [
            "id" => $employeeData[0],
            "name" => $employeeData[1],
            "birthday" => $employeeData[2],
            "department" => $employeeData[3],
            "permission" => trim($employeeData[4])
        ];
        $employees[] = $employee;
    }
    fclose($file);

    usort($employees, function ($a, $b) {
        return strtotime($a['birthday']) - strtotime($b['birthday']);
    });

    $oldestEmployee = $employees[0];

    $youngestEmployee = end($employees);

    $oldestEmployee['age'] = calculateAge($oldestEmployee['birthday']);
    $youngestEmployee['age'] = calculateAge($youngestEmployee['birthday']);

    $table = "<table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Birthday</th>
                    <th>Department</th>
                    <th>Permission</th>
                </tr>
                <tr>
                    <th colspan='5'>Najstarszy</th>
                </tr>
                <tr>
                    <td>{$oldestEmployee['id']}</td>
                    <td>{$oldestEmployee['name']}</td>
                    <td>{$oldestEmployee['birthday']}</td>
                    <td>{$oldestEmployee['department']}</td>
                    <td>{$oldestEmployee['permission']}</td>
                </tr>
                <tr>
                    <th colspan='5'>Najmłodszy</th>
                </tr>
                <tr>
                    <td>{$youngestEmployee['id']}</td>
                    <td>{$youngestEmployee['name']}</td>
                    <td>{$youngestEmployee['birthday']}</td>
                    <td>{$youngestEmployee['department']}</td>
                    <td>{$youngestEmployee['permission']}</td>
                </tr>
            </table>";

    echo $table;
} else {
    echo "<p>Nie znaleziono pliku</p>";
}
?>