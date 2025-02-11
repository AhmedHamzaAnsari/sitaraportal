<?php
ini_set('max_execution_time', -1);
date_default_timezone_set("Asia/Karachi");
include("../config_indemnifier.php");
function clean($string)
{
	$string = str_replace('', '-', $string); // Replaces all spaces with hyphens.

	return preg_replace('/[^A-Za-z0-9]/', '', $string); // Removes special chars.
}


$inlisttracker = "SELECT id FROM devicesnew where id >'1114' ";
$sql_inlist_tracker = mysqli_query($db, $inlisttracker);
mysqli_error($db);
while ($rowinlist_tracker = mysqli_fetch_array($sql_inlist_tracker)) {

	$vhiid = $rowinlist_tracker['id'];

	$q_delete = "delete FROM positionsnew where device_id='$vhiid' and time <='2023-3-01' order by id desc;";
	$sql_delete = mysqli_query($db, $q_delete);
	if ($sql_delete == true) {
		echo "done delete " . $vhiid;
	}
}


?>
<!DOCTYPE html>
<html>

<head>
	<title>Bulk Importer</title>
</head>

<body style="background: #fff;">
	<br>
	<?php echo date("d-m-Y H:i:s", time()); ?>
</body>

</html>