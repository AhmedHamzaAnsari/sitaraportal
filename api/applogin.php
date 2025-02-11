<?php
	include_once('../includes/connect_database.php'); 
	include_once('../includes/variables.php');
	if(isset($_GET['accesskey'])) {
		$access_key_received = $_GET['accesskey'];
		$email = $_GET['email'];
		$pass = $_GET['pass'];
		
		if($access_key_received == $access_key){
			// get all category data from category table
			$sql_query = "SELECT * FROM users where login='$email' and description='$pass' and (privilege='app' or privilege='Cartraige');";
			
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