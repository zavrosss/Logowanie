<?php
session_start();
require_once('db_connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = $_POST['login'];
    $haslo = $_POST['haslo'];

    $stmt = $pdo->prepare("SELECT * FROM uzytkownicy WHERE login = :login AND haslo = :haslo");
    $stmt->bindParam(':login', $login);
    $stmt->bindParam(':haslo', $haslo);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $_SESSION['user_id'] = $user['id'];
        header('Location: dashboard.php');
    } else {
        $error = "Nieprawidłowy login lub hasło.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Logowanie</h2>
    <form method="post" action="login.php">
        <label for="login">Login:</label>
        <input type="text" id="login" name="login" required><br>

        <label for="haslo">Hasło:</label>
        <input type="password" id="haslo" name="haslo" required><br>

        <button type="submit">Zaloguj się</button>
    </form>
    <p>Nie masz konta? <a href="register.php">Utwórz tutaj!</a>.</p>
</body>

<?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
</html>
