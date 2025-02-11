<?php

include("config_tc.php");
$id = $_GET['id'];


$del = mysqli_query($db,"delete from create_group where id = '$id'"); // delete query

if($del)
{
    mysqli_close($db); // Close connection
    header("location:manageGroup.php"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>