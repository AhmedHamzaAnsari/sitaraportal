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

//tw_x_start

$tw_x =
	"https://tw.portalxs.com/twpxapis/TrackingServices.asmx/TWPXCC_GetVData?secret_key=a3605b70-039b-45b1-95c9-47b4fe42002f";
$tw_x_file = file_get_contents($tw_x);
$tw_replace_by = str_replace('<string xmlns="http://tempuri.org/">', '', $tw_x_file);
$tw_replace1_by = str_replace('
    <?xml version="1.0" encoding="utf-8"?>', '', $tw_replace_by);
$tw_replace2_by = str_replace('
</string>', '', $tw_replace1_by);
$content_tw_by = json_decode($tw_replace2_by, true);
foreach ($content_tw_by['_vehicleData'] as $tw_by) {
	$tw_x_imei = "tw_x_" . clean($tw_by['RegistrationNumber']);
	$tw_x_vehicle = $tw_by['RegistrationNumber'];
	$tw_x_rdt = $tw_by['LastIgnitionStatusDateTime'];
	//$tw_x_time = str_replace("T", " ", $tw_x_rdt);
	$tw_x_lat = $tw_by['Latitude'];
	$tw_x_lng = $tw_by['Longitude'];
	$tw_x_speed = $tw_by['Speed'];
	$tw_x_location = $tw_by['Address'];
	
	preg_match('/\/Date\((\d+)\)\//', $tw_x_rdt, $matches);
$timestamp = $matches[1] / 1000; // Milliseconds ko seconds mein convert karna

// DateTime object banayen
$date = new DateTime("@$timestamp");
$date->setTimezone(new DateTimeZone('UTC')); // Agar timezone zaroori hai toh yahan set karein

// New format main convert karen (for example: d/m/Y H:i:s format)
$formattedDate = $date->format('Y-m-d H:i:s');

	if ($tw_x_speed > 0) {
		$tw_x_ign = 'On';
	} else {
		$tw_x_ign = 'Off';
	}

	$sql_tw_x = "INSERT INTO bulkdatanew
(id,imei,st_server,lat,lng,angle,speed,name,sim_number,odometer,list,protocol,last_idle,last_move,last_stop,status)
VALUES
('tw_x','$tw_x_imei','$formattedDate','$tw_x_lat','$tw_x_lng','360','$tw_x_speed','$tw_x_vehicle','$tw_x_vehicle','3321','$tw_x_ign','tw_x','$formattedDate','$formattedDate','$tw_x_location','0');";
	mysqli_query($connection, $sql_tw_x);

}

//tw_x_end

//twsitara end

if ($sql_tw_x == true) {
	echo "<br> New record created successfully yeahoo TWX ";

} else {
	echo "Error: " . $sql_tw_x . "<br>" . mysqli_error($connection);

}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta >
	<title>Sitara TWX</title>
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