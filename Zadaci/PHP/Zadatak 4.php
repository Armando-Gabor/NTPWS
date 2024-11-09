<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <title>Izračunajte vrijednost c</title>
</head>
<body>
    <form method="post">
        <label for="a">Vrijednost a:</label>
        <input type="number" id="a" name="a" required><br><br>

        <label for="b">Vrijednost b:</label>
        <input type="number" id="b" name="b" required><br><br>

        <input type="submit" value="Pošalji">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Preuzimanje vrijednosti iz forme
        $a = $_POST['a'];
        $b = $_POST['b'];

        // Izračunavanje vrijednosti c
        $c = ((3 * $a) - $b) / 2;

        // Ispis rezultata
        echo "<p>Vrijednost c je: $c </p>";
    }
    ?>
</body>
</html>