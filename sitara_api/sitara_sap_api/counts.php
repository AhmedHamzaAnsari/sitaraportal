<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
ini_set('max_execution_time', -1);
date_default_timezone_set("Asia/Karachi");
include("../../config_indemnifier.php");
if (isset($_GET['accesskey'])) {
	$access_key_received = $_GET['accesskey'];
	$user = $_GET['user'];
	$access_key = "12345";
	$todate = date("Y-m-d H:i:s", time());
	$prev_date = date("Y-m-d H:i:s", strtotime($todate . ' -1 day'));
	if ($access_key_received == $access_key) {
		// get all category data from category table
		$que1 = "SELECT COUNT(sap.tl_no) as stop FROM sap_data_upload as sap
		join devicesnew as dc on dc.name=sap.tl_no
		join users_devices_new ud on dc.id = ud.devices_id where ud.users_id = $user and dc.speed=0 and dc.ignition = 'OFF' and dc.time >='$prev_date' order by dc.time desc";


		$que2 = "SELECT COUNT(sap.tl_no) as idle FROM sap_data_upload as sap
		join devicesnew as dc on dc.name=sap.tl_no
		join users_devices_new ud on dc.id = ud.devices_id where dc.speed = 0 and dc.ignition ='ON' and ud.users_id = $user and dc.time >='$prev_date'";

		$que3 = "SELECT COUNT(sap.tl_no) as inactive FROM sap_data_upload as sap
		join devicesnew as dc on dc.name=sap.tl_no
		join users_devices_new ud on dc.id = ud.devices_id where  dc.time <='$prev_date'  and ud.users_id = $user";

		$que4 = "SELECT COUNT(sap.tl_no) as running FROM sap_data_upload as sap
		join devicesnew as dc on dc.name=sap.tl_no
		join users_devices_new ud on dc.id = ud.devices_id where dc.speed>0 and dc.speed < 60 and dc.time >='$prev_date' and ud.users_id='$user'";

		$que5 = "SELECT COUNT(sap.tl_no) as total FROM sap_data_upload as sap
		join devicesnew as dc on dc.name=sap.tl_no
		join users_devices_new ud on dc.id = ud.devices_id where ud.users_id = $user ";

		$que6 = "SELECT COUNT(sap.tl_no) as no_data FROM sap_data_upload as sap
		join devicesnew as dc on dc.name=sap.tl_no
		join users_devices_new ud on dc.id = ud.devices_id where dc.speed>=60 and dc.ignition = 'ON' and ud.users_id = $user and dc.time >='$prev_date'";

		$que7 = "SELECT COUNT(tl_no) as without_tracker  FROM sap_data_upload where is_tracker=1";
		$que8 = "SELECT count(*) total_saps FROM sap_data_upload";
		$que9 = "SELECT created_at FROM sap_data_upload limit 1";

		$result1 = $db->query($que1) or die("Error :" . mysqli_error());
		$result2 = $db->query($que2) or die("Error :" . mysqli_error());
		$result3 = $db->query($que3) or die("Error :" . mysqli_error());
		$result4 = $db->query($que4) or die("Error :" . mysqli_error());
		$result5 = $db->query($que5) or die("Error :" . mysqli_error());
		$result6 = $db->query($que6) or die("Error :" . mysqli_error());
		$result7 = $db->query($que7) or die("Error :" . mysqli_error());
		$result8 = $db->query($que8) or die("Error :" . mysqli_error());
		$result9 = $db->query($que9) or die("Error :" . mysqli_error());
		$row1 = mysqli_fetch_array($result1);
		$row2 = mysqli_fetch_array($result2);
		$row3 = mysqli_fetch_array($result3);
		$row4 = mysqli_fetch_array($result4);
		$row5 = mysqli_fetch_array($result5);
		$row6 = mysqli_fetch_array($result6);
		$row7 = mysqli_fetch_array($result7);
		$row8 = mysqli_fetch_array($result8);
		$row9 = mysqli_fetch_array($result9);

		$stop = $row1[0];
		$idle = $row2[0];
		$inactive = $row3[0];
		$running = $row4[0];
		$total = $row5[0];
		$nodata = $row6[0];
		$without_tracker = $row7[0];
		$total_saps = $row8[0];
		$sap_created_at = $row9['created_at'];
		$post_data = array(
			'stop' => $stop,
			'idle' => $idle,
			'inactive' => $inactive,
			'running' => $running,
			'total' => $total,
			'without_tracker' => $without_tracker,
			'total_saps' => $total_saps,
			'sap_created_at' => $sap_created_at,
			'nodata' => $nodata
		);
		// $users = array();
		// while ($user = $result->fetch_assoc()) {
		// 	$users[] = $user;
		// }

		// create json output
		$post_data = json_encode($post_data);
	} else {
		die('accesskey is incorrect.');
	}
} else {
	die('accesskey is required.');
}

//Output the output.
echo $post_data;

// include_once('../includes/close_database.php');
?>