<?php  
include("../config_indemnifier.php");
session_start();
$user_id=$_SESSION['userid'];
 if(!empty($_POST))  
 {  
      $output = '';  
      $message = '';  
      $cname = mysqli_real_escape_string($db, $_POST["cname"]);  

    
      if($_POST["employee_id"] != '')  
      {  
           $query = "  
           UPDATE devices   
           SET name='$cname'
            WHERE uniqueId='".$_POST["employee_id"]."'";  
           $message = 'Data Updated  ';  
      }  
      else  

      {  
        $deviceid;
          $id_query="SELECT uniqueId FROM devices order by uniqueId desc limit 1;";
          $result = $db->query($id_query);

            if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $deviceid = $row["uniqueId"];
                //echo "id: " . $row["id"]. "<br>";
            }
            } else {
            echo "0 results";
            }

            $deviceid = ($deviceid+1);
           $query = "  
           INSERT INTO `devices`(`uniqueId`,`name`,`device_type`,`description`,`licensepn`,`deviceid1`) Value ('$deviceid','$cname','3','without_tracker','$cname','$cname') ";  
           $message = 'Data Inserted';  
      }  
      if(mysqli_query($db, $query))  
      {  
           $output .= '<div class="alert alert-light-warning border-0 mb-4" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="alert"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button> <strong>'.$message.' !</strong></div>';  
        //    $output .= $message;  
           
      }  
      else{
          $output .= 'Error'.$query;  

      }
      echo $output;  
 }  
 ?>
