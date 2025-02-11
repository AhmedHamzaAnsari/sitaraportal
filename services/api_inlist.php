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
 

    $all_users = "SELECT * FROM api_vehicle where status=0";
    $result_all_users = $db->query($all_users) or die("Error :" . mysqli_error($db));

    while ($user_row = $result_all_users->fetch_assoc()) {

        $api_id = $user_row['id'];
        $api_name = $user_row['api_name'];
        $system_name = $user_row['system_name'];

        $sql_car = "SELECT * FROM vehicle_inlist as vi join inlist_tracker as it on it.main_id = vi.id where name='$system_name' and it.tracker ='tw_sitara';";
        $result_car = mysqli_query($db, $sql_car);

        while ($row_car = mysqli_fetch_array($result_car)) {

            $inlist_name = $row_car['inlist_name'];
            $main_name = $row_car['main_name'];
            $main_id = $row_car['main_id'];
            echo '-----------------------------------'.$row_car['inlist_name'].'----------------------------------------<br>';
            // $users_arr = array();
            // $sql="SELECT * FROM `positions` where time>='$from' and time<='$to' and device_id=$vehicle";DATE_FORMAT(time,'%H:%i:%s')
           
            $insert_alert = "INSERT INTO `inlist_tracker`
            (`main_id`,
            `tracker`,
            `inlist_name`,
            `main_name`)
            VALUES
            ('$main_id',
            'tw_x',
            '$inlist_name',
            '$main_name');";

            if(mysqli_query($db, $insert_alert)){
                $update = "UPDATE `api_vehicle`
                SET
                `status` = '1'
                WHERE `id` = $api_id;";

                if(mysqli_query($db, $update)){
                    echo 'Updated ';
                    
                }
            }
        }

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