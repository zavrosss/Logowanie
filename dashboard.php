<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h2>Pomyślnie zalogowano!</h2>

    <p>Witaj na swoim profilu!</p>

    <a href="logout.php">Wyloguj się</a>

</body>
</html>
