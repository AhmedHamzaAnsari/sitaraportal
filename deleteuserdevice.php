<?php

include("config_indemnifier.php");
$users_id = $_GET['users_id'];
$devices_id = $_GET['devices_id'];


$del = mysqli_query($db,"DELETE from users_devices_new where devices_id  = '$devices_id' and users_id='$users_id'"); // delete query

if($del)
{
    // mysqli_close($db); // Close connection
    echo "<script>
    alert('Record Delete successfully');
    window.location.href='assign_vehicle_list.php';
    </script>";
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>