<?php  
 //fetch.php  
 include("config_indemnifier.php");

//  if(isset($_POST["employee_id"]))  
//  {  
//       $query = "SELECT * FROM trip_sub as ts join receive_sub as rs on rs.trip_sub_id = ts.id  where rs.receive_main_id=  '".$_POST["employee_id"]."'";  
//       $result = mysqli_query($db, $query);  
//       $row = mysqli_fetch_array($result);  
//       echo json_encode($row);  
//  }  

 if(!empty($_POST['employee_id'])){
        
    $receive_main_id = $_POST['employee_id'];
    if($receive_main_id!=""){
        $users_arr = array();
        $sql= "SELECT * FROM trip_sub as ts join receive_sub as rs on rs.trip_sub_id = ts.id  where rs.receive_main_id='$receive_main_id'";
        // echo $sql;
        $result = mysqli_query($db,$sql);
        
        while( $row = mysqli_fetch_array($result) ){
            // $userid = $row['id'];
            $consignee_code = $row['consignee_code'];
            $consignee_name = $row['consignee_name'];
            
            $products = $row['products'];
            $quantity = $row['quantity'];
            $vehicle_name = $row['vehicle_name'];
            $remark_case_product = $row['remark_case_product'];
            $remarks_deliverd_qty = $row['remarks_deliverd_qty'];
            $shortage_ltr = $row['shortage_ltr'];
            $receive_upload = $row['receive_upload'];
        
            $users_arr[] = array($consignee_code,$consignee_name,$products,$quantity,$vehicle_name,$remark_case_product,$remarks_deliverd_qty,$shortage_ltr,$receive_upload);
        }
        // print_r($users_arr);

        // echo 'True '.$data;
        
            echo json_encode($users_arr);
            
    }else{
        echo 'False';
    }
}
 ?>