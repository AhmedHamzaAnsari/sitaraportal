<?php
    session_start();
    include("config_indemnifier.php");
    if(isset($_POST)){
        $check = $_POST['check'];
        $userid = $_SESSION['userid'];
        $str = implode($check,',');

        if($str==='all'){
            $from = $_POST['from'];
            $to = $_POST['to'];
            $next_date = new dateTime($from);
            $next_date -> modify('+1 day');
            $tommorrow = $next_date->format('Y-m-d');
            // $to = $_POST['to'];
            if($from!=""){
                $users_arr = array();
                $sql="SELECT pos.device_id,pos.vehicle_name as vehicle_id,pos.speed,pos.address as vlocation,pos.time FROM positionsnew as pos 
                join users_devices_new as ud on ud.devices_id=pos.device_id
                where pos.speed>'55' and pos.time>'$from' and pos.time<'$to' and ud.users_id='$userid'";

                $result = mysqli_query($db,$sql);
                
                while( $row = mysqli_fetch_array($result) ){
                    // $userid = $row['id'];
                    $name = $row['vehicle_id'];
                    $speed = $row['speed'];
                    $location = $row['vlocation'];
                    $time = $row['time'];
                
                    $users_arr[] = array(
                        'name'=>$name,
                        'speed'=>$speed,
                        'location'=>$location,
                        'time'=>$time
                    );
                }
                // print_r($users_arr);

                // echo 'True '.$data;
                
                    echo json_encode($users_arr);
                    
            }else{
                echo 'False';
            }
        }
        else{

        

            $str = implode($check,',');
            $from = $_POST['from'];
            $to = $_POST['to'];
            $next_date = new dateTime($from);
            $next_date -> modify('+1 day');
            $tommorrow = $next_date->format('Y-m-d');
            if($from!=""){
                $users_arr = array();
                $sql="SELECT pos.device_id,pos.vehicle_name as vehicle_id,pos.speed,pos.address as vlocation,pos.time FROM positionsnew as pos where speed>'55' and pos.time>'$from' and pos.time<'$to' and pos.device_id IN ({$str})";
                // echo $sql;
                $result = mysqli_query($db,$sql);
                
                while( $row = mysqli_fetch_array($result) ){
                    // $userid = $row['id'];
                    $name = $row['vehicle_id'];
                    $speed = $row['speed'];
                    $location = $row['vlocation'];
                    $time = $row['time'];
                
                    $users_arr[] = array(
                        'name'=>$name,
                        'speed'=>$speed,
                        'location'=>$location,
                        'time'=>$time
                    );
                }
                // print_r($users_arr);

                // echo 'True '.$data;
                
                    echo json_encode($users_arr);
                    
            }else{
                echo 'False';
            }
        }
    }
?>