<?php
	ini_set('max_execution_time', -1);
	include("../config_indemnifier.php");


	$q_update = "UPDATE bulkdata set status = '1'";
	mysqli_query( $db,$q_update);
	echo "done update set 1";

$q_select = "SELECT * FROM bulkdata WHERE status = '1'  order by imei asc, st_server desc";
$sql_select = mysqli_query( $db,$q_select);
mysqli_error($db);
$todate = date("Y-m-d H:i:s", time());
$i='0';
//foreach( mysqli_fetch_array($sql_select) as $row){
	while($row = mysqli_fetch_array($sql_select)){
	$id = $row['imei'];
	$imei = $row['imei'];
	$mainid = $row["protocol"];
	$dt_time = $row["st_server"];
	$timein = $row["st_server"];
	$lat = $row["lat"];
	$lng = $row["lng"];
	$angle = $row["angle"];
	$speed = $row["speed"];
	$name = $row["name"];
	$vehicle = $row["name"];
	$licensepn = $row["sim_number"];
	$odometer = $row["odometer"];
	$list = $row["list"];
	$protocol = $row["protocol"];
	$last_idle = $row["last_idle"];
	$last_move = $row["last_move"];
	$last_stop = $row["last_stop"];
	if($mainid == 'tw_sitara'){
		$userid = 198;
	}elseif($mainid == 'al_shyma'){
		$userid = 230;
	}elseif($mainid == 'Universal'){
		$userid = 231;
	}
	elseif($mainid == 'topflay'){
		$userid = 232;
	}
	elseif($mainid == 'anytracker'){
		$userid = 233;
	}
	elseif($mainid == 'PTSL'){
		$userid = 262;
	}
	elseif($mainid == 'united_sitara'){
		$userid = 314;
	}
	elseif($mainid == 'resq911'){
		$userid = 345;
	}
	elseif($mainid == 'TPL'){
		$userid = 370;
	}
	else{
		$userid = 30;
	}
	$d_select = "SELECT * FROM devices WHERE deviceid1 ='$imei'";
		$sql_devices = mysqli_query( $db,$d_select);
		mysqli_error($db);
		if(mysqli_num_rows($sql_devices) > 0){

$Select1 = "SELECT devicescol FROM devices WHERE deviceid1 = '$id'";
$exe_Select1 = mysqli_query( $db,$Select1);
mysqli_error($db);
$data_Select1= mysqli_fetch_assoc($exe_Select1);

if(!isset($data_Select1['devicescol'])){
	$devicescol = '2010-01-01 10:10:10';
}
else{
	$devicescol = $data_Select1['devicescol']; //--------------err
}
$Select3 = "SELECT id FROM positions order by id asc limit 1";
$exe_Select3 = mysqli_query( $db,$Select3) or die(mysqli_error($db));
$data_Select3= mysqli_fetch_assoc($exe_Select3);
$bbunique = $data_Select3['id'];
$uniqueb2 = intval($bbunique)+'1';

	if($protocol == 'ResQ'){
		if(strpos ($list,'"acc":"1"')!== false){
		$power = 1;
		
		}
		else{
			$power = 0;
			
		}
	}
	elseif($protocol == 'tw_sitara' || $protocol == 'al_shyma' || $protocol == 'Universal' || $protocol == 'topflay' || $protocol == 'anytracker' || $protocol == 'TPL' || $protocol == 'PTSL' || $protocol == 'united_sitara' || $protocol == 'resq911'){
		if(($list == 'On' || $list == 'ON')!== false){
		$power = 1;
		
		}
		else{
			$power = 0;
			
		}
	}
	else{
		if(strpos ($list,'"io1":"1"')!== false){
		$power = 1;
		
		}
		else{
			$power = 0;
		}
	}
$unique =  (date("Ymdhis")) *(rand(10,100)) ;
if ($dt_time > $devicescol ){ 
$newformat = date('Y-m-d H:i:s');
if($protocol != 'tw_sitara' && $protocol != 'al_shyma' && $protocol != 'Universal' && $protocol != 'topflay' && $protocol != 'anytracker' && $protocol != 'PTSL'  && $protocol != 'TPL' && $protocol != 'united_sitara' && $protocol != 'resq911'){
$new_time = date("Y-m-d H:i:s", strtotime('+5 hours',strtotime($dt_time)));
$location = $last_stop;
}
else{
	$location = $last_stop;
	$new_time = date("Y-m-d H:i:s", strtotime($dt_time));
	$sqllocation = mysqli_query($db,"INSERT INTO locations (id, name,lat,lng) VALUES ('', '$location','$lat','$lng');");
	echo mysqli_error($db);
}
$Select2 = "SELECT uniqueId,name FROM devices WHERE deviceid1 = '$id'";
$exe_Select2 = mysqli_query( $db,$Select2);
mysqli_error($db);
$data_Select2= mysqli_fetch_assoc($exe_Select2);
if(!isset($data_Select2['uniqueId'])){
	$pdivice_id = null;
	$device_id_name = null;
	echo $id." <br>";
}else{
$device_id_db = $data_Select2['uniqueId']; //--------------err
$pdivice_id = $device_id_db;
$device_id_name = $data_Select2['name']; //--------------err
echo $device_id_name." <br>";
}


	
//echo $id." IMEI number<br>";
//echo $devicescol." device number<br>";

if($exe_Select2 == true && $pdivice_id != null){
	$insert_positions = "INSERT into positions(address,altitude,course,latitude,longitude,other,power,speed,time,valid,device_id,AlarmStatus,imileage,ikey,ireason,ireasoncode,syscode,vehicle_id,dtype,chk1,vlocation,overspeed,record_creation_time, recorddate)
	VALUES ('','$vehicle','$angle','$lat','$lng','','$power','$speed','$new_time','1','$pdivice_id','0','$odometer','$power','$power','','','$device_id_name','','','$location','','$newformat','');";
	$basit= mysqli_query($db,$insert_positions);
	$Select4 = "SELECT id FROM positions where device_id='$pdivice_id' order by time desc limit 1";
	$exe_Select4 = mysqli_query( $db,$Select4);
	$data_Select4= mysqli_fetch_assoc($exe_Select4);
	$pt_id = $data_Select4['id'];
if($insert_positions == true ){
	$update_devices = "UPDATE devices SET devicescol = '$dt_time', latestPosition_id = '$pt_id' WHERE deviceid1 = '$id'";
	$basit1 = mysqli_query($db,$update_devices);
	if($update_devices == true){
		echo $id."<br>";
	}
	mysqli_error($db);
	
	}
	}
	}
	}else{
		//new vehicle insertion
	$pos_latest = mysqli_query($db,"SELECT id FROM positions order by id desc limit 1;") or die(mysqli_error($db));
	
	if(mysqli_num_rows($pos_latest) > 0){
		$rowpos = mysqli_fetch_assoc($pos_latest);
	$latest1 = $rowpos['id'];
	$latest = $latest1 + 1; }else{
		$latest = '1';
	}
	$dev_latest = mysqli_query($db,"SELECT uniqueId FROM devices order by uniqueId desc limit 1;") or die(mysqli_error($db));
	if(mysqli_num_rows($dev_latest) > 0){
	$rowdev = mysqli_fetch_assoc($dev_latest);
	$dev_last1 = $rowdev['uniqueId'];
	$dev_last = $dev_last1 + 1;
	}else{
	$dev_last = '1';	
	}
	//position data
	if($speed > 0){
		$power = 1;
	}else{
		$power = 0;
	}
	$sql_insert = mysqli_query($db,"INSERT INTO  positions (id,altitude, course, latitude, longitude, power, speed, time, device_id, vlocation) 
	VALUES ('$latest','$vehicle','$angle','$lat','$lng','$power','$speed','$timein','$dev_last','$last_stop')") or die(mysqli_error($db));
	$inserted_pos = mysqli_query($db,$sql_insert);
	//device date
	$sql_insert_dev = mysqli_query($db,"INSERT INTO  devices (vstatus1,licensepn, latestPosition_id, name, uniqueId, simno, overspeed, devicescol, deviceid1,device_type, devicetype1,vehicle_make)  
	VALUES ('$todate','$vehicle','$latest','$vehicle','$dev_last','3137152168','$speed','$todate','$imei', '3', '','$mainid')") or die(mysqli_error($db));
	$inserted_dev = mysqli_query($db,$sql_insert_dev);
	//inser user 1
	$sql_user_one = mysqli_query($db,"INSERT INTO  users_devices (users_id, devices_id, subacc_id, show_authority)   
	VALUES ('1' , '$dev_last' , '0' , '0')") or die(mysqli_error($db));
	$inserted_one = mysqli_query($db,$sql_user_one);
	//inser user 2
	$sql_user_two = mysqli_query($db,"INSERT INTO  users_devices (users_id, devices_id, subacc_id, show_authority)   
	VALUES ('2' , '$dev_last' , '1' ,'0')") or die(mysqli_error($db));
	$inserted_two = mysqli_query($db,$sql_user_two);
	//inser user 3
	$sql_user_three = mysqli_query($db,"INSERT INTO  users_devices (users_id, devices_id, subacc_id, show_authority)   
	VALUES ('$userid' , '$dev_last' , '2' ,'1')") or die(mysqli_error($db));
	$inserted_three = mysqli_query($db,$sql_user_three);
 echo $vehicle." Insert</br>";
	}
 $i++."<br>";
}
echo "done Insertion";
// Delete Query will be execute when $sql_select = true
if($sql_select == true){
$q_delete = "DELETE FROM bulkdata WHERE status = '1'";
$sql_delete = mysqli_query( $db,$q_delete);
}
echo "done delete";


$sql1= mysqli_query  ( $db,"SELECT COUNT(*) as num FROM bulkdata" );
 
 $result = mysqli_fetch_assoc ( $sql1 );
  echo $result['num'];
  $t_row = $result['num'];
  

if($sql_delete == true){
	echo "<meta http-equiv='refresh' content='30'>";
}
mysqli_close($db);

?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta http-equiv="refresh" content="30">
 	<title>Bulk Importer</title>
 </head>
 <body style="background: #fff;">
 	<br>
 	<?php echo date("d-m-Y H:i:s", time()); ?>
 </body>
 </html>