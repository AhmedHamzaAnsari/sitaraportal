<?php
    session_start();
    include("config_indemnifier.php");
    if(!empty($_POST['check'])){
        $check = $_POST['check'];
        if($check!=""){
            $result = mysqli_query($db,"SELECT dc.name,UPPER(dc.name) as car_name,dc.ignition as power,dc.lat as latitude,dc.lng as longitude,dc.id as device_id,dc.speed,dc.odometer as imileage,dc.time,dc.location as vlocation FROM devicesnew as dc where dc.id='$check' ");
            $cust = mysqli_fetch_array($result); 
        

            // echo 'True '.$data;
            if($cust) {
                echo json_encode($cust);
                } else {
                // echo "Error: "  "" . mysqli_error($db);
                }
        }else{
            echo 'False';
        }
    }


    if(!empty($_POST['trip_id'])){
        $trip_id = $_POST['trip_id'];
        $stage_area;
            $check_stage="SELECT stage_area FROM trip_main where id='$trip_id';";

            $stage = $db->query($check_stage);

            if ($stage->num_rows > 0) {
            // output data of each row
            while($row = $stage->fetch_assoc()) {
                $stage_area = $row["stage_area"];
                // echo "id: " . $row["stage_area"]. "<br>";
            }
        } 
        if($trip_id!=""){
            

            if($stage_area=='0'){
                
            $result = mysqli_query($db,"SELECT tm.*,geo.consignee_name,ts.vehicle_name as lorry_name FROM trip_main as tm 
            inner join trip_sub as ts on ts.main_id=tm.id
            inner join geofenceing as geo on tm.base=geo.id  where tm.id ='$trip_id'");
         
            $cust = mysqli_fetch_array($result); 
        

            // echo 'True '.$data;
            if($cust) {
                echo json_encode($cust);
                } else {
                echo "Error: " . mysqli_error($db);
                }
            }
            else{
                
            $result = mysqli_query($db,"SELECT tm.*,ts.vehicle_name as lorry_name,geo.consignee_name,st.consignee_name as stage_name FROM trip_main as tm 
            inner join trip_sub as ts on ts.main_id=tm.id
            inner join geofenceing as geo on tm.base=geo.id  
            inner join geofenceing as st on tm.stage_area=st.id  where tm.id ='$trip_id'");
         
            $cust = mysqli_fetch_array($result); 
        

            // echo 'True '.$data;
            if($cust) {
                echo json_encode($cust);
                } else {
                echo "Error: " . mysqli_error($db);
                }
            }


        }else{
            echo 'False';
        }
    }

    


    if(!empty($_POST['trip_id_sub'])){
        
        $trip_id_sub = $_POST['trip_id_sub'];
        if($trip_id_sub!=""){
            $users_arr = array();
            $sql= "SELECT * FROM trip_sub where main_id ='$trip_id_sub'";
            // echo $sql;
            $result = mysqli_query($db,$sql);
            
            while( $row = mysqli_fetch_array($result) ){
                // $userid = $row['id'];
                $sub_id = $row['id'];
                $consignee_code = $row['consignee_code'];
                
                $consignee_name = $row['consignee_name'];
                $products = $row['products'];
                $quantity = $row['quantity'];
                $document_ref = $row['document_ref'];
            
                $users_arr[] = array($consignee_code,$consignee_name,$products,$quantity,$document_ref,$sub_id);
            }
            // print_r($users_arr);

            // echo 'True '.$data;
            
                echo json_encode($users_arr);
                
        }else{
            echo 'False';
        }
    }


    if(!empty($_POST['cartraige_id'])){
        
        $cartraige_id = $_POST['cartraige_id'];
        if($cartraige_id!=""){
            $users_arr = array();
            $sql= "SELECT * FROM report_email where user_id='$cartraige_id'";
            // echo $sql;
            $result = mysqli_query($db,$sql);
            
            while( $row = mysqli_fetch_array($result) ){
                // $userid = $row['id'];
                $id = $row['id'];
                $email = $row['email'];
                
               
            
                $users_arr[] = array('id'=>$id,'email'=>$email);
            }
            // print_r($users_arr);

            // echo 'True '.$data;
            
                echo json_encode($users_arr);
                
        }else{
            echo 'False';
        }
    }
?>