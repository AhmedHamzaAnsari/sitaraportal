<?php  
 //fetch.php  
 include("../config_indemnifier.php");

  


 if(isset($_POST["sap_id"]))  
 {  
    $id = $_POST["sap_id"];
      $query = "SELECT * FROM sapstart where id=$id;";  
      $result = mysqli_query($db, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>