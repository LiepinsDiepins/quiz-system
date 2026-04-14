<?php
session_start();
require 'db.php';

if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST["username"]);
    $password = $_POST["password"];
    $confirm = $_POST["confirm"];

    if ($username == "" || $password == "") {
        $error = "Aizpildi visus laukus!";
    }
    else if ($password != $confirm) {
        $error = "Paroles nesakrīt!";
    }
    else {

        $check = $db->prepare("SELECT * FROM users WHERE username = ?");
        $check->execute([$username]);

        if ($check->fetch()) {
            $error = "Šāds lietotājs jau ir!";
        } else {

            $hashed = password_hash($password, PASSWORD_DEFAULT);

            $sql = $db->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
            $sql->execute([$username, $hashed]);

            $success = "Reģistrācija veiksmīga!";
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