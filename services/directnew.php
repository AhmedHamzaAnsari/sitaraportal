<?php
ini_set('max_execution_time', -1);
include("../config_indemnifier.php");

function clean($string)
{
	$string = str_replace('', '-', $string); // Replaces all spaces with hyphens.

	return preg_replace('/[^A-Za-z0-9]/', '', $string); // Removes special chars.
}



//al shyma start

// $fileman1 = 'http://202.163.104.121/APIService/GetVehicleStatus.php?username=gas.oil&userpass=oil&choice=All';
// $data1 = file_get_contents($fileman1);
// $str = substr($data1, 11, -5);
// $array1 = json_decode($str, true);


// foreach ($array1 as $rowtpl) {

// $imei = clean($rowtpl["RegistrationNo"]);
// $name = $rowtpl["RegistrationNo"];
// $lat = $rowtpl["Latitude"];
// $lng = $rowtpl["Longitude"];
// $angle = $rowtpl["Direction"];
// $speed = $rowtpl["Speed"];
// $datetime = $rowtpl["GPSDateTime"];
// $licensepn = '112113114115';
// $odometer = '000';
// $ignetion = $rowtpl["IgnitionStatus"];
// $protocol = "al_shyma";
// $last_idle = '000';
// $last_move = '000';
// $last_stop = $rowtpl["Location"];

// $sqlshy = "INSERT INTO bulkdatanew (id,imei,st_server,lat,lng,angle,speed,name,sim_number,odometer,list,protocol,last_idle,last_move,last_stop,status)
// VALUES ('al_shyma','$imei','$datetime','$lat','$lng','$angle','$speed','$name','$licensepn','$odometer','$ignetion','$protocol','$last_idle','$last_move','$last_stop','0');";


// mysqli_query($db, $sqlshy);
// }

//any tracking one start

// $fileman_anyone = "http://web.teletix.pk:8888/home/UserVehicles?username=tp_tariq&password=dGFyaXE=";
// $data_anyone = file_get_contents($fileman_anyone);
// $array_anyone = json_decode($data_anyone, true);

// foreach ($array_anyone as $row_anyone) {

// $RecordDateTime_anyone = $row_anyone["DateTime"];
// $time_server_anyone = str_replace("T", " ", $RecordDateTime_anyone);

// $id_anyone = $row_anyone["SimNo"];

// $imei_anyone = "any" . clean($row_anyone["VehicleName"]);

// $vehicle_anyone = $row_anyone["VehicleName"];

// $LAT_anyone = $row_anyone["Latitude"];

// $LON_anyone = $row_anyone["Longitude"];

// $LandMark_anyone = $row_anyone["Location"];

// $Speed_anyone = $row_anyone["Speed"];
// $ign_sitara = $row_anyone["ACC"];
// $odo_sitara = $row_anyone["Mileage"];






// $sql_anyone = "INSERT INTO bulkdatanew (id,imei,st_server,lat,lng,angle,speed,name,sim_number,odometer,list,protocol,last_idle,last_move,last_stop,status)
// VALUES ('anytracker','$imei_anyone','$time_server_anyone','$LAT_anyone','$LON_anyone','360','$Speed_anyone','$vehicle_anyone','$id_anyone','$odo_sitara','$ign_sitara','anytracker','$time_server_anyone','$time_server_anyone','$LandMark_anyone','0');";
// mysqli_query($db, $sql_anyone);


// }

//any tracking one end


//any tracking two start

// $fileman_anytwo = "http://web.teletix.pk:8888/home/UserVehicles?username=tp_empiretransport&password=dHJhbnNwb3J0";
// $data_anytwo = file_get_contents($fileman_anytwo);
// $array_anytwo = json_decode($data_anytwo, true);

// foreach ($array_anytwo as $row_anytwo) {

// $RecordDateTime_anytwo = $row_anytwo["DateTime"];
// $time_server_anytwo = str_replace("T", " ", $RecordDateTime_anytwo);
// $id_anytwo = $row_anytwo["SimNo"];

