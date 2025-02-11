<?php 
include("config_indemnifier.php"); 
include("sessioninput.php"); 
$mode=mysqli_real_escape_string($db,$_POST['mode']); 
// echo $mode;
// $vehicle_id=mysqli_real_escape_string($db,$_POST['vehicle_id']); 
$col_name=mysqli_real_escape_string($db,$_POST['col_name']); 
if ($mode=='true') //mode simple is true when button is Open 
{ $str=$db->query("UPDATE inlist_tracker SET `status`='1' where id=$col_name");
echo "Tagged to ".$col_name;
}
else if ($mode=='false')
{
$str=$db->query("UPDATE inlist_tracker SET `status`='0' where id=$col_name");
echo 'Untagged from '.$col_name;
}
?>