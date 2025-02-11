<?php
include("config_indemnifier.php");
$id = $_GET['id'];


$del3 = mysqli_query($db,"DELETE vi FROM vehicle_inlist AS vi
JOIN inlist_tracker AS it ON it.main_id = vi.id
WHERE vi.uniqueId = '$id';"); // delete query



if($del3)
{
    echo "<script>
    alert('Record Delete successfully');
    window.location.href='inlist_vehicle_list.php';
    </script>";
}



?>