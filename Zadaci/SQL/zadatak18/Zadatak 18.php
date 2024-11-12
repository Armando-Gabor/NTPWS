<?php
$servername = "localhost";
$username = "armando";
$password = "pass";
$dbname = "zadaci";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$countryOptions = ""; 
$countryQuery = $conn->query("SELECT country_code, country_name FROM countries ORDER BY country_name");
while($country = $countryQuery->fetch_assoc()) {
    $countryOptions .= "<option value='{$country['country_code']}'>{$country['country_name']}</option>";
}


if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])){
    $userId = $_POST['update'];
    $firstName = $_POST['user_firstname'][$userId];
    $lastName = $_POST['user_lastname'][$userId];
    $countryCode = $_POST['country_code'][$userId];

    $updateSql = "UPDATE users 
                  SET user_firstname = ?, 
                      user_lastname = ?, 
                      country_code = ? 
                  WHERE id = ?";
    
    $stmt = $conn->prepare($updateSql);
    
    echo "<script>console.log('Country code being updated to: ' + " . json_encode($countryCode) . ");</script>";
    
    $stmt->bind_param("sssi", $firstName, $lastName, $countryCode, $userId);

    if($stmt->execute()){
        echo "<script>alert('User updated successfully.');</script>";
    } else {
        echo "<script>alert('Update failed.');</script>";
    }
    $stmt->close();
}

$sql = "SELECT u.id AS UserID, u.user_firstname AS FirstName, u.user_lastname AS LastName, c.country_code AS CountryCode, c.country_name AS Country
        FROM users u
        JOIN countries c ON u.country_code = c.country_code
        ORDER BY u.id";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista korisnika</title>
</head>
<body>

<h2>Lista korisnika s državama</h2>

<form method="post" action="">
<table>
    <tr>
        <th>User ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Country</th>
        <th>Actions</th>
    </tr>

<?php
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr id='row-{$row["UserID"]}'>";
        echo "<td>{$row["UserID"]}</td>";
        echo "<td><input type='text' name='user_firstname[{$row["UserID"]}]' value='{$row["FirstName"]}'></td>";
        echo "<td><input type='text' name='user_lastname[{$row["UserID"]}]' value='{$row["LastName"]}'></td>";
        echo "<td>";
        echo "<select name='country_code[{$row["UserID"]}]'>";
        $countryQuery->data_seek(0);
        while($country = $countryQuery->fetch_assoc()) {
            $selected = ($row["CountryCode"] == $country['country_code']) ? "selected" : "";
            echo "<option value='{$country['country_code']}' $selected>{$country['country_name']}</option>";
        }
        echo "</select>";
        echo "</td>";
        echo "<td><button type='submit' name='update' value='{$row["UserID"]}'>Update</button></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5'>0 results</td></tr>";
}
?>
</table>
</form>

</body>
</html>

<?php $conn->close(); ?>