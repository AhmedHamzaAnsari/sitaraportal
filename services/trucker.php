//truckker start

$fileman_truckker = "http://202.142.148.66:9869/api/live/status?a=1&t=300031002C00310036002C0031003600310033002C004E004100";
$data_truckker = file_get_contents($fileman_truckker);
$array_truckker = json_decode($data_truckker,true);
foreach($array_truckker as $row_truckker){
	
	$RecordDateTime_truckker = $row_truckker["GpsDateTime"];
	$time_server_truckker = str_replace("T"," ",$RecordDateTime_truckker);
	 $id_truckker = $row_truckker["DeviceNo"];
	 $imei_truckker = "truckker".clean($row_truckker["VRN"]);
	 $vehicle_truckker = $row_truckker["VRN"];
	 $reason_truckker = $row_truckker["Status"];
	 $coordinates = $row_truckker["Point"];
	 list($latitude, $longitude) = explode(',', $coordinates);
	 $LAT_truckker = $latitude;
	 $LON_truckker = $longitude;
	 $LandMark_truckker = $row_truckker["Location"];
	 $Speed_truckker = $row_truckker["Speed"];
	if ($Speed_truckker > '0'){
		 $ign_truckker = 'On';
	}
	else{
		 $ign_truckker = 'Off';
	}
	
 $sql_truckker = "INSERT INTO bulkdatanew (id,imei,st_server,lat,lng,angle,speed,name,sim_number,odometer,list,protocol,last_idle,last_move,last_stop,status)
 VALUES ('trukker','$imei_truckker','$time_server_truckker','$LAT_truckker','$LON_truckker','360','$Speed_truckker','$vehicle_truckker','$id_truckker','3321','$ign_truckker','trukker','$time_server_truckker','$time_server_truckker','$LandMark_truckker','0');";
 mysqli_query( $connection,$sql_truckker);


}

//truckker end