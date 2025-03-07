<?php
ini_set('max_execution_time', -1);
$username = "root";
$password = "";
$database = "sitara";

// Opens a connection to a MySQL server
$connection = mysqli_connect('localhost', $username, $password, $database);
if (!$connection) {
    die('Not connected : ' . mysqli_error());
}

// Set the active MySQL database
$db_selected = mysqli_select_db($connection, $database);
if (!$db_selected) {
    die('Can\'t use db : ' . mysqli_error());
}

function clean($string)
{
    $string = str_replace('', '-', $string); // Replaces all spaces with hyphens.

    return preg_replace('/[^A-Za-z0-9]/', '', $string); // Removes special chars.
}

//universal start
$fileman_qtrack =
    'https://login.aitrack.pk/api/get_devices?user_api_hash=$2y$10$MWdI3fsiX4YhnhYDdomLzetApTdSmqRmBwvq/cY43WaQIv9o7HIP6';
$data_qtrack = file_get_contents($fileman_qtrack);
$array_qtrack = json_decode($data_qtrack, true);
foreach ($array_qtrack['0']['items'] as $qtrack) {

    $nameqtrack = $qtrack["name"];
    $timepm = $qtrack["time"];
    $timevpm = date_create($timepm);
    echo $timeqtrack = date_format($timevpm, "Y-m-d H:i:s");
    echo "<br>";
    $idqtrack = $qtrack["name"];
    $imeiqtrack = "qtrack" . clean($qtrack["name"]);
    $vehicleqtrack = $qtrack["name"];
    $LATqtrack = $qtrack["lat"];
    $LONqtrack = $qtrack["lng"];
    $LandMarkqtrack = $qtrack["addr"];
    $Speedqtrack = $qtrack["speed"];
    if ($Speedqtrack > '0') {
        $ignqtrack = 'On';
    } else {
        $ignqtrack = 'Off';
    }






    $sql_qtrack = "INSERT INTO bulkdatanew
(id,imei,st_server,lat,lng,angle,speed,name,sim_number,odometer,list,protocol,last_idle,last_move,last_stop,status)
VALUES
('q_tracker','$imeiqtrack','$timeqtrack','$LATqtrack','$LONqtrack','360','$Speedqtrack','$vehicleqtrack','$idqtrack','3321','$ignqtrack','q_tracker','$timeqtrack','$timeqtrack','$LandMarkqtrack','0');";
    mysqli_query($connection, $sql_qtrack);


}

if ($sql_qtrack == true) {
    $dd = date("Y-m-d");
    echo "<br> New record created successfully yeahoo Universal ";


} else {
    echo "Error: " . $sql_qtrack . "<br>" . mysqli_error($connection);

}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta>
    <title>Go Get Going With Go  Universal Data</title>
    <style>
        .progress {
            height: 3px !important;
            margin-bottom: 1px !important;
        }
    </style>
</head>

<body style="background: #fff;">
    <div class="col-md-8">

        <div class="col-md-12">
            <br>
            <?php echo "Successfully done" . "<br>";
            echo date("d-m-Y H:i:s", time()); ?>
        </div>
</body>

</html>