
<?php
// error_reporting(0);
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', 'Ptoptrack@(!!@');
   define('DB_DATABASE', 'sitara');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

   ini_set('memory_limit', '-1');
set_time_limit(500);

   $today = date("Y-m-d");
//index.php
include('class/class.phpmailer.php');
include('pdf.php');


$message = '';

$connect = new PDO("mysql:host=localhost;dbname=sitara", "root", "Ptoptrack@(!!@");

function fetch_customer_data($connect)
{
   $today = date("Y-m-d");

	$query = "SELECT * FROM positions where speed>'50' and time>='$today' and power='1'  group by vehicle_id;";

    echo $query;
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$output = '
	<div class="table-responsive">
    <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                <a href="index.php">
                                <!-- <img src="images/crm logo 1.png" alt="" srcset=""  style="display: block;margin-left: auto;margin-right: auto;width: 60%;"> -->
                                <h2 style="font-weight: bold;    color: #3e3ea7;font-size: 72px;font-style: italic;font-weight: bold;text-decoration: underline">Go Get Going With Go </h2>
                                </a>
                                </div>
                            </div>
                        </div>
		<table class="table table-striped table-bordered">
        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                <a href="index.php">
                                <!-- <img src="images/crm logo 1.png" alt="" srcset=""  style="display: block;margin-left: auto;margin-right: auto;width: 60%;"> -->
                                <h2 style="font-weight: bold;    color: #3e3ea7;font-size: 72px;font-style: italic;font-weight: bold;text-decoration: underline">Go Get Going With Go </h2>
                                </a>
                                </div>
                            </div>
                        </div>
			
            <tr>
            <th>Lorry Name</th>
            <th>Speed</th>
            <th>Time</th>
            <th>Location</th>
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
        </tr>
    ';
}
	$output .= '
		</table>
	</div>
	';
	return $output;
}

$sql__="SELECT * FROM `email_scedule`";
$result__ = mysqli_query($db,$sql__);

while( $row = mysqli_fetch_array($result__) ){
	// $userid = $row['id'];
	$report = $row['report'];
	$time = $row['time'];
	$email = $row['email'];
	echo "Hamza ".$time;
	echo smtp_mailer($email,$today);
	

}

function smtp_mailer($to,$time){
	$connect = new PDO("mysql:host=localhost;dbname=sitara", "root", "Ptoptrack@(!!@");

	$file_name = md5(rand()) . '.pdf';
	$html_code = '<link rel="stylesheet" href="bootstrap.min.css">';
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
	$mail->Subject = 'Black Stop Report '.$time;			//Sets the Subject of the message
	$mail->Body = '<h1><h1><h3>Please Find details report of Black Stop in attach PDF File.</h3>';				//An HTML or plain text message body
	if($mail->Send())								//Send an Email. Return true on success or false on error
	{
		echo $message = '<label class="text-success">Black Stop Details has been send successfully...</label>';
	}
	unlink($file_name);
}

?>






