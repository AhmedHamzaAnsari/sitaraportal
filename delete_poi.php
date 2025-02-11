<?php
include("config_indemnifier.php");
$id = $_GET['id'];
$type = $_GET['type'];

$del = mysqli_query($db,"delete from geofenceing where id = '$id'"); // delete query

if($del && $type == 'fence')
{
    
    echo "<script>
alert('Record Delete successfully');
window.location.href='manage_geofence.php';
</script>";
}
elseif($del && $type == 'black')
{
    
    echo "<script>
alert('Record Delete successfully');
window.location.href='manage_black_spote.php';
</script>";
}
else
{
    echo "Error deleting record"; // display error message if not delete
}


?>