
<?php
// error_reporting(0);
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', 'Ptoptrack@(!!@');
   define('DB_DATABASE', 'sitara');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);


//index.php
ini_set('memory_limit', '-1');
set_time_limit(500);

include('class/class.phpmailer.php');
include('pdf.php');
$today = date("Y-m-d");
$_to_today = date("Y-m-d H:i:s");
$dur_time = $today . ' 00:00:00 ' .' - '. $_to_today ;
$email=$_GET['email'];
$report=$_GET['report'];
$user_id;
$privilege=$_GET['privilege'];

if($privilege=='Cartraige'){
	$user_id=$_GET['user_id'];

}
else{
	$user_id='1';

}



$curr_date = date('Y-m-d');
$next_date = new dateTime($curr_date);
$next_date -> modify('-1 day');
$tommorrow = $next_date->format('Y-m-d');

$vehi_name = 'Vehicle ';

//=====================================================================================================================
$start_time;
$vehicle_name;
$pre_time=0;
$final_time=0;

$start_speed;
$next_speed =0;
$pre_speed =0;
$total_event;
$min_=0;
$max_=0;
$location;
$time_;
$lati;
$lngi;

$vehi;
// $if_vehi = implode($vehi,',');
$output = '
<div class="table-responsive">
<style>
	table, th, td {
	border: 1px solid black;
	border-collapse: collapse;
	}
	th, td {
		padding:10px;
	}
</style>
	<table border = "1">
		<tr>
			<th>Lorry Name</th>
			<th>Overpeed Duration</th>
			<th>Min Speed</th>
			<th>Top Speed</th>
			<th>Time</th>
			<th>Location</th>
			<th>Latitude</th>
			<th>Longitude</th>
			
		</tr>
';
$if_vehi='all';
if($if_vehi==='all'){
	$curr_date = date('Y-m-d');
$next_date = new dateTime($curr_date);
$next_date -> modify('-1 day');
$tommorrow = $next_date->format('Y-m-d');

	// $sql__devi="SELECT pos.device_id as uniqueId,pos.vehicle_id as name FROM positions as pos where speed>'55' and pos.time>'$curr_date 00:00:00' and pos.time<'$curr_date 15:00:00'  and power='1' group by pos.vehicle_id;";
	$sql__devi="SELECT pos.device_id as uniqueId,pos.vehicle_id as name,us.users_id FROM users_devices as us inner join positions as pos on us.devices_id=pos.device_id where users_id=$user_id and speed>'55' and pos.time>'$curr_date 00:00:00' and pos.time<'$curr_date 15:00:00'  and power='1'  group by pos.vehicle_id;";

	$result__devi = mysqli_query($db,$sql__devi);

	$vehi__id = array();

	while( $row = mysqli_fetch_array($result__devi) ){
		$asset_id = $row['uniqueId'];
		$vehi__id[] = $asset_id;
		

	}
	$vehi = $vehi__id;
}
else{
	$vehi = $_POST['check'];

}


