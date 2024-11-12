<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 400px;
            margin: auto;
            padding: 20px;
        }
        h2 {
            color: #333;
        }
        label {
            display: block;
            margin-top: 10px;
        }
        input[type="text"], input[type="email"], input[type="password"], select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            margin-top: 5px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: green;
            color: white;
            border: none;
            cursor: pointer;
            margin-top: 10px;
        }
        .error {
            color: red;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
    <h2>Registration Form</h2>
    <form action="" method="post">
        <label for="first_name">First Name *</label>
        <input type="text" id="first_name" name="first_name" placeholder="Your name...">
        
        <label for="last_name">Last Name *</label>
        <input type="text" id="last_name" name="last_name" placeholder="Your last name...">
        
        <label for="email">Your E-mail *</label>
        <input type="email" id="email" name="email" placeholder="Your e-mail...">
        
        <label for="username">Username *<span class="error"> (Username must have min 5 and max 10 char)</span></label>
        <input type="text" id="username" name="username" placeholder="Username...">
        
        <label for="password">Password *<span class="error"> (Password must have min 4 char)</span></label>
        <input type="password" id="password" name="password" placeholder="Password...">
        
        <label for="country">Country:</label>
        <select id="country" name="country">
            <option value="" selected disabled>Molimo odaberite</option>
            <option value="hr">Croatia</option>
            <option value="srb">Srbija</option>
            <option value="slo">Slovenija</option>
        </select>
        
        <input type="submit" value="Submit" name="submit">
    </form>

    <?php
        $host = 'localhost';
        $user = 'armando';
        $password = 'pass';
        $database = 'zadaci';

        $conn = new mysqli($host, $user, $password, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if (isset($_POST['submit'])) {
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $email = $_POST['email'];
            $username = $_POST['username'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $country = isset($_POST['country']) ? $_POST['country'] : NULL;
            echo "<p>Ar</p>";

            $stmt = $conn->prepare("INSERT INTO zadatak16 (firstname, lastname, email, username, password, country) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssss", $first_name, $last_name, $email, $username, $password, $country);

            if ($stmt->execute()) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
            $conn->close();
        }
    ?>
</body>
</html>