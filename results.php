<?php
session_start();
if (!isset($_SESSION['score'])) {
    header('Location: index.php');
    exit;
}
$score = $_SESSION['score'];
?>

<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <title>Rezultāti</title>
</head>
<body>
    <h1>Jūsu rezultāti</h1>
    <p>Jūs atbildējāt pareizi uz <?= $score ?> jautājumiem.</p>
    <a href="index.php"><button>Atpakaļ uz sākumlapu</button></a>
</body>
</html>