<?php

include("config_indemnifier.php");
$id = $_GET['id'];


$del = mysqli_query($db,"delete from users where id = '$id'"); // delete query

if($del)
{
    echo '<script>alert("Delete from users successfully")</script>';
}
else
{
    echo "Error deleting record"; // display error message if not delete
}


?>