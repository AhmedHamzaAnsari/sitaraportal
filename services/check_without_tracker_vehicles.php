<?php

include("../config_indemnifier.php");

ini_set('max_execution_time', '0');
$url1 = $_SERVER['REQUEST_URI'];
header("Refresh: 60; URL=$url1");

$sql_query = "SELECT * FROM sap_data_upload where is_tracker=1;";

$result2 = $db->query($sql_query) or die("Error :" . mysqli_error($db));
$counting = mysqli_query($db, $sql_query);
$rowcount = mysqli_num_rows($counting);
// echo $rowcount;
while ($user = $result2->fetch_assoc()) {
    $tl_no = $user['tl_no'];
    $id = $user['id'];
    echo $tl_no . '<br>';

    $sql_check = "SELECT * FROM devicesnew where name='$tl_no';";

    $result = $db->query($sql_check) or die("Error :" . mysqli_error($db));
    $count_check = mysqli_query($db, $sql_check);
    $rowcount_check = mysqli_num_rows($count_check);

    if ($rowcount_check > 0) {
        echo 'Found in Devices Table' . '<br>';

        $insert = "UPDATE `sap_data_upload`
        SET
        `is_tracker` = 0
        WHERE `id` = '$id';";

        if (mysqli_query($db, $insert)) {
            echo 'Update Tracker status to 1 ' . '<br>';

        } else {
            echo 'Not Update Tracker status to 1 ' . '<br>';

        }

    } else {
        echo 'Not Found in Devices Table' . '<br>';

    }

}



echo date('Y-m-d H:i:s');

?>