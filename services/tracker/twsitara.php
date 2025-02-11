<?php
ini_set('max_execution_time', -1);
include("../../config_indemnifier.php");
// Set the active MySQL database


function clean($string)
{
	$string = str_replace('', '-', $string); // Replaces all spaces with hyphens.

	return preg_replace('/[^A-Za-z0-9]/', '', $string); // Removes special chars.
}

//twsitara start

// $fileman_twsitara = "http://203.175.74.153/AgilityWebApi/api/Values/GetVehiclesByLogin_Test?key=e4dafbca-9049-439b-aabd-68e0b4aa7de4";
$fileman_twsitara = "http://202.166.170.217/AgilityWebApi/api/Values/GetVehiclesByLogin_Test?key=e4dafbca-9049-439b-aabd-68e0b4aa7de4";
$data_twsitara = file_get_contents($fileman_twsitara);
$array_twsitara = json_decode($data_twsitara, true);


foreach ($array_twsitara["Response"] as $row_twsitara) {

	$RecordDateTime_twsitara = $row_twsitara["RecordDateTime"];
	$time_server_twsitara = str_replace("T", " ", $RecordDateTime_twsitara);

	$id_twsitara = $row_twsitara["UnitMasterID"];

	$imei_twsitara = "tw" . clean($row_twsitara["Alias"]);

	$vehicle_twsitara = $row_twsitara["Alias"];

	$reason_twsitara = $row_twsitara["Reason"];

	$LAT_twsitara = $row_twsitara["LAT"];

	$LON_twsitara = $row_twsitara["LON"];

	$LandMark_twsitara = $row_twsitara["LandMark"];

	$Speed_twsitara = $row_twsitara["Speed"];
	if ($Speed_twsitara > '0') {
		$ign_sitara = 'On';
	} else {
		$ign_sitara = 'Off';
	}






	$sql_twsitara = "INSERT INTO bulkdatanew (id,imei,st_server,lat,lng,angle,speed,name,sim_number,odometer,list,protocol,last_idle,last_move,last_stop,status)
 VALUES ('tw_sitara','$imei_twsitara','$time_server_twsitara','$LAT_twsitara','$LON_twsitara','360','$Speed_twsitara','$vehicle_twsitara','$id_twsitara','3321','$ign_sitara','tw_sitara','$time_server_twsitara','$time_server_twsitara','$LandMark_twsitara','0');";
	mysqli_query($db, $sql_twsitara);


}

//twsitara end

if ($sql_twsitara == true) {
	echo "<br> New record created successfully yeahoo Tracking world ";

} else {
	echo "Error: " . $sql_twsitara . "<br>" . mysqli_error($db);

}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="refresh" content="120">
	<title>Sitara Tracking world Data</title>
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