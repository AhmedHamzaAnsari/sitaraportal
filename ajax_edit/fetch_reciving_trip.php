<?php
    session_start();
    include("../config_indemnifier.php");
    if(isset($_POST["employee_id"]))  {
        $trip_id = $_POST["employee_id"];
        if($trip_id!="" ){
            $users_arr = array();
            $sql="SELECT rs.receive_main_id,rs.remark_case_product,rs.remarks_deliverd_qty,rs.shortage_ltr,rs.receive_upload,ts.consignee_code,ts.consignee_name,ts.products,ts.quantity,ts.document_ref,ts.consignee_contact_1,ts.consignee_contact_2,ts.consignee_contact_3,ts.del_order,ts.eta,ts.by_,ts.start_time,ts.vehicle_id,ts.vehicle_name,ts.id FROM receive_sub as rs join trip_sub as ts on rs.trip_sub_id=ts.id where receive_main_id='$trip_id'";
            $result = mysqli_query($db,$sql);
            
            while( $row = mysqli_fetch_array($result) ){
                // $userid = $row['id'];
                $remark_case_product = $row['remark_case_product'];
                $remarks_deliverd_qty = $row['remarks_deliverd_qty'];
                $shortage_ltr = $row['shortage_ltr'];
                $receive_upload = $row['receive_upload'];
                $consignee_code = $row['consignee_code'];
                $consignee_name = $row['consignee_name'];
                $products = $row['products'];
                $quantity = $row['quantity'];
                $document_ref = $row['document_ref'];
                $consignee_contact_1 = $row['consignee_contact_1'];
                $consignee_contact_2 = $row['consignee_contact_2'];
                $consignee_contact_3 = $row['consignee_contact_3'];
                $del_order = $row['del_order'];
                $eta = $row['eta'];
                $by_ = $row['by_'];
                $start_time = $row['start_time'];
                $vehicle_id = $row['vehicle_id'];
                $vehicle_name = $row['vehicle_name'];
                $sub_trip_id = $row['id'];
                
            
                $users_arr[] = array(
                   'remark_case_product'=> $remark_case_product,
                   'remarks_deliverd_qty'=> $remarks_deliverd_qty,
                   'shortage_ltr'=> $shortage_ltr,
                   'receive_upload'=> $receive_upload,
                   'sub_trip_id'=> $sub_trip_id,
                   'consignee_code'=> $consignee_code,
                   'consignee_name'=> $consignee_name,
                   'products'=> $products,
                   'quantity'=> $quantity,
                   'document_ref'=> $document_ref,
                   'consignee_contact_1'=> $consignee_contact_1,
                   'consignee_contact_2'=> $consignee_contact_2,
                   'consignee_contact_3'=> $consignee_contact_3,
                   'del_order'=> $del_order,
                   'eta'=> $eta,
                   'by_'=> $by_,
                   'start_time'=> $start_time,
                   'vehicle_id'=> $vehicle_id,
                   'vehicle_name'=> $vehicle_name
                );
                // $users_arr[] = array('name' =>$name,'lat' =>$lat,'lng' =>$lng,'speed' =>$speed,'time' =>$time);

            }
            // print_r($users_arr);

            // echo 'True '.$data;
            
                echo json_encode($users_arr);
                
        }else{
            echo 'False';
        }
    }

    if(isset($_POST['mr_id'])){
        $check = $_POST['mr_id'];
        $date=date('Y-m-d');
        if($check!=""){
            $result = mysqli_query($db,"SELECT mr.*,tm.*,geo.consignee_name,dc.name FROM receive_main as mr join trip_main as tm on mr.trip_id =tm.id join devices as dc on tm.lorry_no=dc.uniqueId left join geofenceing as geo on tm.stage_area=geo.id where mr.id='$check' ; ");
            $cust = mysqli_fetch_array($result); 
        

            // echo 'True '.$data;
            if($cust) {
                echo json_encode($cust);
                } else {
                echo "Error: " ."Select Correct Consignee Code". "" . mysqli_error($db);
                }
        }else{
            echo 'False';
        }
    }
?>