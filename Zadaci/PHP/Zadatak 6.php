<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <title>Kalkulator (Switch naredba)</title>
</head>
<body>

<form method="post">
    <div>
        <label for="first_num">Unesi prvi broj:</label>
        <input type="number" id="first_num" name="first_num" required>
    </div>
    <div>
        <label for="second_num">Unesi drugi broj:</label>
        <input type="number" id="second_num" name="second_num" required>
    </div>
    <div>
        <input type="submit" value="+" name="operation">
        <input type="submit" value="-" name="operation">
        <input type="submit" value="*" name="operation">
        <input type="submit" value="/" name="operation">
    </div>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_num = $_POST['first_num'];
    $second_num = $_POST['second_num'];
    $operation = $_POST['operation'];

    switch ($operation) {
        case '+':
            $result = $first_num + $second_num;
            $operation_symbol = '+';
            break;
        case '-':
            $result = $first_num - $second_num;
            $operation_symbol = '-';
            break;
        case '*':
            $result = $first_num * $second_num;
            $operation_symbol = '*';
            break;
        case '/':
            if ($second_num != 0) {
                $result = $first_num / $second_num;
                $operation_symbol = '/';
            } else {
                $result = "Error: Division by zero!";
                $operation_symbol = '';
            }
            break;
        default:
            $result = "Error: Invalid operation!";
            $operation_symbol = '';
            break;
    }

    echo "<p>Rezultat: $first_num $operation_symbol $second_num = $result</p>";
}
?>

</body>
</html>