

<?php  
include("../config_indemnifier.php");
session_start();
 if(!empty($_POST))  
 {  
      $output = '';  
      $message = '';  
      $cname = mysqli_real_escape_string($db, $_POST["cname"]);  
        
    
      if($_POST["employee_id"] != '')  
      {  
          
           
           $query1 = " UPDATE price_listing SET consignee_rate='$cname' WHERE id='".$_POST["employee_id"]."' ";  

          //  echo $query;
          
      }  
      
      if(mysqli_query($db, $query1))  
      {  
        $message = 'Data Updated  ';
           
      } 

      
      echo $output;  
 }  
 ?>