<?php
ini_set('max_execution_time', -1);
include("../config_indemnifier.php");

function clean($string)
{
	$string = str_replace('', '-', $string); // Replaces all spaces with hyphens.

	return preg_replace('/[^A-Za-z0-9]/', '', $string); // Removes special chars.
}


//twsitara start
$Select4 = "SELECT intID FROM sapdata order by id desc limit 1;";
$exe_Select4 = mysqli_query($db, $Select4);
$data_Select4 = mysqli_fetch_assoc($exe_Select4);
$pt_id = $data_Select4['intID'];
if ($pt_id == NULL) {
	$pt_id = 0;
} else {
	$pt_id = $data_Select4['intID'];
}

$fileman_sap = "https://p2ptrack.com/api/interation.php?accesskey=12345&intID=$pt_id";
// $fileman_sap = "https://p2ptrack.com/api/interation.php?accesskey=12345&intID=31086";
$data_sap = file_get_contents($fileman_sap);
$array_sap = json_decode($data_sap, true);
// print_r($array_twsitara);
$i = 0;

foreach ($array_sap as $row_sap) {



	// $id_twsitara = $row_sap["UnitMasterID"];


	$deliveryno = $row_sap['deliveryno'];
	$tlno = $row_sap['tlno'];
	$driverid = $row_sap['driverid'];
	$drivername = $row_sap['dname'];
	$drivercnic = $row_sap['dcnic'];
	$drivernum = $row_sap['dnumber'];
	$tripstart = $row_sap['tripstart'];
	$tripend = $row_sap['tripend'];
	$alerts = $row_sap['alerts'];
	$Datesap = $row_sap['datetime'];
	$intID = $row_sap['id'];




	$sql = "INSERT INTO sapdata(deliveryno, tlno, driverid, dname, dcnic, dnumber, tripstart, tripend, alerts, datetime,status,intID) VALUES 
	     ('$deliveryno','$tlno','$driverid','$drivername','$drivercnic','$drivernum','$tripstart','$tripend','$alerts','$Datesap','0',$intID)";
	mysqli_query($db, $sql);

	$i++;
}


$sql1 = mysqli_query($db, "SELECT COUNT(*) as num FROM sapdata");

$result = mysqli_fetch_assoc($sql1);
echo '<br>' . $result['num'];
$t_row = $result['num'];
mysqli_close($db);
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="refresh" content="300">
	<title>Go Get Going With Go  Data</title>
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