foreach ($vehi as $value) {
	// echo "$value <br>";
	$curr_date = date('Y-m-d');
$next_date = new dateTime($curr_date);
$next_date -> modify('-1 day');
$tommorrow = $next_date->format('Y-m-d');
	$sql__="SELECT pos.vehicle_id,pos.time,pos.speed,pos.vlocation,pos.latitude,pos.longitude FROM positions as pos where pos.device_id='$value' and  pos.time>'$curr_date 00:00:00' and pos.time<'$curr_date 15:00:00' and pos.power='1' order by pos.time asc;";
	$result__ = mysqli_query($db,$sql__);



	while( $row = mysqli_fetch_array($result__) ){
		// $userid = $row['id'];
		$date = date('H:i');
		$vehicle_id = $row['vehicle_id'];
		$time = $row['time'] ;
		$speed = $row['speed'];
		$location = $row['vlocation'] ;
		$latitude = $row['latitude'] ;
		$longitude = $row['longitude'] ;
		$time_ = $time;
		$lati=$latitude;
		$lngi=$longitude;

		
			
		
			$start_speed = $speed;
			$start_time = $time;

			if($pre_speed>55 && $start_speed>55){
			
				$d1 = strtotime($start_time);
				$d2 = strtotime($pre_time);

				$totalSecondsDiff = abs($d1-$d2); //42600225
				$totalMinutesDiff = $totalSecondsDiff/60; 
				
				$final_time=$totalMinutesDiff;
			}
			else if($pre_speed>55 && $start_speed<55){
				// echo 'Plus 1';
				$final_time= $final_time+1;

			}
			

			$pre_speed = $start_speed;
			$pre_time= $start_time;

			
			


		
	}

	$sql__2="SELECT MAX(pos.speed) as maxx,MIN(pos.speed) as minn FROM positions as pos where pos.speed>'55' and pos.device_id='$value' and  pos.time>'$curr_date 00:00:00' and pos.time<'$curr_date 15:00:00' and pos.power='1' order by pos.time asc;";
	$result__2 = mysqli_query($db,$sql__2);



	while( $row = mysqli_fetch_array($result__2) ){
		$maxx = $row['maxx'];
		$minn = $row['minn'] ;



		$min_ = $minn;
		$max_ = $maxx;

			
			


		
	}

	


	
	  $output .= '
			<tr>
				<td class="text-center">'.$vehicle_id.'</td>
				<td >'.round($final_time).' Minutes</td>
				<td >'.$min_.' km/hr</td>
				<td >'.$max_.' km/hr</td>
				<td >'.$time_.'</td>
				<td >'.$location.'</td>
				<td >'.$lati.'</td>
				<td >'.$lngi.'</td>
		   
			</tr>
		';
	
	

}

$output .= '
	</table>
</div>
';
// echo $output;


$list = '
<br/>
<h3>Summary Past remarks</h3>
<div class="table-responsive">
<style>
table, th, td {
border: 1px solid black;
border-collapse: collapse;
}
th, td {
	padding:10px;
}
</style>
	<table border = "1">
		<tr>
			<th>Lorry Name</th>
			<th>Number Of Vehicle Brokes limit Speed </th>
			
		</tr>
';
foreach ($vehi as $value) {
	$curr_date = date('Y-m-d');
$next_date = new dateTime($curr_date);
$next_date -> modify('-1 day');
$tommorrow = $next_date->format('Y-m-d');
	$sql__count="SELECT count(pos.vehicle_id) as total_event,pos.vehicle_id,pos.time,pos.device_id,pos.speed,pos.vlocation,MAX(pos.speed) as maxx,MIN(pos.speed) as minn FROM positions as pos where pos.speed>'55' and pos.device_id='$value' and  pos.time>'$curr_date 00:00:00' and pos.time<'$curr_date 15:00:00' and pos.power='1' order by pos.time asc;";
	$result__count = mysqli_query($db,$sql__count);



	while( $row = mysqli_fetch_array($result__count) ){
		
		$total_event_ = $row['total_event'];
		$vlocation = $row['vlocation'] ;
		$maxx = $row['maxx'];
		$minn = $row['minn'] ;
		$vehicle_id = $row['vehicle_id'] ;



		$total_event = $total_event_;
		$min_ = $minn;
		$max_ = $maxx;
		$location=$vlocation;
		$vehicle_name = $vehicle_id;
			
		
			
			
			


		
	}

   

	
	  $list .= '
			<tr>
				<td class="text-center">'.$vehicle_name.' </td>
				<td >'.$total_event_.' Times</td>
		   
			</tr>
		';
	
	

}

$list .= '
	</table>
</div>
';
// echo $list;





//======================================================================================================================

$message = '';

$connect = new PDO("mysql:host=localhost;dbname=sitara", "root", "Ptoptrack@(!!@");