// $imei_anytwo = "any" . clean($row_anytwo["VehicleName"]);

// $vehicle_anytwo = $row_anytwo["VehicleName"];

// $LAT_anytwo = $row_anytwo["Latitude"];

// $LON_anytwo = $row_anytwo["Longitude"];

// $LandMark_anytwo = $row_anytwo["Location"];

// $Speed_anytwo = $row_anytwo["Speed"];
// $ign_sitara = $row_anytwo["ACC"];
// $odo_sitara = $row_anytwo["Mileage"];






// $sql_anytwo = "INSERT INTO bulkdatanew (id,imei,st_server,lat,lng,angle,speed,name,sim_number,odometer,list,protocol,last_idle,last_move,last_stop,status)
// VALUES ('anytracker','$imei_anytwo','$time_server_anytwo','$LAT_anytwo','$LON_anytwo','360','$Speed_anytwo','$vehicle_anytwo','$id_anytwo','$odo_sitara','$ign_sitara','anytracker','$time_server_anytwo','$time_server_anytwo','$LandMark_anytwo','0');";
// mysqli_query($db, $sql_anytwo);


// }

//any tracking two end


//primer start

// $filemanpre = 'http://202.163.104.124/APIService/GetVehicleStatus.php?username=gas.oil&userpass=oil&choice=All';
// $datapre = file_get_contents($filemanpre);
// $strpre = substr($datapre, 11, -5);
// $arraypre = json_decode($strpre, true);

// if ($arraypre) {
// } else {
// echo "Not Working ";
// api_working_api($filemanpre,'Primer');
// }
// foreach ($arraypre as $rowpre) {

// $imeipre = "pre" . clean($rowpre["RegistrationNo"]);
// $namepre = $rowpre["RegistrationNo"];
// $latpre = $rowpre["Latitude"];
// $lngpre = $rowpre["Longitude"];
// $anglepre = $rowpre["Direction"];
// $speedpre = $rowpre["Speed"];
// $datetimepre = $rowpre["GPSDateTime"];
// $licensepnpre = '112113114115';
// $odometerpre = '000';
// $ignetionpre = $rowpre["IgnitionStatus"];
// $protocolpre = "PTSL";
// $last_idlepre = '000';
// $last_movepre = '000';
// $last_stoppre = $rowpre["Location"];

// $sqlpre = "INSERT INTO bulkdatanew (id,imei,st_server,lat,lng,angle,speed,name,sim_number,odometer,list,protocol,last_idle,last_move,last_stop,status)
// VALUES ('PTSL','$imeipre','$datetimepre','$latpre','$lngpre','$anglepre','$speedpre','$namepre','$licensepnpre','$odometerpre','$ignetionpre','$protocolpre','$last_idlepre','$last_movepre','$last_stoppre','0');";


// mysqli_query($db, $sqlpre);
// }
//primer end


//unitedsitara start

// $fileman_unitedsitara = "http://151.106.17.246:8080/sitara/services/united.php";
// $data_unitedsitara = file_get_contents($fileman_unitedsitara);
// $array_unitedsitara = json_decode($data_unitedsitara, true);


// foreach ($array_unitedsitara as $row_unitedsitara) {

	// $datetunited = $row_unitedsitara["GPSTime"];
	// $datebbunited = date_create($datetunited);
	// $time_server_unitedsitara = date_format($datebbunited, "Y-m-d H:i:s");
	// $id_unitedsitara = $row_unitedsitara["CarReg"];
	// $imei_unitedsitara = "un" . clean($row_unitedsitara["CarReg"]);
	// $vehicle_unitedsitara = $row_unitedsitara["CarReg"];
	// $LAT_unitedsitara = $row_unitedsitara["Lat"];
	// $LON_unitedsitara = $row_unitedsitara["Long"];
	// $LandMark_unitedsitara = $row_unitedsitara["Location"];
	// $Speed_unitedsitara = $row_unitedsitara["Speed"];
	// if ($Speed_unitedsitara > '0') {
		// $ign_sitara = 'On';
	// } else {
		// $ign_sitara = 'Off';
	// }






	// $sql_unitedsitara = "INSERT INTO bulkdatanew (id,imei,st_server,lat,lng,angle,speed,name,sim_number,odometer,list,protocol,last_idle,last_move,last_stop,status)
 // VALUES ('united_sitara','$imei_unitedsitara','$time_server_unitedsitara','$LAT_unitedsitara','$LON_unitedsitara','360','$Speed_unitedsitara','$vehicle_unitedsitara','$id_unitedsitara','3321','$ign_sitara','united_sitara','$time_server_unitedsitara','$time_server_unitedsitara','$LandMark_unitedsitara','0');";
	// mysqli_query($db, $sql_unitedsitara);


