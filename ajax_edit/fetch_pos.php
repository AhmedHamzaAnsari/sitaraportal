<?php  
 //fetch.php  
 include("../config_indemnifier.php");

 if(isset($_POST["employee_id"]))  
 {  
      $query = "SELECT * FROM positions where device_id='".$_POST["employee_id"]."' order by id desc limit 1";  
      $result = mysqli_query($db, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  


 if(isset($_POST["device_id"]))  
 {  
      $query = "SELECT * FROM devices where uniqueId='".$_POST["device_id"]."' order by id desc limit 1";  
      $result = mysqli_query($db, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>