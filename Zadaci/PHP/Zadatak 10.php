<?php
// Function to count words in a sentence
function countWords($sentence) {
    // Use str_word_count to count the words
    $wordCount = str_word_count($sentence);
    return $wordCount;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Brojač riječi</title>
</head>
<body>
    <form method="post" action="">
        <label for="sentence">Unesite rečenicu:</label>
        <input type="text" id="sentence" name="sentence" required>
        <input type="submit" value="Ispiši broj riječi">
    </form>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Get the sentence from the form input
            $sentence = $_POST['sentence'];
            
            // Count the words
            $wordCount = countWords($sentence);

            // Output the result
            echo "U rečenici ima $wordCount riječi.<br>";
            echo "Unesena rečenica: $sentence";
        }
    ?>
</body>
</html>