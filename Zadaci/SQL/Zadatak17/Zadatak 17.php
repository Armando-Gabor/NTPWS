<?php
$servername = "localhost";
$username = "armando";
$password = "pass";
$dbname = "zadaci";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT u.id AS UserID, u.user_firstname AS FirstName, u.user_lastname AS LastName, c.country_name AS Country
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
    <title>User List with Countries</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>User List with Country Names</h2>

<table>
    <tr>
        <th>User ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Country</th>
    </tr>

<?php
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["UserID"]. "</td>";
        echo "<td>" . $row["FirstName"]. "</td>";
        echo "<td>" . $row["LastName"]. "</td>";
        echo "<td>" . $row["Country"]. "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>0 results</td></tr>";
}
$conn->close();
?>
</table>

</body>
</html>