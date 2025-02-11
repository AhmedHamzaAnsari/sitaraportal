<?php
    session_start();
    include("config_indemnifier.php");
    if(isset($_POST)){
       
            $users_arr = array();
            $products_arr=array();
            
            $sql="SELECT * FROM geo_in_check";
            $result = mysqli_query($db,$sql);
            
            while( $row = mysqli_fetch_array($result) ){
                // $userid = $row['id'];
                $name = $row['car_name'];
                $location = $row['location'];
                $coordinates = $row['latitude'].', '.$row['longitude'];
            
                $product_item = array("consignee_name" => $name,
            "coordinates" => $coordinates,
            "location" => $location,
            );
                // $users_arr[] = array('name' =>$name,'lat' =>$lat,'lng' =>$lng,'speed' =>$speed,'time' =>$time);
                array_push($products_arr, $product_item);
            }
            // print_r($users_arr);

            // echo 'True '.$data;
            
                echo json_encode($products_arr);
                
       
    }
?>