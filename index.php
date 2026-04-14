<?php
session_start();

if (isset($_SESSION['user_id'])) {
    if ($_SESSION['role'] === 'admin') {
        header('Location: pages/admin.php');
    } else {
        header('Location: pages/dashboard.php');
    }
    exit;
}
?>

<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <title>Quiz Sistēma</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <main>
        <div class="box">
            <h2>Quiz Sistēma</h2>
            <p style="text-align:center; margin-bottom:1.5rem; color:#666;">Pieteikties vai reģistrēties lai sāktu</p>
            <a href="login.php"><button>Pieteikties</button></a>
            <br><br>
            <a href="register.php"><button style="background:#6b7280;">Reģistrēties</button></a>
        </div>
    </main>
</body>
</html>