<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
ini_set('max_execution_time', -1);
date_default_timezone_set("Asia/Karachi");

// Database connection details
include("../config_indemnifier.php");

if (isset($_GET['accesskey'])) {
    $access_key_received = $_GET['accesskey'];
    $access_key = "12345";

    if ($access_key_received !== $access_key) {
        die('Invalid access key.');
    }
    echo 'Night Voilation Service Start time ' . date('Y-m-d H:i:s') . "<br>";

    $current_time = date('d M Y H:i:s');
    $current_hour = date('H', strtotime($current_time));

    if ($current_hour >= 0 && $current_hour <= 5) {
        $night_time = date('Y-m-d');

        $userQuery = "SELECT * FROM users WHERE privilege IN ('admin', 'Cartraige', 'dashboard')";
        $userResult = $db->query($userQuery);

        if (!$userResult) {
            die('Error fetching user data: ' . mysqli_error($db));
        }

        while ($user_row = $userResult->fetch_assoc()) {
            $user_id = $user_row['id'];
            $user_name = $user_row['name'];
            echo "------------------------- {$user_name} ----------------------<br>";

            $currentDate = date("Y-m-d H:i:s");

            // Query for overspeeding vehicles
            $overspeedQuery = "SELECT dc.latestPosition_id as pos_id, dc.name as vehicle_name, dc.location as address, 
                       dc.speed, dc.time, dc.id as vehicle_id, dc.ignition 
                FROM devicesnew as dc 
                JOIN users_devices_new ud ON dc.id = ud.devices_id 
                WHERE dc.time >= '{$night_time} 00:00:00' 
                  AND dc.time <= '{$night_time} 04:59:59' 
                  AND ud.users_id = '$user_id'";
            $overspeedResult = $db->query($overspeedQuery);

            if (!$overspeedResult) {
                die('Error fetching overspeed data: ' . mysqli_error($db));
            }

            while ($vehicle = $overspeedResult->fetch_assoc()) {
                $pos_id = $vehicle['pos_id'];
                $vehicle_name = $vehicle['vehicle_name'];
                $address = $vehicle['address'];
                $speed = $vehicle['speed'];
                $time = $vehicle['time'];
                $vehicle_id = $vehicle['vehicle_id'];
                $ignition = $vehicle['ignition'];

                $alertQuery = "SELECT * 
                    FROM driving_alerts 
                    WHERE type = 'Night time violations' 
                      AND device_id = '$vehicle_id'
                      AND created_by = '$user_id'
                      AND created_at >= CURDATE()
                      AND log = 0 
                      AND in_time != '' 
                    ORDER BY id DESC LIMIT 1";
                $alertResult = $db->query($alertQuery);

                if (!$alertResult) {
                    die('Error fetching alert data: ' . mysqli_error($db));
                }

                if ($ignition === 'ON' && $speed != '0') {
                    if ($alertResult->num_rows === 0) {
                        $message = "{$vehicle_name} Violate Night time violations";
                        $in_time = date('Y-m-d H:i:s');

                        $insertAlert = "INSERT INTO driving_alerts 
                            (pos_id, type, message, device_id, created_at, created_by, lat, lng, speed, in_time, time, location) 
                            VALUES ('$pos_id', 'Night time violations', '$message', '$vehicle_id', '$currentDate', '$user_id', '', '', '$speed', '$in_time', '$time', '$address')";
                        $db->query($insertAlert);
                    }
                } else if ($alertResult->num_rows > 0) {
                    $alertRow = $alertResult->fetch_assoc();
                    $alert_id = $alertRow['id'];
                    $in_time = $alertRow['in_time'];
                    $out_time = date('Y-m-d H:i:s');
                    $last_alert_time = $in_time;
                    $cur_time = $out_time;

                    $to_time = strtotime($cur_time);
                    $from_time = strtotime($last_alert_time);
                    $diff = round(abs($to_time - $from_time) / 60, 2);

                    $updateAlert = "UPDATE driving_alerts 
                            SET out_time = '$out_time', 
                                log = 1, 
                                duration = '$diff' 
                            WHERE id = '$alert_id'";
                    $db->query($updateAlert);

                }
            }
        }
    }
} else {
    die('Access key is required.');
}

mysqli_close($db);
?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="refresh" content="30">
    <title>System Alert Service</title>
</head>

<body style="background: #fff;">
    <br>
    <?php echo date("d-m-Y H:i:s"); ?>
</body>

</html>