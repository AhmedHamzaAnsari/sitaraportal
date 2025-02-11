<?php
session_start();
ini_set('memory_limit', '-1');

include("config_indemnifier.php");
if (isset($_POST)) {
    // $userid = $_SESSION['userid'];


    function checkin($depot_lat, $depo_lng, $alert_lat, $alert_lng)
    {
        $v_lat = floatval($alert_lat);
        $v_lng = floatval($alert_lng);

        $c_lat = floatval($depot_lat);
        $c_lng = floatval($depo_lng);
        $km = 10;

        $ky = 40000 / 360;
        $kx = cos(pi() * $c_lat / 180.0) * $ky;
        $dx = abs($c_lng - $v_lng) * $kx;
        $dy = abs($c_lat - $v_lat) * $ky;


        $output = '';

        if (sqrt(($dx * $dx) + ($dy * $dy)) <= $km == true) {


            $output = 'IN';
        } else {

            $output = 'Not IN ';

        }
        return $output;
    }




    $vehicle_id = $_POST['vehicle_id'];
    $depo = $_POST['depo'];
    $parts = explode(",", $depo);

    $depot_lat = $parts[0];
    $depo_lng = $parts[1];

    $from = $_POST['from'];
    $to = $_POST['to'];
    if ($from != "") {
        $users_arr = array();


        $sql = "SELECT da.*,dc.name FROM driving_alerts as da
        join devicesnew as dc on dc.id=da.device_id
        where da.device_id='$vehicle_id' and da.created_at>='$from' and da.created_at<='$to' order by da.id desc;";



        $result = mysqli_query($db, $sql);

        while ($row = mysqli_fetch_array($result)) {
            // $userid = $row['id'];
            $type = $row['type'];
            $message = $row['message'];
            $created_at = $row['created_at'];
            $device_id = $row['device_id'];
            $name = $row['name'];

            $dateTimeForward = new DateTime($created_at);
            $dateTimeForward->modify('+2 minute');

            $dateTimeBackward = new DateTime($created_at);
            $dateTimeBackward->modify('-10 minute');

            // Format DateTime objects to be used in the MySQL query

            $forward = $dateTimeForward->format('Y-m-d H:i:s');
            $backward = $dateTimeBackward->format('Y-m-d H:i:s');


            $sql2 = "SELECT * FROM positionsnew WHERE time>='$backward' and time<='$forward' and device_id='$device_id' order by id desc limit 1;";
            $result2 = mysqli_query($db, $sql2);
            $row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
            //   $active = $row['active'];

            $count2 = mysqli_num_rows($result2);

            if ($count2 > 0) {
                $latitude = $row2['latitude'];
                $longitude = $row2['longitude'];
                $response = checkin($depot_lat, $depo_lng, $latitude, $longitude);
                // echo $response . ' | ';
                if ($response == 'IN') {
                    $row['alert_latitude'] = $latitude;
                    $row['alert_longitude'] = $longitude;
                    $users_arr[] = $row;
                }
            }

            // $users_arr[] = array(
            //     'name'=>$name,
            //     'consignee_name'=>$consignee_name,
            //     'location'=>$location,
            //     'in_time'=>$in_time,
            //     'out_time'=>$out_time,
            //     'in_duration'=>$in_duration
            // );
        }
        // print_r($users_arr);

        // echo 'True '.$data;

        echo json_encode($users_arr);

    } else {
        echo 'False';
    }



}
?>