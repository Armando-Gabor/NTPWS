<?php
session_start();

// Generiranje nasumičnog broja između 1 i 9 ako nije već generiran
if (!isset($_SESSION['target_number'])) {
    $_SESSION['target_number'] = rand(1, 9);
}

$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Preuzimanje vrijednosti iz forme
    $guess = $_POST['guess'];
    $target = $_SESSION['target_number'];

    // Provjera je li uneseni broj isti kao ciljni broj
    if ($guess == $target) {
        $message = "Pogodak, probaj ponovo!";
        // Resetiranje ciljnog broja za novu igru
    } else {
        $message = "Krivo, probaj ponovo!";
    }
}
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <title>Igra (pogodi broj)</title>
</head>
<body>
    <form method="post">
        <label for="guess">Unesi broj od 1 do 9:</label>
        <input type="number" id="guess" name="guess" min="1" max="9" required>
        <input type="submit" value="Pogodi">
    </form>

    <?php
    if ($message == "Pogodak, probaj ponovo!") {
        echo "<p>$message Zamišljeni broj bio je {$_SESSION['target_number']}</p>";
        $_SESSION['target_number'] = rand(1, 9);
    }
    else{
        echo "<p>$message </p>";
    }
    ?>
</body>
</html>