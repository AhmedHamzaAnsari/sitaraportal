<?php
session_start();
ini_set('memory_limit', '-1');

include ("config_indemnifier.php");

$userid = $_SESSION['userid'];

$users_arr = array();

$sql = "SELECT * FROM vehicle_inlist;";

// echo $sql;

$result = mysqli_query($db, $sql);

while ($row = mysqli_fetch_array($result)) {


    $users_arr[] = $row;
}
// print_r($users_arr);

// echo 'True '.$data;

echo json_encode($users_arr);



?>