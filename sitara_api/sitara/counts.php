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
		$que1 = "SELECT count(*) as stop FROM `devicesnew` as pos join users_devices_new ud on pos.id = ud.devices_id where pos.speed=0 and pos.ignition = 'OFF' and ud.users_id = $user and pos.time >='$prev_date'";
		$que2 = "SELECT count(*) as idle FROM devicesnew as pos join users_devices_new ud on pos.id = ud.devices_id where pos.speed = 0 and pos.ignition ='ON' and ud.users_id = $user and pos.time >='$prev_date'";
		$que3 = "SELECT count(*) as inactive FROM `devicesnew` as pos join users_devices_new ud on pos.id = ud.devices_id where  pos.time <='$prev_date'  and ud.users_id = $user";
		$que4 = "SELECT count(*) as running FROM users_devices_new as ud 
		join devicesnew as dc on dc.id=ud.devices_id where  dc.speed>0 and  dc.speed < 60 and dc.time >='$prev_date' and ud.users_id='$user'";
		$que5 = "SELECT COUNT(*) as total FROM `devicesnew` as pos join users_devices_new ud on pos.id = ud.devices_id  where ud.users_id = $user";
		$que6 = "SELECT count(*) as no_data FROM `devicesnew` as pos join users_devices_new ud on pos.id = ud.devices_id where pos.speed>=60 and pos.ignition = 'ON' and ud.users_id = $user and pos.time >='$prev_date'";

		$result1 = $db->query($que1) or die("Error :" . mysqli_error());
		$result2 = $db->query($que2) or die("Error :" . mysqli_error());
		$result3 = $db->query($que3) or die("Error :" . mysqli_error());
		$result4 = $db->query($que4) or die("Error :" . mysqli_error());
		$result5 = $db->query($que5) or die("Error :" . mysqli_error());
		$result6 = $db->query($que6) or die("Error :" . mysqli_error());
		$row1 = mysqli_fetch_array($result1);
		$row2 = mysqli_fetch_array($result2);
		$row3 = mysqli_fetch_array($result3);
		$row4 = mysqli_fetch_array($result4);
		$row5 = mysqli_fetch_array($result5);
		$row6 = mysqli_fetch_array($result6);

		$stop = $row1[0];
		$idle = $row2[0];
		$inactive = $row3[0];
		$running = $row4[0];
		$total = $row5[0];
		$nodata = $row6[0];
		$post_data = array(
			'stop' => $stop,
			'idle' => $idle,
			'inactive' => $inactive,
			'running' => $running,
			'total' => $total,
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