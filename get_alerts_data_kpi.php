

<?php
session_start();
ini_set('memory_limit', '-1');

include("config_indemnifier.php");
$todate=date("Y-m-d H:i:s", time());

$prev_date=date("Y-m-d H:i:s", strtotime($todate .' -1 day'));
if(isset($_POST)){
    $check = $_POST['check'];
    $from = $_POST['from'];
    $to = $_POST['to'];
    $str = implode($check,',');

    if($str==='all'){
        if($str!=""){
            $users_arr = array();
            // $sql="SELECT * FROM driving_alerts where created_at>='$from' and created_at<='$to' order by id desc;";
            $sql = "SELECT distinct(da.type),(SELECT count(*) FROM driving_alerts where type=da.type) as alert_count FROM driving_alerts as da where da.created_at>='$from' and da.created_at<='$to';";

            

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

    

        $str = implode($check,"','");
        // print_r($check);
       
        if($str!=""){
            $users_arr = array();
            
            // $sql = "SELECT * FROM driving_alerts where type IN ('$str') and created_at>='$from' and created_at<='$to' order by id desc";
            $sql = "SELECT distinct(da.type),(SELECT count(*) FROM driving_alerts where type=da.type) as alert_count FROM driving_alerts as da where da.type IN ('$str') and da.created_at>='$from' and da.created_at<='$to';";

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