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

//topfly start

$fileman_top = "http://topfly.sjsolutionz.com:8090/api/api.php?api=user&ver=1.0&key=8A1A03468671DC0D6378C9E77D16B632&cmd=OBJECT_GET_LOCATIONS_ALL,*";
$data_top = file_get_contents($fileman_top);
$top_array = json_decode($data_top, true);

foreach ($top_array as $rowtop) {

	$imeitop = clean($rowtop["name"]);
	$nametop = $rowtop["name"];
	$lattop = $rowtop["lat"];
	$lngtop = $rowtop["lng"];
	$angletop = $rowtop["angle"];
	$speedtop = $rowtop["speed"];
	$datetimetop = $rowtop["GpsDateTime"];
	$licensepntop = '112113114115';
	$odometertop = '333';
	$ignetiontop = $rowtop["AccStatus"];
	$protocoltop = "topflay";
	$last_idletop = '000';
	$last_movetop = '000';
	$last_stoptop = $rowtop["Location"];

	$sqltop = "INSERT INTO bulkdatanew (id,imei,st_server,lat,lng,angle,speed,name,sim_number,odometer,list,protocol,last_idle,last_move,last_stop,status)
VALUES ('topflay','$imeitop','$datetimetop','$lattop','$lngtop','$angletop','$speedtop','$nametop','$licensepntop','$odometertop','$ignetiontop','$protocoltop','$last_idletop','$last_movetop','$last_stoptop','0');";


	mysqli_query($connection, $sqltop);
}

//topfly end




if ($sqltop == true) {
	echo "<br> New record created successfully yeahoo TopFly";

} else {
	echo "Error: " . $sqltop . "<br>" . mysqli_error($connection);

}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta>
	<title>Sitara TopFly Data</title>
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