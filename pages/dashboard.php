<?php
session_start();
require '../db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <title>Sākumlapa</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<nav>
    <span>Sveiks, <strong><?= htmlspecialchars($_SESSION['username']) ?></strong>!</span>
    <a href="../logout.php"><button style="width:auto; padding: 8px 16px;">Iziet</button></a>

    <a href="test-quiz.php">
    <button style="margin-top: 20px;">Test lapa</button>
</a>
</nav>
<div class="container">
    <h2>Pieejamie testi</h2>
    <p style="color:#666; margin-top:1rem;">Šeit pectam quiz bus</p>
</div>
</body>
</html>