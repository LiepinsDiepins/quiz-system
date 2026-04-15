<?php
session_start();

if (!isset($_SESSION["user_id"]) || $_SESSION["role"] !== "admin") {
    header("Location: ../login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<nav>
    <h2>Admin Panelis</h2>
    <a href="../logout.php"><button>Iziet</button></a>
</nav>

<div class="container">

    <h3>Vadības centrs</h3>

    <div class="grid">

        <a href="#" class="card">
            <h4>➕ Pievienot Quiz</h4>
            <p>(vēl nav pieslēgts)</p>
        </a>

        <a href="#" class="card">
            <h4>📝 Pievienot Jautājumu</h4>
            <p>(vēl nav pieslēgts)</p>
        </a>

        <a href="#" class="card">
            <h4>👥 Lietotāji</h4>
            <p>(vēlāk)</p>
        </a>

        <a href="#" class="card">
            <h4>📊 Statistika</h4>
            <p>(vēlāk)</p>
        </a>

    </div>

</div>

</body>
</html>