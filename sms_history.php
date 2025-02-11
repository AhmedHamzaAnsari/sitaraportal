<?php
    session_start();
    ini_set('memory_limit', '-1');

    include("config_indemnifier.php");
    if(isset($_POST)){
        $check = $_POST['check'];
        // $str = implode($check,',');

        if($check==='close'){
            $from = $_POST['from'];
            $to = $_POST['to'];
            if($from!=""){
                $users_arr = array();

                $sql = "SELECT * FROM trip_close_sms_log  where time >='$from' or time <='$to' order by id desc;";
                // echo $sql;

                

                $result = mysqli_query($db,$sql);
            
                while( $row = mysqli_fetch_array($result) ){
                    // $userid = $row['id'];
                    $no = $row['send_to'];
                    $msg = $row['message'];
                    $time = $row['time'];
                    $sub_id = $row['sub_id'];
                   
                
                    $users_arr[] = array(
                        'no'=>$no,
                        'msg'=>$msg,
                        'time'=>$time,
                        'sub_id'=>$sub_id
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

        
            $from = $_POST['from'];
            $to = $_POST['to'];
            if($from!=""){
                $users_arr = array();

                $sql = "SELECT * FROM trip_start_sms_log  where time >='$from' or time <='$to' order by id desc;";
                // echo $sql;

                

                $result = mysqli_query($db,$sql);
            
                while( $row = mysqli_fetch_array($result) ){
                    // $userid = $row['id'];
                    $no = $row['send_to'];
                    $msg = $row['message'];
                    $time = $row['time'];
                    $sub_id = $row['sub_id'];
                   
                
                    $users_arr[] = array(
                        'no'=>$no,
                        'msg'=>$msg,
                        'time'=>$time,
                        'sub_id'=>$sub_id
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