<?php
include ("../config_indemnifier.php");
session_start();
$user_id = $_SESSION['userid'];
$deviceid;
if (!empty($_POST))
{
    $output = '';
    $message = '';
    $cartraige = mysqli_real_escape_string($db, $_POST["cartraige"]);
    $alert_sms = $_POST['alert_sms'];
    // print_r($alert_sms);

    foreach ($alert_sms as $assign) {
    
            
        $sql1 = "INSERT INTO  cartrauge_depot_check (`cartrauge_id`,`sms_alerts`)
        VALUES ('$cartraige','$assign')";

        if (mysqli_query($db, $sql1)) {
            // echo '<script>alert("Assets assigned successfully")</script>';
            
        } else {
            $output .= 'Record Not Created !';


        // echo "Error: " . $sql . "<br>" . mysqli_error($db);
        }
    }

    $userData = count($_POST["consignee_code"]);

  
    
    if ($userData > 0)
    {
        $last_id = mysqli_insert_id($db);

        for ($i = 0;$i < $userData;$i++)
        {
            if (trim($_POST['consignee_code'] != ''))
            {
                $contact = $_POST["consignee_code"][$i];

                $query_tracker = "INSERT INTO `activity_contact`(`cartrauge_id`,`contact`)VALUES('$cartraige','$contact');";
                $result_tracker = mysqli_query($db, $query_tracker);

            }
        }
    }


$output .= 'Record Created Successfully !';
//    $output .= $message;
   
        
        
        // $query = "INSERT INTO `ptoptrack`.`activity_time_check`(`device_id`,`fromdate`,`todate`,`idel_time`,`stop_time`,`status`)VALUES('$lorry_number','$from','$to','$idel_time','$stop_time','1')";
        // $message = 'Data Inserted';
        // if (mysqli_query($db, $query))
        // {
           
               
            
        // }
        // else
        // {
        //     $output .= 'Error' . $query;

        // }
    
    echo $output;
}
?>
