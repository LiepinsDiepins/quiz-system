<?php
session_start();
?>

<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <title>Test lapa</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<nav>
    <span>Test vide</span>
    <a href="dashboard.php">
        <button>Atpakaļ</button>
    </a>
</nav>

<div class="container">
    <h2>Šī ir test lapa</h2>

   <-- Šeit apakšā raksti savu kodu! -->
  <?php
session_start();

// Testa tēmas izvēle
$topics = ['Populārākie sporta veidi Latvijā'];

// Piemērs ar jautājumiem un atbildēm par populārākajiem sporta veidiem Latvijā
$questions = [
    'Populārākie sporta veidi Latvijā' => [
        ['question' => 'Kurš sporta veids ir populārākais Latvijā?', 
         'answers' => ['Hokejs', 'Futbols', 'Basketbols', 'Vieglatlētika'], 
         'correct' => 0],
         
        ['question' => 'Cik daudz cilvēku Latvijā nodarbojas ar hokeju?', 
         'answers' => ['Aptuveni 5 000', 'Aptuveni 15 000', 'Aptuveni 20 000', 'Aptuveni 50 000'], 
         'correct' => 1],
         
        ['question' => 'Kurš no šiem ir populārākais sporta veids Latvijas skolās?', 
         'answers' => ['Futbols', 'Basketbols', 'Hokejs', 'Riteņbraukšana'], 
         'correct' => 1],
         
        ['question' => 'Kāds ir populārākais sporta veids Latvijas lauku reģionos?', 
         'answers' => ['Hokejs', 'Futbols', 'Basketbols', 'Vieglatlētika'], 
         'correct' => 3],
         
        ['question' => 'Kādā sporta veidā Latvija ir veikusi nozīmīgus panākumus starptautiskajos čempionātos?', 
         'answers' => ['Hokejs', 'Futbols', 'Basketbols', 'Vieglatlētika'], 
         'correct' => 0],
    ]
];

$selectedTopic = isset($_POST['topic']) ? $_POST['topic'] : 'Populārākie sporta veidi Latvijā'; // Noklusējuma tēma

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $score = 0;
    foreach ($questions[$selectedTopic] as $index => $question) {
        if (isset($_POST['answer'][$index]) && $_POST['answer'][$index] == $question['correct']) {
            $score++;
        }
    }
    $_SESSION['score'] = $score;
    header('Location: results.php'); // Pāradresēt uz rezultātu lapu
    exit;
}
?>

<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <title>Test lapa</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<nav>
    <span>Test vide</span>
    <a href="dashboard.php">
        <button>Atpakaļ</button>
    </a>
</nav>

<div class="container">
    <h2>Izvēlies testu pēc tēmas</h2>

    <!-- Tēmas izvēle -->
    <form method="post" action="">
        <select name="topic">
            <?php foreach ($topics as $topic): ?>
                <option value="<?= $topic ?>" <?= $topic == $selectedTopic ? 'selected' : '' ?>><?= $topic ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Izvēlēties tēmu</button>
    </form>

    <!-- Testa jautājumu rādīšana -->
    <h3><?= $selectedTopic ?> tests</h3>
    <form method="post" action="">
        <?php foreach ($questions[$selectedTopic] as $index => $question): ?>
            <div class="question">
                <p><?= $question['question'] ?></p>
                <?php foreach ($question['answers'] as $key => $answer): ?>
                    <label>
                        <input type="radio" name="answer[<?= $index ?>]" value="<?= $key ?>"> <?= $answer ?>
                    </label><br>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>

        <button type="submit" name="submit">Nosūtīt atbildes</button>
    </form>
</div>

</body>
</html>

</div>

</body>
</html>