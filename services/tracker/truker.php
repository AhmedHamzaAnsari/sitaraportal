<?php
ini_set('max_execution_time', -1);
include("../../config_indemnifier.php");
function clean($string)
{
	$string = str_replace('', '-', $string); // Replaces all spaces with hyphens.

	return preg_replace('/[^A-Za-z0-9]/', '', $string); // Removes special chars.
}

//truckker start

$fileman_truckker = "http://151.106.17.246:8080/sitara/services/truker.php";
$data_truckker = file_get_contents($fileman_truckker);
$array_truckker = json_decode($data_truckker,true);
foreach($array_truckker['data'] as $row_truckker){
	
	$time_server_truckker = $row_truckker["gpstime"];
	 $id_truckker = $row_truckker["trackerId"];
	 $imei_truckker = "truckker".clean($row_truckker["plateNumber"]);
	$vehicle_truckker = $row_truckker["plateNumber"];
	 $LAT_truckker = $row_truckker["lat"];
	 $LON_truckker = $row_truckker["lng"];
	 $LandMark_truckker = $row_truckker["referenceLoc"];
	 $Speed_truckker = $row_truckker["speed"];
	if ($Speed_truckker > '0'){
		 $ign_truckker = 'On';
	}
	else{
		 $ign_truckker = 'Off';
	}
	
 $sql_truckker = "INSERT INTO bulkdatanew (id,imei,st_server,lat,lng,angle,speed,name,sim_number,odometer,list,protocol,last_idle,last_move,last_stop,status)
 VALUES ('trukker','$imei_truckker','$time_server_truckker','$LAT_truckker','$LON_truckker','360','$Speed_truckker','$vehicle_truckker','$id_truckker','3321','$ign_truckker','trukker','$time_server_truckker','$time_server_truckker','$LandMark_truckker','0');";
 mysqli_query( $db,$sql_truckker);


}

//truckker end




if ($sql_truckker == true) {
	echo "<br> New record created successfully yeahoo Trukker ";

} else {
	echo "Error: " . $sql_truckker . "<br>" . mysqli_error($db);

}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="refresh" content="30">
	<title>Sitara Trukker Data</title>
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