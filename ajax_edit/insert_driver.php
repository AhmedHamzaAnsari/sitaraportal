<?php  
include("../config_indemnifier.php");
session_start();
$user_id=$_SESSION['userid'];
 if(!empty($_POST))  
 {  
      $output = '';  
      $message = '';  
      $cname = mysqli_real_escape_string($db, $_POST["cname"]);  
        $d_cnic = mysqli_real_escape_string($db, $_POST["d_cnic"]);  
        $d_no = mysqli_real_escape_string($db, $_POST["d_no"]);  
        $d_pri = mysqli_real_escape_string($db, $_POST["d_pri"]); 
     //    $file = mysqli_real_escape_string($db, $_POST["file"]); 
     
     //         $file = rand(1000,100000)."-".$_FILES['file']['name'];
     //    $file_loc = $_FILES['file']['tmp_name'];
     //    $file_size = $_FILES['file']['size'];
     //    //  $file_type = $_FILES['file']['type'];

     //    $fileName = basename($_FILES["file"]["name"]); 
     //    $targetFilePath = $uploadDir . $fileName; 
     //    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
     //    $folder="uploads/";
     //    move_uploaded_file($file_loc,$folder.$file);
    
      if($_POST["employee_id"] != '')  
      {  
           $query = "  
           UPDATE driver_detail   
           SET name='$cname',   
           cnic='$d_cnic',   
           mobile_no='$d_no',   
           privilage = '$d_pri' 
            WHERE id='".$_POST["employee_id"]."'";  
           $message = 'Data Updated  ';  
      }  
      else  
      {  
           $query = "  
           INSERT INTO `driver_detail`(`name`,`cnic`,`mobile_no`,`privilage`,`user_id`) Value ('$cname','$d_cnic','$d_no','$d_pri','$user_id') ";  
           $message = 'Data Inserted';  
      }  
      if(mysqli_query($db, $query))  
      {  
          //  $output .= '<div class="alert alert-light-warning border-0 mb-4" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="alert"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button> <strong>'.$message.' !</strong></div>';  
          //  $output .= 1;  
          $result_get = mysqli_query($db,"SELECT * FROM driver_detail where cnic ='$d_cnic' and user_id='$user_id'");
          $cust = mysqli_fetch_array($result_get);  
          $output .= json_encode($cust); 
           
      }  
      else{
          $output .= 'Error'.mysqli_error($db);  

      }
      echo $output;  
 }  
 ?>