// }

//united_sitara end




//xtream strat

// $fileman_xtr = "http://151.106.17.246:8080/sitara/services/sitara_xtr.php";
// $data_xtr = file_get_contents($fileman_xtr);
// $array_xtr = json_decode($data_xtr, true);

// if ($array_xtr) {
// } else {
// echo "Not Working ";
// api_working_api('http://202.142.175.117/goservice/TrackpointWebService.asmx','Xtream');
// }

// foreach ($array_xtr['data'] as $row_xtr) {

// $datetxtr = $row_xtr["ReceiveDateTime"];
// $time_server_xtr = str_replace("T", " ", $datetxtr);
// $imeixtr = "xtr" . clean($row_xtr["VRN"]);
// $namextr = $row_xtr["VRN"];
// $latxtr = $row_xtr["LATITUDE"];
// $lngxtr = $row_xtr["LONGITUDE"];
// $anglextr = $row_xtr["ANGLE"];
// $speedxtr = $row_xtr["SPEED"];
// $int_speed = (int) $speedxtr;

// $licensepnxtr = '112113114115';
// $odometerxtr = $row_xtr['Mileage'];
// $ignetionxtr = $row_xtr["IgnitionStatus"];
// if ($ignetionxtr == 'true') {
// $ignxtr = 'On';
// } else {
// $ignxtr = 'Off';
// }
// $protocolxtr = "xtream";
// $last_idlextr = $time_server_xtr;
// $last_movextr = $time_server_xtr;
// $last_stopxtr = $row_xtr['ReferenceLocation'];

// $sqlxtr = "INSERT INTO bulkdatanew
// (id,imei,st_server,lat,lng,angle,speed,name,sim_number,odometer,list,protocol,last_idle,last_move,last_stop,status)
// VALUES
// ('xtream','$imeixtr','$time_server_xtr','$latxtr','$lngxtr','$anglextr','$int_speed','$namextr','$licensepnxtr','$odometerxtr','$ignxtr','$protocolxtr','$last_idlextr','$last_movextr','$last_stopxtr','0');";


// mysqli_query($db, $sqlxtr);


// }
//xtream end
//teltonika start

$fileman_teltonika =
	"http://3star.sjsolutionz.com/api/api.php?api=user&ver=1.0&key=2681E9BD666155E393C3573B0F5FB37B&cmd=OBJECT_GET_LOCATIONS_ALL,*";
$data_teltonika = file_get_contents($fileman_teltonika);
$array_teltonika = json_decode($data_teltonika, true);




foreach ($array_teltonika as $row_teltonika) {

	$time_server_tel = $row_teltonika["GpsDateTime"];

	$imeitel = "telto" . clean($row_teltonika["name"]);
	$nametel = $row_teltonika["name"];
	$lattel = $row_teltonika["lat"];
	$lngtel = $row_teltonika["lng"];
	$angletel = $row_teltonika["angle"];
	$speedtel = $row_teltonika["speed"];

	$licensepntel = '112113114115';
	$odometertel = '3333';
	$ignetiontel = $row_teltonika["speed"];
	if ($ignetiontel > '0') {
		$igntel = 'On';
	} else {
		$igntel = 'Off';
	}
	$protocoltel = "teltonika";
	$last_idletel = $time_server_tel;
	$last_movetel = $time_server_tel;
	$last_stoptel = $row_teltonika['Location'];

	$sqltelto = "INSERT INTO bulkdatanew
(id,imei,st_server,lat,lng,angle,speed,name,sim_number,odometer,list,protocol,last_idle,last_move,last_stop,status)
VALUES
('teltonika','$imeitel','$time_server_tel','$lattel','$lngtel','$angletel','$speedtel','$nametel','$licensepntel','$odometertel','$igntel','$protocoltel','$last_idletel','$last_movetel','$last_stoptel','0');";


	mysqli_query($db, $sqltelto);


}
//teltonika end
//iot start

