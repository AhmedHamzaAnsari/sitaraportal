<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
	include_once('../includes/connect_database.php'); 
	include_once('../includes/variables.php');
	if(isset($_GET['accesskey'])) {
		$access_key_received = $_GET['accesskey'];
		$page = $_GET['page'];
		$offset = $_GET['offset'];
		
		if($access_key_received == $access_key){
			// get all category data from category table
			$sql_query = "SELECT * FROM vehicle_location limit $page offset $offset ;";
			
			$result = $db->query($sql_query) or die ("Error :".mysqli_error());
	 
			$users = array();
			while($user = $result->fetch_assoc()) {
				$users[] = $user;
			}
			
			// create json output
			$output = json_encode($users);
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