



<?php
    session_start();
    ini_set('memory_limit', '-1');

    include("config_indemnifier.php");
    if(isset($_POST)){
        $userid = $_SESSION['userid'];
        $check = $_POST['check'];
        $str = implode($check,',');

        if($str==='all'){
            $from = $_POST['from'];
            $to = $_POST['to'];
            if($from!=""){
                $users_arr = array();

                $sql = "SELECT dc.name,geo.consignee_name,geo.location,gca.in_time,gca.out_time,gca.in_duration,geo.Coordinates FROM geofenceing as geo 
                join geo_check_audit as gca on gca.geo_id = geo.id 
                join devicesnew as dc on gca.veh_id=dc.id 
                join users_devices_new as ud on ud.devices_id=dc.id
                where geo.geotype='Black Spote' and gca.in_time >='$from'  and gca.in_time <='$to' and ud.users_id=$userid  order by gca.geo_id desc;";

                // echo $sql;

                $result = mysqli_query($db,$sql);
            
                while( $row = mysqli_fetch_array($result) ){
                    // $userid = $row['id'];
                    $name = $row['name'];
                    $consignee_name = $row['consignee_name'];
                    $location = $row['location'];
                    $in_time = $row['in_time'];
                    $out_time = $row['out_time'];
                    $in_duration = $row['in_duration'];
                    $Coordinates = $row['Coordinates'];
                
                    $users_arr[] = array(
                        'name'=>$name,
                        'consignee_name'=>$consignee_name,
                        'location'=>$location,
                        'in_time'=>$in_time,
                        'out_time'=>$out_time,
                        'in_duration'=>$in_duration,
                        'Coordinates'=>$Coordinates
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
            if($from!=""){
                $users_arr = array();
                
                
                $sql = "SELECT dc.name,geo.consignee_name,geo.location,gca.in_time,gca.out_time,gca.in_duration FROM geofenceing as geo join geo_check_audit as gca on gca.geo_id = geo.id join devicesnew as dc on gca.veh_id=dc.id where geo.geotype='Black Spote' and gca.in_time >='$from'  and gca.in_time <='$to' and dc.id IN ({$str}) order by gca.geo_id desc;";
                
                
                
                $result = mysqli_query($db,$sql);
            
                while( $row = mysqli_fetch_array($result) ){
                    // $userid = $row['id'];
                    $name = $row['name'];
                    $consignee_name = $row['consignee_name'];
                    $location = $row['location'];
                    $in_time = $row['in_time'];
                    $out_time = $row['out_time'];
                    $in_duration = $row['in_duration'];
                
                    $users_arr[] = array(
                        'name'=>$name,
                        'consignee_name'=>$consignee_name,
                        'location'=>$location,
                        'in_time'=>$in_time,
                        'out_time'=>$out_time,
                        'in_duration'=>$in_duration
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