<?php
    session_start();
    include("config_indemnifier.php");
    if(isset($_POST['check'])){
        $check = $_POST['check'];
        if($check!=""){
            $result = mysqli_query($db,"SELECT geo.*,cc.contact_1,cc.contact_2,cc.contact_3 FROM geofenceing as geo left join consignee_contact as cc on geo.id=cc.geo_id where code='$check' ");
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

    if(isset($_POST['fright_price'])){
        $check = $_POST['fright_price'];
        $date=date('Y-m-d');
        if($check!=""){
            $result = mysqli_query($db,"SELECT * FROM price_listing where consignee_code='$check' and date='$date'; ");
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