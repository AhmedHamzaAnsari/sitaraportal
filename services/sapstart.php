<?php
ini_set('max_execution_time', -1);
include("../config_indemnifier.php");

function clean($string)
{
	$string = str_replace('', '-', $string); // Replaces all spaces with hyphens.

	return preg_replace('/[^A-Za-z0-9]/', '', $string); // Removes special chars.
}

$Date = date("Y-m-d");
$sapdata = "SELECT * FROM sapdata where tripstart = 1  and datetime >='$Date';";
$sql_sapdata = mysqli_query($db, $sapdata);
mysqli_error($db);

while ($rowdata = mysqli_fetch_array($sql_sapdata)) {

	$loadnum = $rowdata['deliveryno'];
	$deliveryno = $rowdata['deliveryno'];
	$tlno = $rowdata['tlno'];
	$driverid = $rowdata['driverid'];
	$drivername = $rowdata['dname'];
	$drivercnic = $rowdata['dcnic'];
	$drivernum = $rowdata['dnumber'];
	$tripstart = $rowdata['tripstart'];
	$tripend = $rowdata['tripend'];
	$alerts = $rowdata['alerts'];
	$Datesap = $rowdata['datetime'];
	echo "<br>";
	$sapstart = "SELECT * FROM sapstart where deliveryno ='$loadnum' and tripstart=1;";
	$sql_start = mysqli_query($db, $sapstart);
	if (mysqli_num_rows($sql_start) == 0) {
		$sql = "INSERT INTO sapstart(deliveryno, tlno, driverid, dname, dcnic, dnumber, tripstart, tripend, alerts, datetime,status) VALUES 
				('$deliveryno','$tlno','$driverid','$drivername','$drivercnic','$drivernum','$tripstart','$tripend','$alerts','$Datesap','0')";
		mysqli_query($db, $sql);
	} else {
		echo "Do Nothing" . $loadnum . ". <br>";
	}
}

$sapdatastart = "SELECT * FROM sapdata where tripend = 1 and datetime >='$Date';";
$sql_sapdatastart = mysqli_query($db, $sapdatastart);
mysqli_error($db);

while ($rowdataend = mysqli_fetch_array($sql_sapdatastart)) {

	$loadnum_end = $rowdataend['deliveryno'];
	$deliveryno_end = $rowdataend['deliveryno'];
	$tlno_end = $rowdataend['tlno'];
	$driverid_end = $rowdataend['driverid'];
	$drivername_end = $rowdataend['dname'];
	$drivercnic_end = $rowdataend['dcnic'];
	$drivernum_end = $rowdataend['dnumber'];
	$tripstart_end = $rowdataend['tripstart'];
	$tripend_end = $rowdataend['tripend'];
	$alerts_end = $rowdataend['alerts'];
	$Datesap_end = $rowdataend['datetime'];
	echo "<br>";
	$sapend = "SELECT * FROM sapend where deliveryno ='$loadnum_end' and tripend=1;";
	$sql_end = mysqli_query($db, $sapend);
	if (mysqli_num_rows($sql_end) == 0) {
		$sqlend = "INSERT INTO sapend(deliveryno, tlno, driverid, dname, dcnic, dnumber, tripstart, tripend, alerts, datetime,status) VALUES 
				('$deliveryno_end','$tlno_end','$driverid_end','$drivername_end','$drivercnic_end','$drivernum_end','$tripstart_end','$tripend_end','$alerts_end','$Datesap_end','0')";
		$truend = mysqli_query($db, $sqlend);
		if ($truend == true) {
			$q_update_end = "UPDATE sapstart set status = '1' where deliveryno ='$loadnum_end';";
			mysqli_query($db, $q_update_end);
		} else {

		}
	} else {
		echo "Do Nothing" . $loadnum_end . ". <br>";
	}
}


mysqli_close($db);
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="refresh" content="20">
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