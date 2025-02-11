<?php 
include("config_indemnifier.php"); 
include("sessioninput.php"); 
$mode=mysqli_real_escape_string($db,$_POST['mode']); 
// echo $mode;
$productid=mysqli_real_escape_string($db,$_POST['id']); 
if ($mode=='true') //mode simple is true when button is Open 
{ $str=$db->query("UPDATE vehicle_inlist SET `status`='1' where uniqueId=$productid");
    echo "Vehicle Active ";
}
else if ($mode=='false')
{
$str=$db->query("UPDATE vehicle_inlist SET `status`='0' where uniqueId=$productid");
echo "Vehicle Inactive  ";

}
?>