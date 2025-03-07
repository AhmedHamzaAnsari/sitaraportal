<?php
ini_set('max_execution_time', -1);
include("../../config_indemnifier.php");
function clean($string)
{
	$string = str_replace('', '-', $string); // Replaces all spaces with hyphens.

	return preg_replace('/[^A-Za-z0-9]/', '', $string); // Removes special chars.
}

//universal start
$fileuni = "http://universal.sjsolutionz.com:8060/api/api.php?api=user&ver=1.0&key=105BD1DECBCE5FEB537F58E873AAA5FD&cmd=OBJECT_GET_LOCATIONS_ALL,*";
$datauni = file_get_contents($fileuni);
$arrayuni = json_decode($datauni, true);



foreach ($arrayuni as $rowuni) {

	$imeiuni = clean($rowuni["name"]);
	$nameuni = $rowuni["RegNo"];
	$latuni = $rowuni["lat"];
	$lnguni = $rowuni["lng"];
	$angleuni = $rowuni["angle"];
	$speeduni = $rowuni["speed"];
	$datetimeuni = $rowuni["GpsDateTime"];
	$licensepnuni = '112113114115';
	$odometeruni = '000';
	if ($speeduni > 0) {
		$ignetionuni = 'On';
	} else {
		$ignetionuni = 'Off';
	}
	$protocoluni = "Universal";
	$last_idleuni = '000';
	$last_moveuni = '000';
	$last_stopuni = $rowuni["Location"];

	$sqluni = "INSERT INTO bulkdatanew (id,imei,st_server,lat,lng,angle,speed,name,sim_number,odometer,list,protocol,last_idle,last_move,last_stop,status)
VALUES ('Universal','$imeiuni','$datetimeuni','$latuni','$lnguni','$angleuni','$speeduni','$nameuni','$licensepnuni','$odometeruni','$ignetionuni','$protocoluni','$last_idleuni','$last_moveuni','$last_stopuni','0');";


	mysqli_query($db, $sqluni);
}
if ($sqluni == true) {
	$dd = date("Y-m-d");
	echo "<br> New record created successfully yeahoo Universal ";
	$q_delete = "DELETE FROM bulkdatanew where st_server <='$dd' order by st_server asc";
	$sql_delete = mysqli_query($db, $q_delete);

} else {
	echo "Error: " . $sqluni . "<br>" . mysqli_error($db);

}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="refresh" content="60">
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