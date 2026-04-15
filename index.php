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
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Quiz | Pārbaudi zināšanas</title>
<link rel="stylesheet" href="css/style.css">
<link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>

<!-- Navigācija -->
<nav class="navbar">
    <div class="nav-container">
        <div class="logo">
            <i class="fas fa-question-circle"></i>
        <span>Quiz</span>
        </div>
        <div class="nav-links">
            <a href="#features">Iespējas</a>
            <a href="login.php" class="nav-login">Pieslēgties</a>
        </div>
    </div>
</nav>

<!-- Hero sekcija -->
<section class="hero">
    <div class="hero-container">
        <h1>Pārbaudi savas <span class="highlight">zināšanas</span></h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        <a href="login.php" class="btn-primary">Sākt testu</a>
    </div>
</section>

<!-- Iespēju sekcija -->
<section id="features" class="features">
        <div class="features-container">
            <div class="section-header">
                <h2>Kāpēc izvēlēties mūsu quiz?</h2>
                <p>Lorem ipsum dolor sit amet consectetur.</p>
            </div>

            <div class="features-grid">
            <div class="feature-item">
            <div class="feature-icon">
            <i class="fas fa-layer-group"></i>
            </div>
                <h3>Lorem, ipsum.</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
            </div>

            <div class="feature-item">
            <div class="feature-icon">
                <i class="fas fa-chart-simple"></i>
            </div>
                <h3>Lorem, ipsum dolor.</h3>
                <p>Lorem ipsum dolor sit amet consectetur.</p>
            </div>

            <div class="feature-item">
            <div class="feature-icon">
                <i class="fas fa-clock"></i>
            </div>
                <h3>Lorem ipsum dolor sit.</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta">
    <div class="cta-container">
        <h2>Lorem, ipsum dolor.</h2>
        <p>Lorem ipsum dolor sit amet consectetur.</p>
        <a href="login.php" class="btn-secondary">Sākt tagad →</a>
    </div>
</section>

<!-- Footer -->
<footer class="footer">
<div class="footer-container">
<p>© 2026 Quiz. Visas tiesības aizsargātas.</p>
<div class="footer-links">
<a href="#">Par mums</a>
<a href="#">Kontakti</a>
<a href="#">Privātums</a>
</div>
</div>
</footer>

</body>
</html>