$filemaniot = "http://151.106.17.246:8080/sitara/services/iot.php";
$dataiot = file_get_contents($filemaniot);
$arrayiot = json_decode($dataiot, true);
$i = 0;




foreach ($arrayiot["root"]["VehicleData"] as $rowiot) {

	$vehicle_iot = $rowiot["Vehicle_Name"];
	$LandMark_iot = $rowiot["Location"];
	$imei = "iot" . clean($rowiot["Vehicle_Name"]);
	$iot_db = $rowiot["GPSActualTime"];
	$old_date_iot = date($iot_db);
	$old_date_timestamp_iot = strtotime($old_date_iot);
	$time_server_iot = date('Y-m-d H:i:s', $old_date_timestamp_iot);
	$LAT_iot = $rowiot["Latitude"];
	$LON_iot = $rowiot["Longitude"];
	$Speed_iot = $rowiot["Speed"];
	if ($Speed_iot > '0') {
		$ign_iot = 'On';
	} else {
		$ign_iot = 'Off';
	}


	$sql_iot = "INSERT INTO bulkdatanew
(id,imei,st_server,lat,lng,angle,speed,name,sim_number,odometer,list,protocol,last_idle,last_move,last_stop,status)
VALUES
('iot','$imei','$time_server_iot','$LAT_iot','$LON_iot','360','$Speed_iot','$vehicle_iot','','3321','$ign_iot','iot','$time_server_iot','$time_server_iot','$LandMark_iot','0');";
	mysqli_query($db, $sql_iot);
}


//iot end
//teletix start

$filemanteletix = "https://web.teletix.pk:8888/home/UserVehicles?username=tp_etc&password=ZXRjMTM1";
$datateletix = file_get_contents($filemanteletix);
$arrayteletix = json_decode($datateletix, true);
$i = 0;
foreach ($arrayteletix as $rowteletix) {

	$vehicle_teletix = $rowteletix["VehicleName"];
	$LandMark_teletix = $rowteletix["Location"];
	$imei = "teletix" . clean($rowteletix["VehicleName"]);
	$time_server_xtr_tele = $rowteletix["DateTime"];
	$time_server_teletix = str_replace("T", " ", $time_server_xtr_tele);
	$LAT_teletix = $rowteletix["Latitude"];
	$LON_teletix = $rowteletix["Longitude"];
	$Speed_teletix = $rowteletix["Speed"];
	$ign_teletix = $rowteletix["ACC"];

	$sql_teletix = "INSERT INTO bulkdatanew
(id,imei,st_server,lat,lng,angle,speed,name,sim_number,odometer,list,protocol,last_idle,last_move,last_stop,status)
VALUES
('teletix','$imei','$time_server_teletix','$LAT_teletix','$LON_teletix','360','$Speed_teletix','$vehicle_teletix','','3321','$ign_teletix','teletix','$time_server_teletix','$time_server_teletix','$LandMark_teletix','0');";
	mysqli_query($db, $sql_teletix);
}


//teletix end



//qtracker start

$fileman_qtrack =
	'https://login.aitrack.pk/api/get_devices?user_api_hash=$2y$10$MWdI3fsiX4YhnhYDdomLzetApTdSmqRmBwvq/cY43WaQIv9o7HIP6';
