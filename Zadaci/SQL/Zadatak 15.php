<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <title>Tražilica Korisnika</title>
</head>
<body>
    <form action="search.php" method="GET">
        <input type="text" name="search" placeholder="Unesite ime ili prezime">
        <input type="submit" value="Pretraži">
    </form>
</body>
</html>

<?php
$con = mysqli_connect("localhost", "root", "123", "my_db");

if (!$con) {
    die("Ne mogu se povezati s bazom: " . mysqli_connect_error());
}

if (isset($_GET['search'])) {
    $search = mysqli_real_escape_string($con, $_GET['search']);
    
    // Upit za pretraživanje
    $query = "SELECT firstname AS 'First Name', lastname AS 'Last Name' FROM users WHERE firstname LIKE '%{$search}%' OR lastname LIKE '%{$search}%'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "<p>" . htmlspecialchars($row['First Name']) . " " . htmlspecialchars($row['Last Name']) . "</p>";
        }
    } else {
        echo "<p>Nema rezultata za: " . htmlspecialchars($search) . "</p>";
    }
} else {
    echo "<p>Unesite ime ili prezime za pretraživanje.</p>";
}

mysqli_close($con);
?>