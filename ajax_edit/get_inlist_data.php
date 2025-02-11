<?php  
 //fetch.php  
 include("../config_indemnifier.php");

 if(!empty($_POST["vehicle_id"]))  
 {  
      $query = "SELECT * FROM vehicle_inlist where uniqueId='".$_POST["vehicle_id"]."'";  
      $result = mysqli_query($db, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  

 if(!empty($_POST['tracker'])){
        
    $tracker = $_POST['tracker'];
    if($tracker!=""){
        $users_arr = array();
        $sql= "SELECT * FROM inlist_tracker where main_id ='$tracker'";
        // echo $sql;
        $result = mysqli_query($db,$sql);
        
        while( $row = mysqli_fetch_array($result) ){
            // $userid = $row['id'];
            $main_id = $row['main_id'];
            $tracker = $row['tracker'];
            $inlist_name = $row['inlist_name'];
            
            
        
            $users_arr[] = array($main_id,$tracker,$inlist_name);
        }
        // print_r($users_arr);

        // echo 'True '.$data;
        
            echo json_encode($users_arr);
            
    }else{
        echo 'False';
    }
}
 ?>