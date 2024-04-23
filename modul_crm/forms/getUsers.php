<?php

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'erp';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Błąd połączenia");
}

$sql = "SELECT * FROM klient";

$result = $conn->query($sql);

$conn->close();

if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>Identyfikator</th><th>Imię i nazwisko</th><th>Email</th><th>Status</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td> <td>" . $row["name"] . "</td> <td>" . $row["email"] . "</td> <td>" . $row["status"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p>Brak wyników</p>";
}
