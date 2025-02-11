<?php
    session_start();
    include("config_indemnifier.php");
    if(isset($_POST['trip_id'])){
        $check = $_POST['trip_id'];
        if($check!=""){
            $users_arr = array();
            $sql="SELECT ts.*,geo.Coordinates,pos.latitude,pos.longitude,geo.consignee_name, pos.time,pos.vehicle_id FROM trip_sub as ts join positions as pos on pos.device_id = ts.vehicle_id join geofenceing as geo on geo.id = ts.consignee_id where ts.id='$check' order by pos.time desc limit 1;";
            $result = mysqli_query($db,$sql);
            
            while( $row = mysqli_fetch_array($result) ){
                // $userid = $row['id'];
                $name = $row['vehicle_id'];
                $lat = $row['latitude'];
                $lng = $row['longitude'];
                $Coordinates = $row['Coordinates'];
                $time = $row['time'];
                $consignee_name = $row['consignee_name'];
                $products = $row['products'];
                $quantity = $row['quantity'];
                $consignee_contact_1 = $row['consignee_contact_1'];
                $del_order = $row['del_order'];
                $eta = $row['eta'];
            
                $users_arr[] = array($name,$lat,$lng,$Coordinates,$time,$consignee_name,$products,$quantity,$consignee_contact_1,$del_order,$eta);
            }
            // print_r($users_arr);

            // echo 'True '.$data;
            
                echo json_encode($users_arr);
                
        }else{
            echo 'False';
        }
    }

    if(isset($_POST['stage_area'])){
        $check = $_POST['stage_area'];
        if($check!=""){
            $users_arr = array();
            $sql="SELECT geo.*,mt.estimated_time FROM trip_sub as ts join trip_main as mt on ts.main_id=mt.id join geofenceing as geo on geo.id=mt.stage_area where ts.id='$check';";
            $result = mysqli_query($db,$sql);
            
            while( $row = mysqli_fetch_array($result) ){
                // $userid = $row['id'];\
                $consignee_name = $row['consignee_name'];
                $Coordinates = $row['Coordinates'];
                $estimated_time = $row['estimated_time'];
            
                $users_arr[] = array($consignee_name,$Coordinates,$estimated_time);
            }
            // print_r($users_arr);

            // echo 'True '.$data;
            
                echo json_encode($users_arr);
                
        }else{
            echo 'False';
        }
    }

    if(isset($_POST['base_area'])){
        $check = $_POST['base_area'];
        if($check!=""){
            $users_arr = array();
            $sql="SELECT mt.id,mt.base,geo.consignee_name,geo.Coordinates,mt.create_time FROM trip_sub as ts join trip_main as mt on ts.main_id=mt.id join geofenceing as geo on geo.id=mt.base where ts.id='$check';";
            // echo $sql;
            $result = mysqli_query($db,$sql);
            
            while( $row = mysqli_fetch_array($result) ){
                // $userid = $row['id'];\
                $consignee_name = $row['consignee_name'];
                $Coordinates = $row['Coordinates'];
                $create_time = $row['create_time'];
            
                $users_arr[] = array($consignee_name,$Coordinates,$create_time);
            }
            // print_r($users_arr);

            // echo 'True '.$data;
            
                echo json_encode($users_arr);
                
        }else{
            echo 'False';
        }
    }
?>