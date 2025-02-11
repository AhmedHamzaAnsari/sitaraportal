<?php  
 //fetch.php  
 include("../config_indemnifier.php");

 if(isset($_POST["employee_id"]))  
 {  
      $query = "SELECT * FROM devices where uniqueId='".$_POST["employee_id"]."' ";  
      $result = mysqli_query($db, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>