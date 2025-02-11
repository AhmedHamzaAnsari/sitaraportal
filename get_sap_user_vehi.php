<?php
    session_start();
    include("config_indemnifier.php");
    if(isset($_POST)){
        $check = $_POST['check'];
        if($check!=""){
            $users_arr = array();
            $sql="SELECT  distinct(dc.name),ud.users_id,ud.devices_id as device_iid,UPPER(dc.name) as car_name,pos.latitude,pos.longitude,pos.device_id,pos.speed,pos.imileage,pos.time,pos.altitude,pos.vlocation,pos.time FROM sapstart 
            join devices as dc on dc.name=sapstart.tlno
            join positions as pos on pos.id=dc.latestPosition_id
            join users_devices as ud on ud.devices_id=dc.uniqueId
            INNER JOIN users as us on ud.users_id=us.id 
            where ud.users_id=$check and tlno IN(SELECT name from devices) and deliveryno NOT IN(select deliveryno from sapend) and sapstart.status = 0 order by sapstart.id desc;";
            $result = mysqli_query($db,$sql);
            
            while( $row = mysqli_fetch_array($result) ){
                // $userid = $row['id'];
                $name = $row['name'];
                $lat = $row['latitude'];
                $lng = $row['longitude'];
                $speed = $row['speed'];
                $car_name = $row['car_name'];
                $device_id = $row['device_iid'];
                $altitude = $row['altitude'];
                $vlocation = $row['vlocation'];
                $time = $row['time'];
            
                $users_arr[] = array($name,$lat,$lng,$speed,$car_name,$device_id,$altitude,$vlocation,$time);
            }
            // print_r($users_arr);

            // echo 'True '.$data;
            
                echo json_encode($users_arr);
                
        }else{
            echo 'False';
        }
    }
?>