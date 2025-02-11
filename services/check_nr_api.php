<?php
session_start();
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
ini_set('max_execution_time', -1);
date_default_timezone_set("Asia/Karachi");

include("../config_indemnifier.php");
set_time_limit(100000);
if (isset($_POST)) {
    $users_arr_date = array();


    $all_users = "SELECT 
    tw.vehicle, 
    tw.Tracker,
    dc.name AS device_name, 
    dc.trackername AS dc_tracker
    FROM twvehicles AS tw
    LEFT JOIN devicesnew AS dc 
    ON (dc.name = tw.vehicle AND dc.trackername = tw.Tracker)
    WHERE dc.name IS NULL and tw.Tracker!='TW';";
    $result_all_users = $db->query($all_users) or die("Error :" . mysqli_error($db));

    while ($user_row = $result_all_users->fetch_assoc()) {

        $vehicle = $user_row['vehicle'];
        $Tracker = $user_row['Tracker'];


        $sql_query1 = "SELECT * FROM devicesnew where name='$vehicle'";

        $result1 = $db->query($sql_query1) or die("Error :" . mysqli_error($db));
        echo '--------------------------- Change ' . $vehicle . ' ' .$Tracker.'------------------------------------------ <br>';

       
        while ($user = $result1->fetch_assoc()) {
            $d_vehi = $user['name'];
            $trackername = $user['trackername'];

            echo 'DC Vehicle ' . $d_vehi . ' ' .$trackername.' <br>';

        }


        // $delete_devices = "INSERT INTO `users_devices_new`
        // (`users_id`,
        // `devices_id`)
        // VALUES
        // ('504',
        // '$vehicle_id');";

        // if (mysqli_query($db, $delete_devices)) {
        //     echo 'Assigned ' . $name . ' <br>';

        // }


    }


    // echo json_encode($users_arr_date);
}

mysqli_close($db);





?>


<!DOCTYPE html>
<html>
<!-- http-equiv="refresh" content="30" -->

<head>
    <meta>
    <title>Excess Driving Alert SERVICE</title>
</head>

<body style="background: #fff;">
    <br>
    <?php echo date("d-m-Y H:i:s", time()); ?>
</body>

</html>