<?php

include 'config.php';
session_start();
error_reporting(0);

//Maintainance
//Temprature
$sqltmp = "SELECT `c1units` FROM `readings` WHERE `parameters` = 'temperature'";
$resulttmp = $conn->query($sqltmp);

if ($resulttmp->num_rows > 0) {

    while ($row = $resulttmp->fetch_assoc()) {
        $tmp = $row['c1units'];
    }
} else {
    $tmp = 0;
}
// Humidity
$sqlhum = "SELECT `c1units` FROM `readings` WHERE `parameters` = 'humidity'";
$resulthum = $conn->query($sqlhum);

if ($resulthum->num_rows > 0) {

    while ($row = $resulthum->fetch_assoc()) {
        $hum = $row['c1units'];
    }
} else {
    $hum = 0;
}

// Gas
$sqlgas = "SELECT `c1units` FROM `readings` WHERE `parameters` = 'gas'";
$resultgas = $conn->query($sqlgas);

if ($resultgas->num_rows > 0) {

    while ($row = $resultgas->fetch_assoc()) {
        $gas = $row['c1units'];
    }
} else {
    $gas = 0;
}

?>



<!DOCTYPE html>
<html>

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="favicon.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles1.css">
    <link rel="stylesheet" type="text/css" href="base.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Project 1</title>
</head>
<style>
    .state {
        font-size: 12px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
</style>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>

<body>
    <div class="pos-f-t">
        <div class="collapse" id="navbarToggleExternalContent">
            <div class="bg-dark p-4">

            <span class="btn btn-one" onclick="window.location='../chamber1/control.php'">
                    CHAMBER 1
                </span>

                <span class="btn btn-one" onclick="window.location='../chamber2/control.php'">
                    CHAMBER 2
                </span>

                <span class="btn btn-one" onclick="window.location='../chamber3/control.php'">
                    CHAMBER 3
                </span>

                <span class="btn btn-one" onclick="window.location='../chamber4/control.php'">
                    CHAMBER 4
                </span>

            </div>
        </div>
        <nav class="navbar navbar-dark bg-dark">
            <div class="text-white">
                <span class="btn btn-one" onclick="window.location='control.php'">
                    CONTROL
                </span>

                <span class="btn btn-one" onclick="window.location='timeout.php'">
                    TIME OUT
                </span>

                <span class="btn btn-one" onclick="window.location='maintenance.php'">
                    MAINTENANCE
                </span>


            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </nav>
    </div>
    <div style=height:30px;></div>
    <div class="high" style="text-align: center;">
    <span class="highlight" style="text-align: center;"> Chamber 1</span> </div>
    <div style=height:30px;></div>


    <form method="post">
        <div class="container" style="justify-content: center;">
            <div class="maintenance" style="text-align: center;">
                Maintenance
                <div style=height:60px;></div>
                <div class="hordiv">
                    <div class="inner">
                        <!-- Temperature -->

                        <p>
                            <i class="fas fa-thermometer-half" style="color:#00add6;"></i>
                            <span>Temperature</span> </br> </br>
                            <span>
                                <?php echo $tmp ?>
                            </span>
                            <sup class="units">&deg;C</sup>
                        <div class="state">&nbsp;</div>
                        </p>

                    </div>
                    <div style=height:30px;></div>
                    <div class="inner">
                        <!-- Humidity -->

                        <p>
                            <i class="fas fa-tint" style="color:#00add6;"></i>
                            <span>Humidity</span> </br> </br>
                            <span>
                                <?php echo $hum ?>
                            </span>
                            <sup class="units">&percnt;</sup>
                        <div class="state">&nbsp;</div>
                        </p>

                    </div>
                    <div style=height:30px;></div>
                    <div class="inner">
                        <!-- Gas -->

                        <p>
                            <i class="fa fa-solid fa-fire" style="color:#00add6;"></i>
                            <span>Gas</span></br> </br>
                            <span>
                                <?php echo $gas ?>
                            </span>
                            <sup class="units">&Psi;</sup>
                        <div class="state">&nbsp;</div>
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
<script src="script.js"></script>
</html>