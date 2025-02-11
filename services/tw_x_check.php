<?php
ini_set('max_execution_time', -1);

include("../config_indemnifier.php");

function clean($string)
{
    $string = str_replace('', '-', $string); // Replaces all spaces with hyphens.

    return preg_replace('/[^A-Za-z0-9]/', '', $string); // Removes special chars.
}
$founds = array();


$tw_x = "http://portalxs.com/twpxcc/TrackingServices.asmx/TWPXCC_GetVData?secret_key=a3605b70-039b-45b1-95c9-47b4fe42002f";
$tw_x_file = file_get_contents($tw_x);
$tw_replace_by = str_replace('<string xmlns="http://tempuri.org/">', '', $tw_x_file);
$tw_replace1_by = str_replace('<?xml version="1.0" encoding="utf-8"?>', '', $tw_replace_by);
$tw_replace2_by = str_replace('</string>', '', $tw_replace1_by);
$content_tw_by = json_decode($tw_replace2_by, true);
$isvehicle = 0;
$notvehicle = 0;
$totalvehicle = 0;
foreach ($content_tw_by['_vehicleData'] as $tw_by) {
    $totalvehicle++;
    $tw_x_imei = "tw_x_" . clean($tw_by['RegNo']);
    $tw_x_vehicle = $tw_by['RegNo'];
    $tw_x_rdt = $tw_by['RDT'];
    $tw_x_time = str_replace("T", " ", $tw_x_rdt);
    $tw_x_lat = $tw_by['LAT'];
    $tw_x_lng = $tw_by['LON'];
    $tw_x_speed = $tw_by['Speed'];
    $tw_x_location = $tw_by['Location'];
    if ($tw_x_speed > 0) {
        $tw_x_ign = 'On';
    } else {
        $tw_x_ign = 'Off';
    }



    $sql = "SELECT * FROM inlist_tracker where  inlist_name='$tw_x_vehicle'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    //   $active = $row['active'];

    $count = mysqli_num_rows($result);

    if ($count > 0) {
       $founds[] = $tw_by;
        // echo 'Api Name' . $tw_x_vehicle . ' ==> ' . $row['inlist_name'] . '<br>';
        $isvehicle++;
    } else {
        // echo 'Api Name' . $tw_x_vehicle . ' ==> not fount in table <br>';
        $notvehicle++;
    }


}

echo 'Total Vehicle = ' . $totalvehicle;
echo '<br>';
echo 'Total Found = ' . $isvehicle;
echo '<br>';
echo 'Total Not Found = ' . $notvehicle;

print_r($founds)
?>