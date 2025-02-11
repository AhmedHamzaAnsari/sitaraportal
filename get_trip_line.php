<?php
    session_start();
    include("config_indemnifier.php");
    if(isset($_POST)){
        $vehicle = $_POST['vehicle'];
        $from = $_POST['from'];
        $to = $_POST['to'];
        if($vehicle!="" && $from!="" && $to!=""){
            $users_arr = array();
            $sql="SELECT * FROM `positions` where time>='$from' and time<='$to' and device_id=$vehicle";
            // $sql="SELECT pos.* from trip_main as mt join trip_sub as ts on mt.id=ts.main_id join positions as pos on mt.lorry_no=pos.device_id where mt.lorry_no='1611' and mt.id='43' and pos.time>=ts.start_time;";
            // echo $sql;
            
            $result = mysqli_query($db,$sql);
            
            while( $row = mysqli_fetch_array($result) ){
                // $userid = $row['id'];
                $name = $row['vehicle_id'];
                $lat = $row['latitude'];
                $lng = $row['longitude'];
                $speed = $row['speed'];
                $time = $row['time'];
            
                $users_arr[] = array($name,$lat,$lng,$speed,$time);
                // $users_arr[] = array('name' =>$name,'lat' =>$lat,'lng' =>$lng,'speed' =>$speed,'time' =>$time);

            }
            // print_r($users_arr);

            // echo 'True '.$data;
            
                echo json_encode($users_arr);
                
        }else{
            echo 'False';
        }
    }
?>