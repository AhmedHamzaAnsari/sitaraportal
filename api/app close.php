<?php
	include_once('../includes/connect_database.php'); 
	include_once('../includes/variables.php');
	if(isset($_GET['accesskey'])) {
		$access_key_received = $_GET['accesskey'];
		$user_id=$_GET['user_id'];
		$pre=$_GET['pre'];
		
		if($access_key_received == $access_key){
			// get all category data from category table
			
			if($pre=='app'){
				$sql_query = "SELECT UPPER(name) as name, activedate as vstatus1,trackername as vehicle_make,time,lat as latitude, lng as longitude, IF(ignition ='On', '1', '0') as power,speed, location as vlocation FROM devicesnew";
			
				$result = $db->query($sql_query) or die ("Error :".mysqli_error());
		 
				$users = array();
				while($user = $result->fetch_assoc()) {
					$users[] = $user;
				}
				
				// create json output
				$output = json_encode($users);
			}
			else{
				$sql_query = "SELECT UPPER(name) as name, activedate as vstatus1,trackername as vehicle_make,time,lat as latitude, lng as longitude, IF(ignition ='On', '1', '0') as power,speed, location as vlocation FROM devicesnew as dv join users_devices_new as ud on ud.devices_id=dv.id where ud.users_id='$user_id'";
			
				$result = $db->query($sql_query) or die ("Error :".mysqli_error());
		 
				$users = array();
				while($user = $result->fetch_assoc()) {
					$users[] = $user;
				}
				
				// create json output
				$output = json_encode($users);
			}
			
			
		}else{
			die('accesskey is incorrect.');
		}
	} else {
		die('accesskey is required.');
	}
 
	//Output the output.
	echo $output;

	include_once('../includes/close_database.php'); 
?>