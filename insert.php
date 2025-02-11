<?php
include("config_tc.php");
$message = $_POST['message'];

$sql = "INSERT INTO `chat` (`messsage`) VALUES ('$message')";
if ($db->query($sql) === TRUE) {
    echo "data inserted";
} else {
    echo "failed";
}
?>