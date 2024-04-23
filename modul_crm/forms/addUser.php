<?php
header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["nameInput"];
    $email = $_POST["emailInput"];
    $status = $_POST["statusInput"];

    $randomId = uniqid();

    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'erp';

    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        die("Błąd połączenia");
    }

    $sql = "INSERT INTO klient (id, name, email, status) VALUES ('$randomId', '$name', '$email', '$status')";

    $result = $conn->query($sql);

    if ($result) {
        echo "<p>Dodano użytkownika</p>";
    } else {
        echo "<p>Nie udało się dodać użytkownika</p>";
    }

    $conn->close();

} else {
    echo "<p>Złe żądanie</p>";
}
