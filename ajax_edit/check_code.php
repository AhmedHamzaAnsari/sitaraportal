<?php  
 //fetch.php  
 include("../config_indemnifier.php");

 if(isset($_POST["code"]))  
 {  
      $query = "SELECT EXISTS(SELECT * FROM geofenceing WHERE code=".$_POST["code"].")";  
      $result = mysqli_query($db, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>