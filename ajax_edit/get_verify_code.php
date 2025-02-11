<?php

include("../config_indemnifier.php");
if (isset($_POST)) {
    $varify_code = $_POST['varify_code'];
    $id = $_POST['id'];
    $e_id = $_POST['e_id'];
    $interval = $_POST['interval'];
    $from = $_POST['from'];

    if ($e_id != "") {
        $sql = "SELECT * FROM alert_email_link_verification 
        where email='$e_id' and cart_id='$id' and verify_code='$varify_code' and `date`='$from' and time_interval='$interval'";
        $result = mysqli_query($db, $sql);
        // $cust = mysqli_fetch_array($result);

        $count = mysqli_num_rows($result);
        // echo $count;
        
        // If result matched $myusername and $mypassword, table row must be 1 row
        if($count>0){
           
              echo 1;
        
            
        }
        else{
          echo 0;
        }
    } else {
        echo 0;
    }
}
?>