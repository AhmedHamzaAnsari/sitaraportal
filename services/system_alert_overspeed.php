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
    echo 'Overspeed Services Start time '.date('Y-m-d H:i:s');
    // Fetch user data based on privilege and specific conditions
    $userQuery = "SELECT * FROM users 
                  WHERE (privilege IN ('admin', 'Cartraige', 'dashboard'))";
    $userResult = $db->query($userQuery);

    if (!$userResult) {
        die('Error fetching user data: ' . mysqli_error($db));
    }

    while ($user_row = $userResult->fetch_assoc()) {
        $user_id = $user_row['id'];
        $user_name = $user_row['name'];

        echo "------------------------- {$user_name} ----------------------<br>";

        $currentDate = date("Y-m-d H:i:s");
        $previousDate = date("Y-m-d H:i:s", strtotime($currentDate . ' -1 day'));

        // Query for overspeeding vehicles
        $overspeedQuery = "SELECT 
                            dc.latestPosition_id AS pos_id,
                            dc.name AS vehicle_name,
                            dc.location AS address,
                            dc.speed,
                            dc.time,
                            dc.id AS vehicle_id,
                            dc.lat,
                            dc.lng
                           FROM devicesnew dc
                           JOIN users_devices_new ud ON dc.id = ud.devices_id
                           WHERE  dc.ignition = 'ON' 
                           AND ud.users_id = $user_id 
                           AND dc.time >= '$previousDate'";
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
            $lat = $vehicle['lat'];
            $lng = $vehicle['lng'];

            // echo "Speed: {$speed} KM/hr<br>";

            $alertQuery = "SELECT * FROM driving_alerts 
                           WHERE type = 'Overspeed' 
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

            if ($alertResult->num_rows > 0) {
                $alertRow = $alertResult->fetch_assoc();
                $alert_id = $alertRow['id'];
                $in_time = $alertRow['in_time'];
                $out_time = date('Y-m-d H:i:s');

                // $diffInSeconds = strtotime($out_time) - strtotime($in_time); // Difference in seconds
                // $diff = round($diffInSeconds / 60, 2); // Convert seconds to minutes and round

                $last_alert_time = $in_time;
                $cur_time = $out_time;
                $to_time = strtotime($cur_time);
                $from_time = strtotime($last_alert_time);
                $diff = round(abs($to_time - $from_time) / 60, 2);

                if ($speed < 55) {
                    $out_time = date('Y-m-d H:i:s');
                    $updateAlert = "UPDATE driving_alerts 
                                    SET out_time = '$out_time', 
                                        log = 1, 
                                        duration = '$diff' 
                                    WHERE id = '$alert_id'";
                    // Uncomment to execute
                    $db->query($updateAlert);
                }
            } else {
                if ($speed > 55) {
                    $message = "{$vehicle_name} has exceeded Overspeed limit {$speed} KM/hr on {$time} at {$address}";
                    $in_time = date('Y-m-d H:i:s');

                    $insertAlert = "INSERT INTO driving_alerts 
                                    (pos_id, type, message, device_id, created_at, created_by, lat, lng, speed, in_time, time, location)
                                    VALUES ('$pos_id', 'Overspeed', '$message', '$vehicle_id', '$currentDate', '$user_id', '$lat', '$lng', '$speed', '$in_time', '$time', '$address')";
                    // Uncomment to execute
                    $db->query($insertAlert);
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