<?php

include 'config.php'; 
session_start();
error_reporting(0);

// AC ON
$sql_ac_on_submit = "SELECT `c1on_time` FROM `timeout` WHERE `equipments` = 'air conditioner'";
$result_ac_on_submit = $conn->query($sql_ac_on_submit);

if ($result_ac_on_submit->num_rows > 0) {

    while ($row = $result_ac_on_submit->fetch_assoc()) {
        $setacon = $row['c1on_time'];
    }
}
// AC OFF
$sql_ac_off_submit = "SELECT `c1off_time` FROM `timeout` WHERE `equipments` = 'air conditioner'";
$result_ac_off_submit = $conn->query($sql_ac_off_submit);

if ($result_ac_off_submit->num_rows > 0) {

    while ($row = $result_ac_off_submit->fetch_assoc()) {
        $setacoff = $row['c1off_time'];
    }
}
// REF ON
$sql_ref_on_submit = "SELECT `c1on_time` FROM `timeout` WHERE `equipments` = 'refigerator'";
$result_ref_on_submit = $conn->query($sql_ref_on_submit);

if ($result_ref_on_submit->num_rows > 0) {

    while ($row = $result_ref_on_submit->fetch_assoc()) {
        $setrefon = $row['c1on_time'];
    }
}
// REF OFF
$sql_ref_off_submit = "SELECT `c1off_time` FROM `timeout` WHERE `equipments` = 'refigerator'";
$result_ref_off_submit = $conn->query($sql_ref_off_submit);

if ($result_ref_off_submit->num_rows > 0) {

    while ($row = $result_ref_off_submit->fetch_assoc()) {
        $setrefoff = $row['c1off_time'];
    }
}

// FAN ON
$sql_fan_on_submit = "SELECT `c1on_time` FROM `timeout` WHERE `equipments` = 'fan'";
$result_fan_on_submit = $conn->query($sql_fan_on_submit);

if ($result_fan_on_submit->num_rows > 0) {

    while ($row = $result_fan_on_submit->fetch_assoc()) {
        $setfanon = $row['c1on_time'];
    }
}
// FAN OFF
$sql_fan_off_submit = "SELECT `c1off_time` FROM `timeout` WHERE `equipments` = 'fan'";
$result_fan_off_submit = $conn->query($sql_fan_off_submit);

if ($result_fan_off_submit->num_rows > 0) {

    while ($row = $result_fan_off_submit->fetch_assoc()) {
        $setfanoff = $row['c1off_time'];
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['setacon'])) {
        $setacon = $_POST['setacon'];
    }
    if (!empty($_POST['setacoff'])) {
        $setacoff = $_POST['setacoff'];
    }

    // Ref
    if (!empty($_POST['setrefon'])) {
        $setrefon = $_POST['setrefon'];
    }
    if (!empty($_POST['setrefoff'])) {
        $setrefoff = $_POST['setrefoff'];
    }
    // fan
    if (!empty($_POST['setfanon'])) {
        $setfanon = $_POST['setfanon'];
    }
    if (!empty($_POST['setfanoff'])) {
        $setfanoff = $_POST['setfanoff'];
    }
}
// ac submit button
if (isset($_POST['acsubmit'])) {
    $sql = "UPDATE `timeout` SET `c1on_time`= $setacon, `c1off_time` = $setacoff WHERE `equipments` = 'air conditioner'";
    $result = mysqli_query($conn, $sql);
}
// ref submit button
if (isset($_POST['refsubmit'])) {
    $sql = "UPDATE `timeout` SET `c1on_time`= $setrefon, `c1off_time` = $setrefoff WHERE `equipments` = 'refrigerator'";
    $result = mysqli_query($conn, $sql);
}
// fan submit button
if (isset($_POST['fansubmit'])) {
    $sql = "UPDATE `timeout` SET `c1on_time`= $setfanon, `c1off_time` = $setfanoff WHERE `equipments` = 'fan'";
    $result = mysqli_query($conn, $sql);
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
            <div class="timeout" style="text-align: center;">
                Time Out
                <div style=height:60px;></div>
            <div class="hordiv">
                <!-- AC -->
                <div class="inner">
                    Air Conditioner </br>
                    <label for="setacon">ON</label>
                    <input type="number" id="setacon" name="setacon"
                        style="height:25px; width:70px; border-radius: 6px;">
                    <label for="setacoff">OFF</label>
                    <input type="number" id="setacon" name="setacoff"
                        style="height:25px; width:70px; border-radius: 6px;"> </br>
                    </br> <button class="buttons" name="acsubmit">SUBMIT</button>

                </div>
                <div style=height:30px;></div>
                <!-- Ref -->
                <div class="inner">
                    Cold Storage </br>
                    <label for="setrefon">ON</label>
                    <input type="number" id="setrefon" name="setrefon"
                        style="height:25px; width:70px; border-radius: 6px;">
                    <label for="setrefoff">OFF</label>
                    <input type="number" id="setrefoff" name="setrefoff"
                        style="height:25px; width:70px; border-radius: 6px;"> </br>
                    </br> <button class="buttons" name="refsubmit">SUBMIT</button>

                </div>
                <div style=height:30px;></div>
                <!-- Fan -->
                <div class="inner">
                    Cooling Fan </br>
                    <label for="setfanon">ON</label>
                    <input type="number" id="setfanon" name="setfanon"
                        style="height:25px; width:70px; border-radius: 6px;">
                    <label for="setfanoff">OFF</label>
                    <input type="number" id="setfanoff" name="setfanoff"
                        style="height:25px; width:70px; border-radius: 6px;"> </br>
                    </br> <button class="buttons" name="fansubmit">SUBMIT</button>

                </div>
            </div>
            </div>
        </div>
    </form>
</body>

</html>