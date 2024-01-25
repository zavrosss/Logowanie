<?php
session_start();
require_once('db_connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = $_POST['login'];
    $haslo = $_POST['haslo'];

    // W tym przypadku nie stosujemy haszowania hasła przed zapisaniem do bazy danych

    $stmt = $pdo->prepare("INSERT INTO uzytkownicy (login, haslo) VALUES (:login, :haslo)");
    $stmt->bindParam(':login', $login);
    $stmt->bindParam(':haslo', $haslo); // Nie stosujemy funkcji password_hash()

    if ($stmt->execute()) {
        header('Location: login.php');
    } else {
        $error = "Wystąpił błąd podczas rejestracji.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejestracja</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h2>Rejestracja</h2>

    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>

    <form method="post" action="register.php">
        <label for="login">Login:</label>
        <input type="text" id="login" name="login" required><br>

        <label for="haslo">Hasło:</label>
        <input type="password" id="haslo" name="haslo" required><br>

        <button type="submit">Zarejestruj się</button>
    </form>

    <p>Masz już konto? <a href="login.php">Zaloguj się tutaj</a>.</p>

</body>
</html>
