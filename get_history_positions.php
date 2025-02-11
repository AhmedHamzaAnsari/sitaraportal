

<?php
    session_start();
    ini_set('memory_limit', '-1');

    include("config_indemnifier.php");
    if(isset($_POST)){
        $check = $_POST['check'];
        $str = implode($check,',');

        if($str==='all'){
            $from = $_POST['from'];
            $to = $_POST['to'];
            if($from!=""){
                $users_arr = array();
                $sql="SELECT pos.id,pos.device_id as vehicle_id,pos.latitude,pos.longitude,pos.power,pos.speed,pos.time,pos.address as vlocation FROM positionsnew as pos where  pos.time>='$from' and pos.time<='$to' order by pos.time asc;";

                

                $result = mysqli_query($db,$sql);
                
                while( $row = mysqli_fetch_array($result) ){
                    // $userid = $row['id'];
                    $name = $row['vehicle_id'];
                    $lat = $row['latitude'];
                    $lng = $row['longitude'];
                    $power = $row['power'];
                    $speed = $row['speed'];
                    $time = $row['time'];
                    $location = $row['vlocation'];
                
                    $users_arr[] = array('name'=>$name,'lat'=>$lat,'lng'=>$lng,'power'=>$power,'speed'=>$speed,'time'=>$time,'location'=>$location);
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
            if($from!=""){
                $users_arr = array();
                
                 $sql = "SELECT pos.id,pos.device_id as vehicle_id,pos.latitude,pos.longitude,pos.power,pos.speed,pos.time,pos.address as vlocation FROM positionsnew as pos where pos.device_id IN ({$str}) and pos.time>='$from' and pos.time<='$to' order by pos.time asc;";
                $result = mysqli_query($db,$sql);
                
                while( $row = mysqli_fetch_array($result) ){
                    // $userid = $row['id'];
                    $name = $row['vehicle_id'];
                    $lat = $row['latitude'];
                    $lng = $row['longitude'];
                    $power = $row['power'];
                    $speed = $row['speed'];
                    $time = $row['time'];
                    $location = $row['vlocation'];
                
                    $users_arr[] = array('name'=>$name,'lat'=>$lat,'lng'=>$lng,'power'=>$power,'speed'=>$speed,'time'=>$time,'location'=>$location);
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