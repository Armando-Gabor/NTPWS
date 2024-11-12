<?php
$date = date("Y/m/d");
$url = "https://www.metaweather.com/api/location/851128/$date/";

$json_data = json_decode(file_get_contents($url), true);

if(!empty($json_data)):
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Vremenska prognoza - Zagreb</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>p {margin: 0.3em}</style>
</head>
<body>
    <div class="container">
        <h1>Vrijeme za Zagreb</h1>
        <p>Datum: <?= date("j.m.Y"); ?></p>
        <?php foreach($json_data as $data): ?>
            <p><img style="width: 100px;" src="https://www.metaweather.com/static/img/weather/<?= $data['weather_state_abbr'] ?>.svg" alt="<?= $data['weather_state_name'] ?>"></p>
            <p><strong>Vrijeme:</strong> <?= $data['weather_state_name'] ?></p>
            <p><strong>Smjer vjetra:</strong> <?= $data['wind_direction_compass'] ?></p>
            <p><strong>Temperatura:</strong> <?= $data['the_temp'] ?> °C</p>
            <hr>
        <?php endforeach; ?>
    </div>
</body>
</html>
<?php 
else:
    echo "<div class='container'><h1>Error:</h1><p>API više ne funkcionira.</p></div>";
endif;
?>