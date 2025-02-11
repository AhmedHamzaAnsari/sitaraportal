<?php  
 //fetch.php  
 include("../config_indemnifier.php");

 if(isset($_POST["employee_id"]))  
 {  
      $query = "SELECT * FROM price_listing where id='".$_POST["employee_id"]."' order by id desc limit 1";  
      $result = mysqli_query($db, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>