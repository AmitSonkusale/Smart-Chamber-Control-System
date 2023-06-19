<?php
include 'config.php'; // Amit Sonkusale
session_start();
error_reporting(0);

// On/Off state
// AC
$sql_onoff_ac = "SELECT `c1state` FROM `amit_ka_table` WHERE `equipments` = 'Air Conditioner'";
$resultac = $conn->query($sql_onoff_ac);

if ($resultac->num_rows > 0) {

    while ($row = $resultac->fetch_assoc()) {
        $tmpac = $row['c1state'];
        if ($tmpac > 0) {
            $onoff_ac = "ON";
        } else {
            $onoff_ac = "OFF";
        }

    }
} else {
    $onoff_ac = 0;
}

// Ref
$sql_onoff_ref = "SELECT `c1state` FROM `amit_ka_table` WHERE `equipments` = 'Refrigerator'";
$resultref = $conn->query($sql_onoff_ref);

if ($resultref->num_rows > 0) {

    while ($row = $resultref->fetch_assoc()) {
        $tmpref = $row['c1state'];
        if ($tmpref > 0) {
            $onoff_ref = "ON";
        } else {
            $onoff_ref = "OFF";
        }

    }
} else {
    $onoff_ref = 0;
}

// Fan
$sql_onoff_fan = "SELECT `c1state` FROM `amit_ka_table` WHERE `equipments` = 'Fan'";
$resultfan = $conn->query($sql_onoff_fan);

if ($resultfan->num_rows > 0) {

    while ($row = $resultfan->fetch_assoc()) {
        $tmpfan = $row['c1state'];
        if ($tmpfan > 0) {
            $onoff_fan = "ON";
        } else {
            $onoff_fan = "OFF";
        }

    }
} else {
    $onoff_fan = 0;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    // Air Conditioner

    if (isset($_POST['acon'])) {
        $sql = "UPDATE `amit_ka_table` SET `c1state`=1 WHERE `equipments` = 'Air Conditioner'";
        $result = mysqli_query($conn, $sql);
    }

    if (isset($_POST['acoff'])) {
        $sql = "UPDATE `amit_ka_table` SET `c1state`=0 WHERE `equipments` = 'Air Conditioner'";
        $result = mysqli_query($conn, $sql);
    }

    // Refrigerator

    if (isset($_POST['refon'])) {
        $sql = "UPDATE `amit_ka_table` SET `c1state`=1 WHERE `equipments` = 'Refrigerator'";
        $result = mysqli_query($conn, $sql);
    }

    if (isset($_POST['refoff'])) {
        $sql = "UPDATE `amit_ka_table` SET `c1state`=0 WHERE `equipments` = 'Refrigerator'";
        $result = mysqli_query($conn, $sql);
    }

    // Fan

    if (isset($_POST['fanon'])) {
        $sql = "UPDATE `amit_ka_table` SET `c1state`=1 WHERE `equipments` = 'Fan'";
        $result = mysqli_query($conn, $sql);
    }

    if (isset($_POST['fanoff'])) {
        $sql = "UPDATE `amit_ka_table` SET `c1state`=0 WHERE `equipments` = 'Fan'";
        $result = mysqli_query($conn, $sql);
    }
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
        <div class="control" style="text-align: center;">
            Control
            <div style=height:60px;></div>
            <div class="hordiv">

                <div class="inner">
                    Air Conditioner </br>
                    </br> <button class="buttons" name="acon">ON</button>
                    <button class="buttonoff" name=acoff>OFF</button>

                    <div class="state">Current state
                        <?php echo $onoff_ac ?>
                    </div>

                </div>
                <div style=height:30px;></div>
                <div class="inner">
                    Cold Storage</br>
                    </br> <button class="buttons" name="refon">ON</button>
                    <button class="buttonoff" name="refoff">OFF</button>
                    <div class="state">Current state
                        <?php echo $onoff_ref ?>
                    </div>
                </div>

                <div style=height:30px;></div>
                <div class="inner">
                    Cooling Fan </br>
                    </br> <button class="buttons" name="fanon">ON</button>
                    <button class="buttonoff" name="fanoff">OFF</button>
                    <div class="state">Current state
                        <?php echo $onoff_fan ?>
                    </div>
                </div>

            </div>

        </div>
    </form>
</body>
</html>