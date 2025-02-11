<?php
include("sessioninput.php");


?>

<?php
    include("config_indemnifier.php");

header('Access-Control-Allow-Origin: *');
$url = "http://live.resq911.com.pk/ap12test/api/falcon.php?id=1333&accesskey=12345";
$response = file_get_contents($url);
	// echo "IMEI: ".$response['data'][0]['imei'];

// echo $response;
$arr = json_decode($response,true);
// print_r($arr);
// echo "IMEI: ".$arr['data'][0][0]['imei'];

$count=0;
$sql1 = "DELETE FROM bulkdata ";

        if (mysqli_query($db, $sql1)) {
        // echo "Record deleted successfully";
        } else {
            echo "Error: " . $sql1 . "<br>" . mysqli_error($db);
        }

for($i = 0; $i < count($arr['data']); $i++) {
    $name = $arr['data'][$i][0]['name'];
        $imei = $arr['data'][$i][0]['imei'];
        $dt_server = $arr['data'][$i][0]['dt_server'];
        $lat = $arr['data'][$i][0]['lat'];
        $lng = $arr['data'][$i][0]['lng'];
        $speed = $arr['data'][$i][0]['speed'];
        $sim_number = $arr['data'][$i][0]['sim_number'];
        $odometer = $arr['data'][$i][0]['odometer'];
        $speed = $arr['data'][$i][0]['speed'];
        $last = $arr['data'][$i][0]['dt_last_move'];
        echo "Name: ".$name;
        echo "<br />";
        echo "IMEI: ".$imei;
        echo "<br />";
        echo "dt_server: " .$dt_server;
        echo "<br />";
        echo "lat: ".$lat;
        echo "<br /> ";
        echo "long: ".$lng;
        echo "<br /> ";
        echo "speed: ".$speed;
        echo "<br /> ";
        echo "last update: ".$last;
        echo "<br /> ";
        echo "<br /> ";
        echo "<br /> ";

        
        // $sql = "INSERT INTO  bulkdata (`st_server`, `imei`, `lat`, `lng`, `angle`, `speed`, `name`, `sim_number`, `odometer`, `params`, `protocol`, `dt_last_idle`, `dt_last_move`, `dt_last_stop`)
        // VALUES ('$dt_server','$imei', '$lat', '$lng','',' $speed','$name','$sim_number','$odometer','','','$last','','')";
        $sql = "INSERT INTO `bulkdata`(`imei`, `st_server`, `lat`, `lng`, `angle`, `speed`, `name`, `sim_number`, `odometer`, `list`, `protocol`, `last_idle`, `last_move`, `last_stop`) 
        VALUES ('$imei','','$lat','$lng','','$speed','$name','$sim_number','$odometer','','','','$last','')";

        if (mysqli_query($db, $sql)) {
            // echo '<script>alert("New record created successfully")</script>';
        } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($db);
        }
        

    $count++;
}
//echo $count;

// for ($x = 0; $x < $count; $x++) {
//     foreach ($arr as $user) {
        
        
//         $sql = "INSERT INTO  addasset (`dt_server`, `imei`, `lat`, `lng`, `angle`, `speed`, `name`, `sim_number`, `odometer`, `params`, `protocol`, `dt_last_idle`, `dt_last_move`, `dt_last_stop`)
//         VALUES ('$deviceid','$name', '$imei', '$group',' $phone','$model','$mileage','','$category','$make','$color','$fuel','$engine','$yearOfManufacture','$taxedDue','$mot')";

//         if (mysqli_query($db, $sql)) {
//             echo '<script>alert("New record created successfully")</script>';
//         } else {
//         echo "Error: " . $sql . "<br>" . mysqli_error($db);
//         }
//         mysqli_close($db);
//         $i++;
//     }
// }



?>
<script>
    setTimeout(function(){
    location.reload();
}, 1000*20);
</script>