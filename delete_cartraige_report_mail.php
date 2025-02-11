<?php
include("config_indemnifier.php");
$id = $_GET['id'];

$del = mysqli_query($db,"delete from email_scedule where id = '$id'"); // delete query

if($del)
{
    
    echo "<script>
alert('Record Delete successfully');
window.location.href='cartraige_report_mail.php';
</script>";
}
else
{
    echo "Error deleting record"; // display error message if not delete
}


?>