<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <title>Prosjek i Konačna Ocjena</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .container {
            max-width: 600px;
            margin: auto;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        input[type="number"] {
            padding: 5px;
            font-size: 16px;
        }
        input[type="submit"] {
            padding: 10px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
        .result {
            margin-top: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container">
<h2>Unos ocjena s kolokvija</h2>
    <form method="post">
        <label for="first_exam">Ocjena s I. kolokvija:</label>
        <input type="number" id="first_exam" name="first_exam" min="1" max="5" required>

        <label for="second_exam">Ocjena s II. kolokvija:</label>
        <input type="number" id="second_exam" name="second_exam" min="1" max="5" required>

        <input type="submit" value="Izračunaj prosjek i konačnu ocjenu">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $first_exam = $_POST['first_exam'];
        $second_exam = $_POST['second_exam'];
        $average = ($first_exam + $second_exam) / 2;

        // Validacija unosa
        if ($first_exam >= 1 && $first_exam <= 5 && $second_exam >= 1 && $second_exam <= 5) {
            // Provjera da li je bilo koji od kolokvija negativan
            if ($first_exam == 1 || $second_exam == 1) {
                $final_grade = "Negativan";
            } else {
                // Određivanje konačne ocjene na temelju prosjeka
                if ($average >= 4.5) {
                    $final_grade = 5;
                } elseif ($average >= 3.5) {
                    $final_grade = 4;
                } elseif ($average >= 2.5) {
                    $final_grade = 3;
                } else {
                    $final_grade = 2;
                }
            }

            echo "<div class='result'>";
            echo "Prosjek ocjena: " . $average . "<br>";
            echo "Konačna ocjena: " . $final_grade;
            echo "</div>";
        } else {
            echo "<div class='result' style='color: red;'>Ocjene moraju biti između 1 i 5.</div>";
        }
    }
    ?>
</div>

</body>
</html>