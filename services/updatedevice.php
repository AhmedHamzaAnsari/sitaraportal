<?php
ini_set('max_execution_time', -1);
date_default_timezone_set("Asia/Karachi");
include("../config_indemnifier.php");
function clean($string)
{
	$string = str_replace('', '-', $string); // Replaces all spaces with hyphens.

	return preg_replace('/[^A-Za-z0-9]/', '', $string); // Removes special chars.
}
$inlisttracker = "SELECT * FROM devicesnew;";
$sql_inlist_tracker = mysqli_query($db, $inlisttracker);
mysqli_error($db);
while ($rowinlist_tracker = mysqli_fetch_array($sql_inlist_tracker)) {
	$mainid = $rowinlist_tracker['id'];
	$name = $rowinlist_tracker['name'];
	echo $imei = clean($rowinlist_tracker["name"]);
	echo "<br>";
	$update_inlistname = "UPDATE devicesnew SET imei = '$imei' WHERE id = '$mainid'";
	$update_inlistname_result = mysqli_query($db, $update_inlistname);

}

?>
<!DOCTYPE html>
<html>

<head>
    <title>UPDATE devicesnew</title>
</head>

<body style="background: #fff;">
    <br>
    <?php echo date("d-m-Y H:i:s", time()); ?>
</body>

</html>