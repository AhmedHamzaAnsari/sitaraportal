<?php

include("config_indemnifier.php");
$id = $_GET['id'];


$del = mysqli_query($db,"delete from product_family where id = '$id'"); // delete query

if($del)
{
    mysqli_close($db); // Close connection
    header("location:manage_family_product_h.php"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>