function fetch_customer_data($connect)
{
	$today = date("Y-m-d");
	$curr_date = date('Y-m-d');
$next_date = new dateTime($curr_date);
$next_date -> modify('-1 day');
$tommorrow = $next_date->format('Y-m-d');

	$query = "SELECT pos.device_id,pos.vehicle_id,pos.speed,pos.vlocation,pos.time,pos.latitude,pos.longitude FROM positions as pos where speed>'55' and pos.time>'$curr_date 00:00:00' and pos.time<'$curr_date 15:00:00'  and power='1'";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$output = '
	<div class="table-responsive">
	<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
    padding:10px;
}
</style>
		<table >
			<tr>
				<th>Lorry Name</th>
				<th>Speed</th>
				<th>Time</th>
				<th>Location</th>
				<th>Latitude</th>
				<th>Longitude</th>
			</tr>
	';
	foreach($result as $row)
	{
		$output .= '
			<tr>
				<td class="text-center">'.$row["vehicle_id"].'</td>
				<td >'.$row["speed"].'</td>
				<td>'.$row["time"].'</td>
				<td>'.$row["vlocation"].'</td>
				<td>'.$row["latitude"].'</td>
				<td>'.$row["longitude"].'</td>

			</tr>
		';
	}
	$output .= '
		</table>
	</div>
	';
	return $output;
}

// $sql__="SELECT * FROM `email_scedule`";
// $result__ = mysqli_query($db,$sql__);

// while( $row = mysqli_fetch_array($result__) ){
// 	// $userid = $row['id'];
// 	$report = $row['report'];
// 	$time = $row['time'];
// 	$email = $row['email'];
// 	echo "Hamza ".$time;
echo smtp_mailer($email,$dur_time,$output,$list,$vehi_name);

	$sql_update = "UPDATE `email_scedule` SET `status`='1' WHERE email='$email' and report='$report'";
        echo $sql_update;
        if(mysqli_query($db, $sql_update)){
            echo "Status were updated successfully.";
            // header("location: manageGroup.php");
        } else {
            echo $sql_update;
            echo "ERROR: Could not able to execute $sql_update. " . mysqli_error($db);
        }
	

// }
$myObj = new stdClass();
$myObj->status = 200;
$myObj->response = "success";


$myJSON = json_encode($myObj);

echo $myJSON;

function smtp_mailer($to,$time,$output,$list,$vehi_name){
	$connect = new PDO("mysql:host=localhost;dbname=sitara", "root", "Ptoptrack@(!!@");

	$file_name = md5(rand()) . '.pdf';
	$html_code = '<div class="container">
    <div class="row">
        <div class="col-md-12">
        <h2 style="font-weight: bold;    color: #3e3ea7;font-size: 72px;font-style: italic;font-weight: bold;text-decoration: underline">SITARA</h2>
        
        </div>
            <h6>Report Name : Overspeeding</h6>
            <br/>
            <h6>Time : '.$time.'</h6>
        

        

    </div>
</div>';
	$html_code .= fetch_customer_data($connect);
	$pdf = new Pdf();
	$pdf->load_html($html_code);
	$pdf->render();
	$file = $pdf->output();
	file_put_contents($file_name, $file);
	
	// require 'class/class.phpmailer.php';
	$mail = new PHPMailer(); 
	$mail->SMTPDebug  = 3;
	$mail->IsSMTP(); 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'tls'; 
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 587; 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	$mail->Username = "sitaras222@gmail.com";
	$mail->Password = "kjyqvamkejoqtbki";
	$mail->SetFrom("sitaras222@gmail.com");
	$mail->AddAddress($to);
	$mail->WordWrap = 50;							//Sets word wrapping on the body of the message to a given number of characters
	$mail->IsHTML(true);							//Sets message type to HTML				
	$mail->AddAttachment($file_name);     				//Adds an attachment from a path on the filesystem
	$mail->Subject = 'Overspeed Report '.$time;			//Sets the Subject of the message
	$mail->Body = '<h1><h1><h3>Please Find details report of Overspeed in attach PDF File.</h3><br/>'.$list  .'<br/>'.$output;				//An HTML or plain text message body
	if($mail->Send())								//Send an Email. Return true on success or false on error
	{
		echo $message = '<label class="text-success">Customer Details has been send successfully...</label>';
	}
	else{
		echo 'Mail Not send';
	}
	unlink($file_name);
}

?>






