<?php
    session_start();
    include("config_indemnifier.php");
    if(isset($_POST)){
        $vehicle = $_POST['vehicle'];
        $starttime = $_POST['starttime'];
        $endtime = $_POST['endtime'];
        // $completed = $_POST['completed'];
        if($vehicle!="" && $starttime!=""){

            $users_arr = array();
            // $sql="SELECT * FROM `positions` where time>='$from' and time<='$to' and device_id=$vehicle";
            $sql="SELECT * FROM positions where vehicle_id='$vehicle' and time>='$starttime' and time<='$endtime' and speed>65;";
            // echo $sql;
            
            $result = mysqli_query($db,$sql);
            
            while( $row = mysqli_fetch_array($result) ){
                // $userid = $row['id'];
                $name = $row['vehicle_id'];
                $lat = $row['latitude'];
                $lng = $row['longitude'];
                $speed = $row['speed'];
                $time = $row['time'];
                $vlocation = $row['vlocation'];
            
                $users_arr[] = array($name,$lat,$lng,$speed,$time,$vlocation);
                // $users_arr[] = array('name' =>$name,'lat' =>$lat,'lng' =>$lng,'speed' =>$speed,'time' =>$time);

            }
            
            echo json_encode($users_arr);
        }else{
            echo 'False';
        }
    }
?>