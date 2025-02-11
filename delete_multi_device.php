<?php

include("config_indemnifier.php");
$id = $_POST['assign'];

$str = implode($id,',');
// echo $str;


$del = mysqli_query($db,"delete from vehicle_inlist where uniqueId IN ({$str})"); // delete query
// echo "delete from vehicle_inlist where uniqueId IN ({$str})";
if($del)
{
    // echo 1;
    
}
else
{
    echo 0; 
}

$del = mysqli_query($db,"delete from vehicle_inlist where uniqueId IN ({$str})"); // delete query
// echo "delete from vehicle_inlist where uniqueId IN ({$str})";
if($del)
{
    // echo 1;
    
}
else
{
    echo 0; 
}
$del_user_device = mysqli_query($db,"delete from users_devices where devices_id IN ({$str})"); // delete query

    if($del_user_device)
    {
        echo 1;

        echo "<script>
alert('Record Delete successfully');
window.location.href='manageAsset.php';
</script>";

    }
    else
    {
        echo 0; 
    }
?>