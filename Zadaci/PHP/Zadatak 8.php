<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <title>Igra (pogodi broj)</title>
</head>
<body>
    <form method="post">
        <label for="cars">Označi vozilo:</label><br>
            <input type="radio" name="cars" id="Audi" value="Audi">
            <label for="Audi">Audi</label><br>
            <input type="radio" name="cars" id="BMW" value="BMW">
            <label for="BMW">BMW</label><br>
            <input type="radio" name="cars" id="Renault" value="Renault">
            <label for="Renault">Renault</label><br>
            <input type="radio" name="cars" id="Citroen" value="Citroen">
            <label for="Citroen">Citroen</label><br>
        <input type="submit" value="Pošalji">

        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                $auto = $_POST["cars"];
                echo "<p>Odabrani auto je $auto.</p>";
            }
        ?>
    </form>
</body>
</html>