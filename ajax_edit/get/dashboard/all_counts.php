<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
ini_set('max_execution_time', -1);
date_default_timezone_set("Asia/Karachi");
include("../../../config_indemnifier.php");

if (isset($_GET['accesskey'])) {
    $access_key_received = $_GET['accesskey'];
    $user = $_GET['id'];
    $access_key = "12345";
    $from = $_GET['from'];
    $to = $_GET['to'];

    $todate = date("Y-m-d H:i:s", time());
    $prev_date = date("Y-m-d H:i:s", strtotime($todate . ' -1 day'));
    if ($access_key_received == $access_key) {
        // get all category data from category table
        $que1 = "SELECT COUNT(DISTINCT dc.name) as all_devices FROM users_devices_new as ud 
        join devicesnew as dc on dc.id=ud.devices_id where ud.users_id=$user";

        $que2 = "SELECT COUNT(DISTINCT dc.name) as moving_devices FROM users_devices_new as ud 
        join devicesnew as dc on dc.id=ud.devices_id where  dc.speed>0 and  dc.speed < 60 and dc.time >='$prev_date' and ud.users_id='$user'";


        $que3 = "SELECT COUNT(DISTINCT dc.name) as stop_devices FROM users_devices_new as ud 
        join devicesnew as dc on dc.id=ud.devices_id where dc.speed=0 and dc.ignition = 'Off' and dc.time >='$prev_date' and ud.users_id='$user';";

        $que4 = "SELECT COUNT(DISTINCT dc.name) as nr_devices FROM users_devices_new as ud 
        join devicesnew as dc on dc.id=ud.devices_id where dc.time <='$prev_date' and ud.users_id='$user'";

        $que5 = "SELECT COUNT(DISTINCT dc.name) as idle_devices FROM users_devices_new as ud 
        join devicesnew as dc on dc.id=ud.devices_id where dc.speed = 0 and dc.ignition ='On' and dc.time >='$prev_date' and ud.users_id='$user'";

        // $que6 = "SELECT count(*) as black_count FROM driving_alerts as da join devicesnew as dc on dc.id=da.device_id 
        // where da.type='Un-Authorized Stop' and da.created_at>='$from' and da.created_at<='$to' and da.created_by='$user'";

        $que6 = "SELECT count(*) as black_count FROM geo_check as ck
        join geofenceing as geo on geo.id=ck.geo_id
        join users_devices_new as ud on ud.devices_id=ck.veh_id
        join devicesnew as dc on dc.id=ud.devices_id
        where geo.geotype='Black Spote'
        and date(ck.in_time)>='$from'
        and date(ck.in_time)<='$to'
        and ud.users_id='$user'
        and ck.in_duration>=60
        order by ck.id desc";

        $que7 = "SELECT count(*) as night_count FROM driving_alerts as da join devicesnew as dc on dc.id=da.device_id where da.type='Night time violations' and da.created_at>='$from' and da.created_at<='$to' and da.created_by='$user'";
        
        $que8 = "SELECT count(*) as excess_count FROM axcess_driving_alerts as da 
        join devicesnew as dc on dc.id=da.vehicle_id 
        where da.created_at>='$from' and da.created_at<='$to' and da.created_by='$user'";

        $que9 = "SELECT count(*) as overspeed_devices FROM driving_alerts as da join devicesnew as dc on dc.id=da.device_id where 
        da.type='Overspeed alert' and da.created_at>='$from' and da.created_at<='$to' and da.created_by='$user'";

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

        $all_devices = $row1[0];
        $moving_devices = $row2[0];
        $stop_devices = $row3[0];
        $nr_devices = $row4[0];
        $idle_devices = $row5[0];
        $black_count = $row6[0];
        $night_count = $row7[0];
        $excess_count = $row8[0];
        $overspeed_devices = $row9[0];
        $post_data = array(
            'all_devices' => $all_devices,
            'moving_devices' => $moving_devices,
            'stop_devices' => $stop_devices,
            'nr_devices' => $nr_devices,
            'overspeed_devices' => $overspeed_devices,
            'idle_devices' => $idle_devices,
            'night_count' => $night_count,
            'excess_count' => $excess_count,
            'black_count' => $black_count
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