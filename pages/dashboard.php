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

<nav style="display: flex; justify-content: space-between; align-items: center; background: white; padding: 1rem 2rem; box-shadow: 0 1px 6px rgba(0,0,0,0.1); margin-bottom: 2rem;">
    <span>Sveiks, <strong><?= htmlspecialchars($_SESSION['username']) ?></strong>!</span>
    <div style="display: flex; gap: 10px;">
        <a href="test-quiz.php"><button style="width: auto; padding: 8px 16px; margin: 0;">Test lapa</button></a>
        <a href="../logout.php"><button style="width: auto; padding: 8px 16px; margin: 0;">Iziet</button></a>
    </div>
</nav>

<div class="container">
    <h2>Pieejamie testi</h2>
    <p style="color:#666; margin-top:1rem;">Šeit pēctam quiz būs</p>
</div>

</body>
</html>