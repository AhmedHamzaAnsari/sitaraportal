<?php
include ("../config_indemnifier.php");
session_start();
$user_id = $_SESSION['userid'];
$deviceid;
if (!empty($_POST))
{
    $output = '';
    $message = '';
    $cname = mysqli_real_escape_string($db, $_POST["cname"]);
    $status = mysqli_real_escape_string($db, $_POST["status"]);
    $check_box = mysqli_real_escape_string($db, $_POST["check_box_val"]);

    $userData = count($_POST["consignee_code"]);

    //   $al_shyma = mysqli_real_escape_string($db, $_POST["al_shyma"]);
    //   $anytracker = mysqli_real_escape_string($db, $_POST["anytracker"]);
    //   $Universal = mysqli_real_escape_string($db, $_POST["Universal"]);
    //   $PTSL = mysqli_real_escape_string($db, $_POST["PTSL"]);
    //   $united_sitara = mysqli_real_escape_string($db, $_POST["united_sitara"]);
    //   $topflay = mysqli_real_escape_string($db, $_POST["topflay"]);
    

    if ($_POST["employee_id"] != '')
    {
        $device_id = $_POST["employee_id"];
        $query = "  
           UPDATE vehicle_inlist   
           SET name='$cname',status='$status'
            WHERE id='" . $_POST["employee_id"] . "'";

        if (mysqli_query($db, $query))
        {
            if ($check_box === '0')
            {
                if ($userData > 0)
                {
                    // $last_id = mysqli_insert_id($db);
                    $checkRecord = mysqli_query($db, "SELECT * FROM inlist_tracker where main_id=$device_id");
                    // echo "SELECT * FROM inlist_tracker where main_id='$device_id'";
                    $totalrows = mysqli_num_rows($checkRecord);

                    if ($totalrows > 0)
                    {
                        // echo " Delete record";
                        $query_del = "DELETE FROM inlist_tracker where main_id='$device_id'";
                        // echo $query_del;
                        if (mysqli_query($db, $query_del))
                        {
                            for ($i = 0;$i < $userData;$i++)
                            {
                                if (trim($_POST['del_order'] != '') && trim($_POST['consignee_code'] != ''))
                                {

                                    $tracker_ = $_POST["del_order"][$i];
                                    $inlist_name = $_POST["consignee_code"][$i];

                                    $query_tracker_edit = "INSERT INTO `inlist_tracker`(`main_id`,`tracker`,`inlist_name`,`main_name`,`status`)VALUES('$device_id','$tracker_','$inlist_name','$cname','1');";
                                    mysqli_query($db, $query_tracker_edit);

                                }
                            }

                        }

                    }
                }
            }
            else
            {
                // echo " Addes record";
                if (trim($_POST['del_order'] != '') && trim($_POST['consignee_code'] != ''))
                {

                    $tracker_ = $_POST["del_order"][$i];
                    $inlist_name = $_POST["consignee_code"][$i];

                    $query_tracker = "INSERT INTO `inlist_tracker`(`main_id`,`tracker`,`inlist_name`,`main_name`,`status`)VALUES('$device_id','$tracker_','$inlist_name','$cname','1');";
                    $result_tracker = mysqli_query($db, $query_tracker);

                }
            }

            $output .= 'Vehicle Updated Successfully !';
            //    $output .= $message;
            
        }
        else
        {
            $output .= 'Error' . $query;

        }

        $message = 'Data Updated  ';
    }
    else
    {
        
        $id_query = "SELECT uniqueId FROM vehicle_inlist order by uniqueId desc limit 1;";
        $result = $db->query($id_query);

        if ($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                $deviceid = $row["uniqueId"];
                //echo "id: " . $row["id"]. "<br>";
                
            }
        }
        else
        {
            $deviceid = 0;
        }

        $date = date('Y-m-d H:i:s');
        $deviceid = ($deviceid + 1);
        $query = " INSERT INTO `vehicle_inlist`(`uniqueId`,`name`,`created_on`,`status`,`vehicle_status`) Value ('$deviceid','$cname','$date',$status,'$check_box')";
        $message = 'Data Inserted';
        if (mysqli_query($db, $query))
        {
            // $inlist_lastid = mysql_insert_id();
            if ($check_box === '0')
            {
                if ($userData > 0)
                {
                    $last_id = mysqli_insert_id($db);

                    for ($i = 0;$i < $userData;$i++)
                    {
                        if (trim($_POST['del_order'] != '') && trim($_POST['consignee_code'] != ''))
                        {

                            $tracker_ = $_POST["del_order"][$i];
                            $inlist_name = $_POST["consignee_code"][$i];

                            $query_tracker = "INSERT INTO `inlist_tracker`(`main_id`,`tracker`,`inlist_name`,`main_name`,`status`)VALUES('$last_id','$tracker_','$inlist_name','$cname','1');";
                            $result_tracker = mysqli_query($db, $query_tracker);

                        }
                    }
                }
            }

            $output .= 'Vehicle Created Successfully !';
            //    $output .= $message;
            
        }
        else
        {
            $output .= 'Error' . $query;

        }
    }
    echo $output;
}
?>
