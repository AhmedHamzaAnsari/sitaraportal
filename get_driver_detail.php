<?php
    session_start();
    include("config_indemnifier.php");
    if(!empty($_POST['check'])){
        $check = $_POST['check'];
        if($check!=""){
            $result = mysqli_query($db,"SELECT * FROM `driver_detail` WHERE mobile_no='$check' limit 1");
            $cust = mysqli_fetch_array($result); 
        

            // echo 'True '.$data;
            if($cust) {
                echo json_encode($cust);
                } else {
                echo "0";
                }
        }else{
            echo 'False';
        }
    }

    if(!empty($_POST['country'])) {
        $query ="SELECT * FROM driver_detail WHERE privilage='0' and mobile_no LIKE '" . $_POST['country'] . "%'";
        $result = $db->query($query);
        if(!empty($result)) {
           echo "<ul id='countries'>";
           foreach($result as $country) {
              echo "<li>" . $country['mobile_no'] . "</li>";
           }
           echo "</ul>";
        } 
     }

     if(!empty($_POST['h_helper'])) {
        $query ="SELECT * FROM driver_detail WHERE privilage='1' and mobile_no LIKE '" . $_POST['h_helper'] . "%'";
        $result = $db->query($query);
        if(!empty($result)) {
           echo "<ul id='helpers'>";
           foreach($result as $country) {
              echo "<li>" . $country['mobile_no'] . "</li>";
           }
           echo "</ul>";
        } 
     }
?>