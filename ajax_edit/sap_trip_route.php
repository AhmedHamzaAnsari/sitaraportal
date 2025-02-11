<?php
    session_start();
    include("../config_indemnifier.php");
    if(isset($_POST)){
        $sap_no = $_POST['sap_no'];
        $id = $_POST['id'];
        if($sap_no!="" && $id!=""){
            $users_arr = array();
            $sql="SELECT da.*,sa.delivery_no,dc.name as vehicle_no FROM sap_data_upload as sa
            join devicesnew as dc on dc.name=sa.tl_no
            join positionsnew as da on da.device_id=dc.id
            where da.time>=sa.created_at and (CASE
                    WHEN sa.close_time='' THEN da.time <= NOW()
                    ELSE da.time <= sa.close_time
                END)  and sa.delivery_no='$sap_no' and sa.id='$id' ";
            $result = mysqli_query($db,$sql);
            
            while( $row = mysqli_fetch_array($result) ){
                // $userid = $row['id'];
                $name = $row['vehicle_name'];
                $lat = $row['latitude'];
                $lng = $row['longitude'];
                $speed = $row['speed'];
                $time = $row['time'];
                $power = $row['power'];
                $location = $row['address'];
            
                $users_arr[] = array($name,$lat,$lng,$speed,$time,$power,$location);
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