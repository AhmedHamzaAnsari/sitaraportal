<?php 
include("config_indemnifier.php"); 
include("sessioninput.php"); 
$mode=mysqli_real_escape_string($db,$_POST['mode']); 
echo $mode;
$productid=mysqli_real_escape_string($db,$_POST['id']); 
if ($mode=='true') //mode simple is true when button is Open 
{ $str=$db->query("UPDATE `product_family` SET `status`='1' where id=$productid");
    $success='On';
echo json_encode(array('response_result'=>$response_result,'$success'=>$success));
}
else if ($mode=='false')
{
$str=$db->query("UPDATE `product_family` SET `status`='0' where id=$productid");
$response_result='Hey my button is closed!!';
$success='Off';
echo json_encode(array('response_result'=>$response_result,'success'=>$success));
}
?>