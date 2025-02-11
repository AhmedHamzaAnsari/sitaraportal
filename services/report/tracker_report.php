<?php
ini_set('max_execution_time', -1);
date_default_timezone_set("Asia/Karachi");
$username = "root";
$password = "";
$database = "sitara";
$connection = mysqli_connect('localhost', $username, $password, $database);
if (!$connection) {
    die('Not connected : ' . mysqli_error($connection));
}

// Set the active MySQL database
$db_selected = mysqli_select_db($connection, $database);
if (!$db_selected) {
    die('Can\'t use db : ' . mysqli_error($connection));
}
echo 'Start time => ' . date('Y-m-d H:i:s'), '<br>';
function clean($string)
{
    $string = str_replace('', '-', $string); // Replaces all spaces with hyphens.

    return preg_replace('/[^A-Za-z0-9]/', '', $string); // Removes special chars.
}

$inlist = "SELECT * FROM bulkdatanew where protocol='q_tracker'";
$sql_inlist = mysqli_query($connection, $inlist);
mysqli_error($connection);
$i = 0;
while ($rowinlist = mysqli_fetch_array($sql_inlist)) {
    // $vehicle = $rowinlist['vehicle'];
    $id_bulk = $rowinlist['id'];
    $st_server = $rowinlist['st_server'];
    $vehicle = explode(' ', $rowinlist['name'])[0];

    $update_vari = '';

   echo $inlisttracker = "SELECT * FROM inlist_tracker
    where (inlist_name='$vehicle' OR main_name='$vehicle' and tracker='q_tracker')";
    // echo $inlisttracker .'<br>';
    $sql_inlist_tracker = mysqli_query($connection, $inlisttracker);

    if ($sql_inlist_tracker) {
        $count = mysqli_num_rows($sql_inlist_tracker);
        echo $count . '<br>';

        if ($count > 0) {
            $update_vari = $st_server;

        } else {
            $update_vari = '---';

        }

        
        while ($rowinlist_tracker = mysqli_fetch_array($sql_inlist_tracker)) {
            $main_name = $rowinlist_tracker['main_name'];
            $inlist_name = $rowinlist_tracker['inlist_name'];
            
            $update_inlistname = "UPDATE trackers_report SET qtracker = '$update_vari' WHERE (vehicle='$main_name' OR vehicle='$inlist_name');";
            $update_inlistname_result = mysqli_query($connection, $update_inlistname);
            echo $update_inlistname . '<br>';
            // if($vehicle == $main_name){
            // }elseif($vehicle == $inlist_name){
            //     $update_inlistname = "UPDATE trackers_report SET universal = '$update_vari' WHERE vehicle = '$inlist_name'";
            //     $update_inlistname_result = mysqli_query($connection, $update_inlistname);
            // }






        }

    } else {
        echo "Error: " . mysqli_error($connection);
    }




    $i++;
}


?>
<!DOCTYPE html>
<html>

<head>
    <meta>
    <title>Bulk Importer</title>
</head>

<body style="background: #fff;">
    <br>
    <?php echo date("d-m-Y H:i:s", time()); ?>
</body>

</html>