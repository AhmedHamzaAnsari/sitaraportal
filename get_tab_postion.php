

<?php
    session_start();
    include("config_indemnifier.php");
    $currnt_date = date('Y/m/d');

    if(isset($_POST)){
        
        $trip_id = $_POST['trip_id'];
        $lorry_id = $_POST['lorry_id'];
        if($trip_id!=""){
            $users_arr = array();
            // $sql="SELECT geo.Coordinates,pos.latitude,pos.longitude,pos.time,pos.vehicle_id,bt.vehicle,bt.vehiclename  FROM bycotrip as bt join geofenceing as geo on geo.id = bt.customer join positions as pos on pos.device_id = bt.vehicle where bt.vehicle='$trip_id' and initial_time >='$currnt_date' order by pos.time  desc;";
            $sql= "SELECT ts.*,geo.Coordinates,mt.complete from trip_main as mt join trip_sub as ts on mt.id=ts.main_id join geofenceing as geo on geo.id=ts.consignee_id where mt.lorry_no='$lorry_id' and mt.id='$trip_id'";
            // echo $sql;
            $result = mysqli_query($db,$sql);
            
            while( $row = mysqli_fetch_array($result) ){
                // $userid = $row['id'];
                // $name = $row['consignee_name'] .' Quee : '.$row['del_order'];
                $name = $row['consignee_name']  ;
                
                $Coordinates = $row['Coordinates'];
                $start_time = $row['start_time'];
                $complete = $row['complete'];
                $id = $row['id'];
            
                $users_arr[] = array($name,$Coordinates,$start_time,$complete,$id);
            }
            // print_r($users_arr);

            // echo 'True '.$data;
            
                echo json_encode($users_arr);
                
        }else{
            echo 'False';
        }
    }
?>
