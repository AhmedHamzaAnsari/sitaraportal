<?php
    session_start();
    include("config_indemnifier.php");
    if(isset($_POST)){
        $check = $_POST['check'];
        if($check!=""){
            $users_arr = array();
            $sql="SELECT  geo.Coordinates,pos.latitude,pos.longitude,geo.consignee_name, pos.time,pos.altitude FROM trip_sub as ts join positions as pos on pos.device_id = ts.vehicle_id join geofenceing as geo on geo.id = ts.consignee_id where ts.id=$check order by pos.time desc limit 1;";
            $result = mysqli_query($db,$sql);
            
            while( $row = mysqli_fetch_array($result) ){
                // $userid = $row['id'];
                $name = $row['altitude'];
                $lat = $row['latitude'];
                $lng = $row['longitude'];
                $Coordinates = $row['Coordinates'];
                $time = $row['time'];
            
                $users_arr[] = array($name,$lat,$lng,$Coordinates,$time);
            }
            // print_r($users_arr);

            // echo 'True '.$data;
            
                echo json_encode($users_arr);
                
        }else{
            echo 'False';
        }
    }
?>