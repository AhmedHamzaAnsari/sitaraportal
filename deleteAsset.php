<?php
include("config_indemnifier.php");
$id = $_GET['id'];

// $del = mysqli_query($db,"delete from vehicle_inlist where uniqueId = '$id'"); // delete query
$del2 = mysqli_query($db,"delete from users_devices where devices_id = '$id'"); // delete query
$del3 = mysqli_query($db,"delete from devices where uniqueId = '$id'"); // delete query
$del4 = mysqli_query($db,"delete from positions where device_id = '$id'"); // delete query

// if($del)
// {
    
// //     echo "<script>
// // alert('Record Delete successfully');
// // window.location.href='manageAsset.php';
// // </script>";
// }
// else
// {
//     echo "Error deleting record"; // display error message if not delete
// }

if($del2)
{
    
    echo "Deleted";
}

if($del3)
{
    
    echo "Deleted";
}
if($del4)
{
    echo "<script>
    alert('Record Delete successfully');
    window.location.href='manage_devices.php';
    </script>";
}



?>