<?php
session_start();
ini_set('memory_limit', '-1');

include("../config_indemnifier.php");
$todate=date("Y-m-d H:i:s", time());

$prev_date=date("Y-m-d H:i:s", strtotime($todate .' -1 day'));
if(isset($_POST)){
    $check = $_POST['check'];

    if($check==='all'){
        if($check!=""){
            $users_arr = array();
            $sql="SELECT * FROM driver_training;";

            

            $result = mysqli_query($db,$sql);
            
            while( $row = mysqli_fetch_array($result) ){
                
            
                $users_arr[] = $row;
            }
            // print_r($users_arr);

            // echo 'True '.$data;
            
                echo json_encode($users_arr);
                
        }else{
            echo 'False';
        }
    }
    else{

    

       
        if($check!=""){
            $users_arr = array();
            
            $sql = "SELECT * FROM driver_training where cnic='$check'";
            $result = mysqli_query($db,$sql);
            
            while( $row = mysqli_fetch_array($result) ){
                
            
                $users_arr[] = $row;
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