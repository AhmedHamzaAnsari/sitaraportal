<?php
    session_start();
    include("config_indemnifier.php");
    if(isset($_POST)){
        $vehicle = $_POST['vehicle'];
        $trip_id = $_POST['trip_id'];
        $sub_first_trip_id = $_POST['sub_first_trip_id'];
        $starting_time = $_POST['starting_time'];
        // $completed = $_POST['completed'];
        if($vehicle!="" && $trip_id!=""){

            $query = "SELECT * FROM trip_main where id='$trip_id'";  
            $result = mysqli_query($db, $query);  
            $row = mysqli_fetch_array($result);  
            if( $row['complete']=='1'){

                $users_arr = array();
                // $sql="SELECT * FROM `positions` where time>='$from' and time<='$to' and device_id=$vehicle";
                $sql="SELECT pos.*,ts.id from trip_main as mt join trip_sub as ts on mt.id=ts.main_id join positions as pos on mt.lorry_no=pos.device_id where mt.lorry_no='$vehicle' and mt.id='$trip_id' and pos.time>='$starting_time' and ts.id='$sub_first_trip_id';";
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

            

                $users_arr = array();
                // $sql="SELECT * FROM `positions` where time>='$from' and time<='$to' and device_id=$vehicle";
                $sql="SELECT pos.*,ts.id from trip_main as mt join trip_sub as ts on mt.id=ts.main_id join positions as pos on mt.lorry_no=pos.device_id where mt.lorry_no='$vehicle' and mt.id='$trip_id' and pos.time>='$starting_time' and ts.id='$sub_first_trip_id';";
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
             }
                
        }else{
            echo 'False';
        }
    }
?>