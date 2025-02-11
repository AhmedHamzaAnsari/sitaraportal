<?php
ini_set('max_execution_time', -1);
include("../config_indemnifier.php");

$inlist = "SELECT * FROM devices WHERE latestPosition_id NOT IN (SELECT id FROM positions)";
$sql_inlist = mysqli_query($db, $inlist);
mysqli_error($db);

while ($rowinlist = mysqli_fetch_array($sql_inlist)) {
	$name = $rowinlist['name'];
	$latestPosition_id = $rowinlist['latestPosition_id'];
	$datetimee = $rowinlist['devicescol'];
	$deviceid = $rowinlist['uniqueId'];
	$mainid = $rowinlist['vehicle_make'];
	$insert_positions = "INSERT into positions(id,address,altitude,course,latitude,longitude,other,power,speed,time,valid,device_id,AlarmStatus,imileage,ikey,ireason,ireasoncode,syscode,vehicle_id,dtype,chk1,vlocation,overspeed,record_creation_time, recorddate)
	VALUES ('$latestPosition_id','','$name','360','0','0','','0','0','$datetimee','1','$deviceid','0','33006','0','0','','','$name','$mainid','','NR','','$datetimee','');";
	$basit = mysqli_query($db, $insert_positions);


}
mysqli_close($db);

?>
<!DOCTYPE html>
<html>

<head>
	<title>NR Recovery</title>
</head>

<body style="background: #fff;">
	<br>
	<?php echo date("d-m-Y H:i:s", time()); ?>
</body>

</html>