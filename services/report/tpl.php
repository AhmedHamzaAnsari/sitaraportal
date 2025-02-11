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

//new-tpl start


//$filetpl = "https://mytrakker.tpltrakker.com/TrakkerServices_Stag/Api/Home/GetVLL/0404502130/2130";
// $filetpl = "https://mytrakker.tpltrakker.com/TrakkerServices/Api/Home/GetVLL/0404502130/1234";
$filetpl = "https://mytrakker.tpltrakker.com/TrakkerServices/Api/Home/GetVLL/0404502130/2130";
$datatpl = file_get_contents($filetpl);
$arraytpl = json_decode($datatpl, true);



foreach ($arraytpl as $sitaratpl) {

	$imeitplnew = "tpl" . clean($sitaratpl["RegNo"]);
	$nametplnew = $sitaratpl["RegNo"];
	$lattplnew = $sitaratpl["Lat"];
	$lngtplnew = $sitaratpl["Long"];
	$angletplnew = $sitaratpl["Direction"];
	$speedtplnew = $sitaratpl["Speed"];
	$datetimetplnew = $sitaratpl["GpsDateTime"];
	$datebbtpl = date_create($datetimetplnew);
	$datetimetpl = date_format($datebbtpl, "Y-m-d H:i:s");
	$licensepntplnew = '112113114115';
	$odometertplnew = '000';
	$ignetiontplnew = $sitaratpl["Ignition"];
	$protocoltplnew = "TPL";
	$last_idletplnew = '000';
	$last_movetplnew = '000';
	$last_stoptplnew = $sitaratpl["Location"];

	$sqltplnew = "INSERT INTO bulkdatanew (id,imei,st_server,lat,lng,angle,speed,name,sim_number,odometer,list,protocol,last_idle,last_move,last_stop,status)
VALUES ('TPL','$imeitplnew','$datetimetpl','$lattplnew','$lngtplnew','$angletplnew','$speedtplnew','$nametplnew','$licensepntplnew','$odometertplnew','$ignetiontplnew','$protocoltplnew','$last_idletplnew','$last_movetplnew','$last_stoptplnew','0');";


	mysqli_query($connection, $sqltplnew);
}

//new-tpl end


if ($sqltplnew == true) {
	echo "<br> New record created successfully yeahoo TPL ";

} else {
	echo "Error: " . $sqltplnew . "<br>" . mysqli_error($connection);

}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta>
	<title>Sitara TPL Data</title>
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