<?php
session_start();
require 'db.php';

if (isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];

    if (empty($username) || empty($password)) {
        $error = 'Lūdzu aizpildi visus laukus!';
    } elseif ($password !== $confirm) {
        $error = 'Paroles nesakrīt!';
    } elseif (strlen($password) < 6) {
        $error = 'Parolei jābūt vismaz 6 simboli!';
    } else {
        $stmt = $db->prepare("SELECT id FROM users WHERE username = ?");
        $stmt->execute([$username]);

        if ($stmt->fetch()) {
            $error = 'Šāds lietotājvārds jau eksistē!';
        } else {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $db->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, 'user')");
            $stmt->execute([$username, $hash]);
            $success = 'Reģistrācija veiksmīga! Vari pieteikties.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <title>Reģistrācija</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="box">
    <h2>Reģistrēties</h2>
    <?php if ($error): ?>
        <div class="error"><?= $error ?></div>
    <?php endif; ?>
    <?php if ($success): ?>
        <div class="success"><?= $success ?></div>
    <?php endif; ?>
    <form method="POST">
        <input type="text" name="username" placeholder="Lietotājvārds" value="<?= htmlspecialchars($_POST['username'] ?? '') ?>">
        <input type="password" name="password" placeholder="Parole">
        <input type="password" name="confirm" placeholder="Apstiprini paroli">
        <button type="submit">Reģistrēties</button>
    </form>
    <div class="link">Jau ir konts? <a href="login.php">Pieteikties</a></div>
</div>
</body>
</html>