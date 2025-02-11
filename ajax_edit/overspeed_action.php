<?php  
include("../config_indemnifier.php");
session_start();
$user_id=$_SESSION['userid'];
 if(!empty($_POST))  
 {  
      $output = '';  
      $message = ''; 
      $licenseStatus =''; 
      $driverCNIC =''; 
      $responsible =''; 
      $datetime = date('Y-m-d H:i:s');
      $os_authentic_action = mysqli_real_escape_string($db,$_POST['os_authentic_action']);

      if($os_authentic_action == 'yes'){
           $licenseStatus = mysqli_real_escape_string($db,$_POST['licenseStatus']);

           if($licenseStatus=='loaded'){
                $driverCNIC = mysqli_real_escape_string($db,$_POST['driverCNIC']); 

           }else{

                $responsible = mysqli_real_escape_string($db,$_POST['responsible']); 
           }

      }
      else{

      }
    $action_discription = mysqli_real_escape_string($db,$_POST['action_discription']); 
    $table_name = mysqli_real_escape_string($db,$_POST['table_name']); 
    $employee_id = mysqli_real_escape_string($db,$_POST['employee_id']); 

    $cartraige_id = mysqli_real_escape_string($db,$_POST['cartraige_id']); 
    // $role = mysqli_real_escape_string($db,$_POST['role']); 

     
           $query = "INSERT INTO `$table_name`
           (`alert_id`,
           `is_authorize`,
           `status`,
           `driver_cnic`,
           `who_is_responsible`,
           `description`,
           `created_at`,
           `created_by`)
           VALUES
           ('$employee_id',
           '$os_authentic_action',
           '$licenseStatus',
           '$driverCNIC',
           '$responsible',
           '$action_discription',
           '$datetime',
           '$cartraige_id');";  
          //  $message = 'Data Inserted';  
       
      if(mysqli_query($db, $query))  
      {  
          //  $output .= '<div class="alert alert-light-warning border-0 mb-4" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="alert"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button> <strong>'.$message.' !</strong></div>';  
           $output = 1;  
           
      }  
      else{
          $output = 0;  

      }
      echo $output;  
 }  
 ?>