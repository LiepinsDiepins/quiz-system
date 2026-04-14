<?php
session_start();
require 'db.php';

if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST["username"]);
    $password = $_POST["password"];

    if ($username == "" || $password == "") {
        $error = "Aizpildi visus laukus!";
    } else {

        $sql = $db->prepare("SELECT * FROM users WHERE username = ?");
        $sql->execute([$username]);

        $user = $sql->fetch();

        if ($user) {

            if (password_verify($password, $user["password"])) {

                $_SESSION["user_id"] = $user["id"];
                $_SESSION["username"] = $user["username"];

                header("Location: pages/dashboard.php");
                exit();
            } else {
                $error = "Nepareiza parole!";
            }

        } else {
            $error = "Lietotājs neeksistē!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <title>Pieteikšanās</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="box">
    <h2>Pieteikties</h2>
    <?php if ($error): ?>
        <div class="error"><?= $error ?></div>
    <?php endif; ?>
    <form method="POST">
        <input type="text" name="username" placeholder="Lietotājvārds" value="<?= htmlspecialchars($_POST['username'] ?? '') ?>">
        <input type="password" name="password" placeholder="Parole">
        <button type="submit">Pieteikties</button>
    </form>
    <div class="link">Nav konta? <a href="register.php">Reģistrēties</a></div>
</div>
</body>
</html>