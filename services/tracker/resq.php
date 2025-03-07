<?php
ini_set('max_execution_time', -1);

include("../../config_indemnifier.php");
function clean($string)
{
	$string = str_replace('', '-', $string); // Replaces all spaces with hyphens.

	return preg_replace('/[^A-Za-z0-9]/', '', $string); // Removes special chars.
}

//resqstart
$fileman_resq911 = "http://localhost:8080/sitara/services/resq.php";
$data_resq911 = file_get_contents($fileman_resq911);
$array_resq911 = json_decode($data_resq911, true);



foreach ($array_resq911['data'] as $row_resq911) {

	$datetresq = $row_resq911["GPSDateTime"];
	$datebbresq = date_create($datetresq);
	$datetimeres = date_format($datebbresq, "Y-m-d H:i:s");
	$imeires = "res" . clean($row_resq911["VRN_Number"]);
	$nameres = $row_resq911["VRN_Number"];
	$latres = $row_resq911["VehicleLatitude"];
	$lngres = $row_resq911["VehicleLongitude"];
	$angleres = $row_resq911["VehicleAngle"];
	$speedres = $row_resq911["VehicleSpeed"];
	$licensepnres = '112113114115';
	$odometerres = $row_resq911['OdometerReading'];
	$ignetionres = $row_resq911["PowerIgnition"];
	$protocolres = "resq911";
	$last_idleres = '000';
	$last_moveres = '000';
	$last_stopres = $row_resq911['VehicleLocation'];

	$sqlresq = "INSERT INTO bulkdatanew (id,imei,st_server,lat,lng,angle,speed,name,sim_number,odometer,list,protocol,last_idle,last_move,last_stop,status)
VALUES ('resq911','$imeires','$datetimeres','$latres','$lngres','$angleres','$speedres','$nameres','$licensepnres','$odometerres','$ignetionres','$protocolres','$last_idleres','$last_moveres','$last_stopres','0');";


	mysqli_query($db, $sqlresq);


}
//resqend

if ($sqlresq == true) {
	echo "<br> New record created successfully yeahoo Resq ";

} else {
	echo "Error: " . $sqlresq . "<br>" . mysqli_error($db);

}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="refresh" content="30">
	<title>Go Get Going With Go  Resq Data</title>
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