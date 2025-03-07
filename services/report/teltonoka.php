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
$fileman_teltonika =
	"http://3star.sjsolutionz.com/api/api.php?api=user&ver=1.0&key=2681E9BD666155E393C3573B0F5FB37B&cmd=OBJECT_GET_LOCATIONS_ALL,*";
$data_teltonika = file_get_contents($fileman_teltonika);
$array_teltonika = json_decode($data_teltonika, true);




foreach ($array_teltonika as $row_teltonika) {

	$time_server_tel = $row_teltonika["GpsDateTime"];

	$imeitel = "telto" . clean($row_teltonika["name"]);
	$nametel = $row_teltonika["name"];
	$lattel = $row_teltonika["lat"];
	$lngtel = $row_teltonika["lng"];
	$angletel = $row_teltonika["angle"];
	$speedtel = $row_teltonika["speed"];

	$licensepntel = '112113114115';
	$odometertel = '3333';
	$ignetiontel = $row_teltonika["speed"];
	if ($ignetiontel > '0') {
		$igntel = 'On';
	} else {
		$igntel = 'Off';
	}
	$protocoltel = "teltonika";
	$last_idletel = $time_server_tel;
	$last_movetel = $time_server_tel;
	$last_stoptel = $row_teltonika['Location'];

	$sqltelto = "INSERT INTO bulkdatanew
(id,imei,st_server,lat,lng,angle,speed,name,sim_number,odometer,list,protocol,last_idle,last_move,last_stop,status)
VALUES
('teltonika','$imeitel','$time_server_tel','$lattel','$lngtel','$angletel','$speedtel','$nametel','$licensepntel','$odometertel','$igntel','$protocoltel','$last_idletel','$last_movetel','$last_stoptel','0');";


	mysqli_query($connection, $sqltelto);
}

if ($sqltelto == true) {
	$dd = date("Y-m-d");
	echo "<br> New record created successfully yeahoo Universal ";
	

} else {
	echo "Error: " . $sqluni . "<br>" . mysqli_error($connection);

}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta >
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