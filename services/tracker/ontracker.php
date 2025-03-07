<?php
ini_set('max_execution_time', -1);
include("../../config_indemnifier.php");

function clean($string)
{
	$string = str_replace('', '-', $string); // Replaces all spaces with hyphens.

	return preg_replace('/[^A-Za-z0-9]/', '', $string); // Removes special chars.
}

//ontrack start

$fileman_truckker = "http://ontrack.sjsolutionz.com:8080/api/api.php?api=user&ver=1.0&key=2FD6C9718F6D0134E84344931A6B4851&cmd=OBJECT_GET_LOCATIONS,*";
$data_truckker = file_get_contents($fileman_truckker);
$array_truckker = json_decode($data_truckker, true);
foreach ($array_truckker as $device_id => $device_data) {

	$time_server_truckker = $device_data["dt_server"];
	$imei_truckker = "ontrack" . clean($device_data["name"]);
	$vehicle_truckker = $device_data["name"];
	$LAT_truckker = $device_data["lat"];
	$LON_truckker = $device_data["lng"];
	$LandMark_truckker = $device_data["address"];
	$Speed_truckker = $device_data["speed"];
	if ($Speed_truckker > '0') {
		$ign_truckker = 'On';
	} else {
		$ign_truckker = 'Off';
	}

	$sql_tontracker = "INSERT INTO bulkdatanew (id,imei,st_server,lat,lng,angle,speed,name,sim_number,odometer,list,protocol,last_idle,last_move,last_stop,status)
 VALUES ('ontrack','$imei_truckker','$time_server_truckker','$LAT_truckker','$LON_truckker','360','$Speed_truckker','$vehicle_truckker','','3321','$ign_truckker','ontrack','$time_server_truckker','$time_server_truckker','$LandMark_truckker','0');";
	mysqli_query($db, $sql_tontracker);


}

//ontrack end




if ($sql_tontracker == true) {
	echo "<br> New record created successfully yeahoo OnTracker ";

} else {
	echo "Error: " . $sql_tontracker . "<br>" . mysqli_error($db);

}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="refresh" content="30">
	<title>Go Get Going With Go  OnTracker</title>
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