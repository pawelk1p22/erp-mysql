<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $idToDelete = $_POST["idInput"];

    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'erp';

    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        die("Błąd połączenia");
    }

    $sql = "DELETE FROM klient WHERE id = '$idToDelete'";

    $result = $conn->query($sql);

    if ($result) {
        echo "<p>Usunięto użytkownika</p>";
    } else {
        echo "<p>Nie udało się usunąć użytkownika</p>";
    }
} else {
    echo "<p>Nieprawidłowe żądanie</p>";
}
