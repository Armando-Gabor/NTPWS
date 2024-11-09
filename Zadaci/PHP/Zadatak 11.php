<?php
    function isPrime($num) {
        if ($num <= 1) {
            return false;
        }
        for ($i = 2; $i * $i <= $num; $i++) {
            if ($num % $i == 0) {
                return false;
            }
        }
        return true;
    }
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <title>Provjera prostih brojeva</title>
</head>
<body>
    <form method="post" action="">
        <label for="number">Unesite broj:</label>
        <input type="number" id="number" name="number" required>
        <input type="submit" value="Provjeri">
    </form>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $number = (int)$_POST['number'];
            
            if (isPrime($number)) {
                echo "$number je prost broj.";
            } else {
                echo "$number nije prost broj.";
            }
            
            $primes = [];
            for ($num = 2; $num < 100; $num++) {
                if (isPrime($num)) {
                    $primes[] = $num;
                }
            }
            echo "<br>Prosti brojevi manje od 100: " . implode(", ", $primes);
            
        }
    ?>
</body>
</html>