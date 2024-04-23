<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["idInput"];
    $name = $_POST["nameInput"];
    $email = $_POST["emailInput"];
    $status = $_POST["statusInput"];

    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'erp';

    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        die("Błąd połączenia");
    }

    $sql = "UPDATE klient SET name='$name', email='$email', status='$status' WHERE id='$id'";

    $result = $conn->query($sql);

    if ($result) {
        echo "<p>Użytkownik został zaktualizowany</p>";
    } else {
        echo "<p>Użytkownik nie został zaktualizowany</p>";
    }

    $conn->close();
} else {
    echo "<p>Nieprawidłowe żądanie</p>";
}
