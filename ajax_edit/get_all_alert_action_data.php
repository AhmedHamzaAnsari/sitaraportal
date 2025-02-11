<?php
//fetch.php
include("../config_indemnifier.php");

if (isset($_POST["alert_id"]))
{
    $users = array();
    $alert_id = $_POST["alert_id"];
    $table_name = $_POST["table_name"];

    
      
        $sql_query = "SELECT * FROM $table_name where alert_id=$alert_id;";

        $result2 = $db->query($sql_query) or die("Error :" . mysqli_error($db));
        $counting = mysqli_query($db, $sql_query);
        $rowcount = mysqli_num_rows($counting);
        // echo $rowcount;
        while ($user = $result2->fetch_assoc())
        {
            $users[] = $user; 

        }
    

    // create json output
    echo json_encode($users);

}
?>