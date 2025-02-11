<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
ini_set('max_execution_time', -1);
date_default_timezone_set("Asia/Karachi");
include("../../config_indemnifier.php");
// include_once('../includes/connect_database.php'); 
// include_once('../includes/variables.php');
if (isset($_GET['accesskey'])) {
	$access_key_received = $_GET['accesskey'];
	$user = $_GET['user'];
	// $offset = $_GET['offset'];
	$access_key = "12345";
	$todate = date("Y-m-d H:i:s", time());
	$prev_date = date("Y-m-d H:i:s", strtotime($todate . ' -1 day'));
	if ($access_key_received == $access_key) {
		// get all category data from category table
		$sql_query = "SELECT sap.* ,dc.*
			FROM sap_data_upload as sap
			join devicesnew as dc on dc.name=sap.tl_no
			join users_devices_new ud on dc.id = ud.devices_id where dc.speed>=60 and dc.ignition = 'ON' and ud.users_id = $user and dc.time >='$prev_date' order by dc.time desc;";

		$result = $db->query($sql_query) or die("Error :" . mysqli_error());

		$users = array();
		while ($user = $result->fetch_assoc()) {
			$users[] = $user;
		}

		// create json output
		$output = json_encode($users);
	} else {
		die('accesskey is incorrect.');
	}
} else {
	die('accesskey is required.');
}

//Output the output.
echo $output;

// include_once('../includes/close_database.php'); 
?>