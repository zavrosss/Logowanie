<?php
$host = 'localhost';
$db_name = 'login';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $pdo->exec("CREATE DATABASE IF NOT EXISTS $db_name");
    $pdo->exec("USE $db_name");

    $pdo->exec("
        CREATE TABLE IF NOT EXISTS `uzytkownicy` (
            `id` INT AUTO_INCREMENT PRIMARY KEY,
            `login` VARCHAR(50) NOT NULL,
            `haslo` VARCHAR(255) NOT NULL
        )
    ");
} catch (PDOException $e) {
    die("Błąd: " . $e->getMessage());
}
?>
