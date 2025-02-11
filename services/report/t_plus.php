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

//tracking_plus start
$apiResponse = "http://localhost/sitara/services/go-tracking.php";
$data = file_get_contents($apiResponse);

$jsonData = json_decode($data, true);

if (isset($jsonData['root']['VehicleData'])) {
	$vehicleData = $jsonData['root']['VehicleData'];

	foreach ($vehicleData as $vehicle) {
		if (isset($vehicle['Vehicle_Name'])) {
			$vehicleName = $vehicle['Vehicle_Name'];
			$vehicleimei = "tplu" . clean($vehicle['Vehicle_Name']);
			$vehiclelat = $vehicle['Latitude'];
			$vehiclelon = $vehicle['Longitude'];
			$vehicledate = $vehicle['Datetime'];
			$old_date_veh = date($vehicledate);
			$old_date_timestamp_veh = strtotime($old_date_veh);
			$time_server_vehi = date('Y-m-d H:i:s', $old_date_timestamp_veh);
			$vehicleign = $vehicle['IGN'];
			$vehiclespeed = $vehicle['Speed'];
			$vehiclelocation = $vehicle['Location'];


			$sql_vehi = "INSERT INTO bulkdatanew
(id,imei,st_server,lat,lng,angle,speed,name,sim_number,odometer,list,protocol,last_idle,last_move,last_stop,status)
VALUES
('t_plus','$vehicleimei','$time_server_vehi','$vehiclelat','$vehiclelon','360','$vehiclespeed','$vehicleName','$vehicleName','3321','$vehicleign','t_plus','$time_server_vehi','$time_server_vehi','$vehiclelocation','0');";
			mysqli_query($connection, $sql_vehi);
			// You can use $vehicleName as needed
		}
	}
} else {
	echo "Invalid JSON format or missing 'VehicleData' key.";
}
//tracking_plus end




if ($sql_vehi == true) {
	echo "<br> New record created successfully yeahoo Tracking Plus ";

} else {
	echo "Error: " . $sql_vehi . "<br>" . mysqli_error($connection);

}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta >
	<title>Sitara Tracking Plus Data</title>
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