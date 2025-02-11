<?php
    session_start();
    include("config_indemnifier.php");
    if(isset($_POST)){
        $check = $_POST['check'];
        if($check!=""){
            $users_arr = array();
            $sql="SELECT ud.users_id,ud.devices_id,us.name,dc.name,UPPER(dc.name) as car_name,dc.ignition as power,dc.lat as latitude,dc.lng as longitude,dc.id as device_id,dc.speed,dc.odometer as imileage,dc.time FROM users_devices_new as ud  INNER JOIN users as us on ud.users_id=us.id INNER JOIN devicesnew as dc on ud.devices_id=dc.id  where  ud.users_id=$check";
            $result = mysqli_query($db,$sql);
            
            while( $row = mysqli_fetch_array($result) ){
                // $userid = $row['id'];
            
                $users_arr[] = $row;
            }
            // print_r($users_arr);

            // echo 'True '.$data;
            
                echo json_encode($users_arr);
                
        }else{
            echo 'False';
        }
    }
?>