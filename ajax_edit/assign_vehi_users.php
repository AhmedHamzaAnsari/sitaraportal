<?php  
include("../config_indemnifier.php");
session_start();
$user_id=$_SESSION['userid'];
 if(!empty($_POST))  
 {  
      $output = '';  
      $message = '';  
      $user_id = mysqli_real_escape_string($db, $_POST["user_id"]);  
      $vehicle_id = mysqli_real_escape_string($db, $_POST["vehicle_id"]);  
     
    
        $date = date('Y-m-d H:i:s');
           $query = "  
           INSERT INTO  users_devices (`users_id`,`devices_id`)VALUES('$user_id','$vehicle_id');";  
           $message = 'Data Inserted';  
      
      if(mysqli_query($db, $query))  
      {  
          //  $output .= '<div class="alert alert-light-warning border-0 mb-4" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="alert"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button> <strong>'.$message.' !</strong></div>';  
           $output .= 1;  
           
      }  
      else{
          $output .= 'Error'.mysqli_error($db);  

      }
      echo $output;  
 }  
 ?>