$data_qtrack = file_get_contents($fileman_qtrack);
$array_qtrack = json_decode($data_qtrack, true);
foreach ($array_qtrack['0']['items'] as $qtrack) {

	$nameqtrack = $qtrack["name"];
	$timepm = $qtrack["time"];
	$timevpm = date_create($timepm);
	echo $timeqtrack = date_format($timevpm, "Y-m-d H:i:s");
	echo "<br>";
	$idqtrack = $qtrack["name"];
	$imeiqtrack = "qtrack" . clean($qtrack["name"]);
	$vehicleqtrack = $qtrack["name"];
	$LATqtrack = $qtrack["lat"];
	$LONqtrack = $qtrack["lng"];
	$LandMarkqtrack = $qtrack["addr"];
	$Speedqtrack = $qtrack["speed"];
	if ($Speedqtrack > '0') {
		$ignqtrack = 'On';
	} else {
		$ignqtrack = 'Off';
	}






	$sql_qtrack = "INSERT INTO bulkdatanew
(id,imei,st_server,lat,lng,angle,speed,name,sim_number,odometer,list,protocol,last_idle,last_move,last_stop,status)
VALUES
('q_tracker','$imeiqtrack','$timeqtrack','$LATqtrack','$LONqtrack','360','$Speedqtrack','$vehicleqtrack','$idqtrack','3321','$ignqtrack','q_tracker','$timeqtrack','$timeqtrack','$LandMarkqtrack','0');";
	mysqli_query($db, $sql_qtrack);


}

//qtracker end




?>



<div class="progress">
	<div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"
		style="width:<?php echo $i; ?>%">
		<span class="sr-only">
			<?php ?>
		</span>
	</div>
</div>
</div>
<?php

if ($sqltelto == true) {
	echo "<br> New record created successfully yeahoo Teltonika ";

} else {
	echo "Error: " . $sqltelto . "<br>" . mysqli_error($db);

}
if ($sql_iot == true) {
	echo "<br> New record created successfully yeahoo IOT ";

} else {
	echo "Error: " . $sql_iot . "<br>" . mysqli_error($db);

}
if ($sql_teletix == true) {
	echo "<br> New record created successfully yeahoo TELETIX ";

} else {
	echo "Error: " . $sql_teletix . "<br>" . mysqli_error($db);

}
if ($sql_qtrack == true) {
	echo "<br> New record created successfully yeahoo qtracker ";

} else {
	echo "Error: " . $sql_qtrack . "<br>" . mysqli_error($db);

}





$sql1 = mysqli_query($db, "SELECT COUNT(*) as num FROM bulkdatanew");

$result = mysqli_fetch_assoc($sql1);
echo '<br>' . $result['num'];
$t_row = $result['num'];
mysqli_close($db);

function api_working_api($api, $api_name)
{
	echo $api_name . 'api not working';
	// $curl = curl_init();

	// curl_setopt_array($curl, [
	// 	CURLOPT_PORT => "8080",
	// 	CURLOPT_URL => "http://151.106.17.246:8080/sitara_schedule_email/api_status.php?api=" . $api . "&name=".$api_name."",
	// 	CURLOPT_RETURNTRANSFER => true,
	// 	CURLOPT_ENCODING => "",
	// 	CURLOPT_MAXREDIRS => 10,
	// 	CURLOPT_TIMEOUT => 30,
	// 	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	// 	CURLOPT_CUSTOMREQUEST => "GET",
	// 	CURLOPT_HTTPHEADER => [
	// 		"Accept: */*",
	// 		"User-Agent: Thunder Client (https://www.thunderclient.com)"
	// 	],
	// ]);

	// $response = curl_exec($curl);
	// $err = curl_error($curl);

	// curl_close($curl);

	// if ($err) {
	// 	echo "cURL Error #:" . $err;
	// } else {
	// 	echo $response;
	// }
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="refresh" content="200">
	<title>Sitara Data</title>
	<style>
		.progress {
			height: 3px !important;
			margin-bottom: 1px !important;
		}
	</style>
</head>

<body style="background: #fff;">
	<div class="col-md-8">

		<div class="col-md-12">
			<br>
			<?php echo "Successfully done" . "<br>";
			echo date("d-m-Y H:i:s", time()); ?>
		</div>
</body>

</html>