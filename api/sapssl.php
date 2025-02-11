
<?php
 header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
        header('Access-Control-Allow-Headers: token, Content-Type');
        header('Access-Control-Max-Age: 1728000');
        header('Content-Length: 0');
        header('Content-Type: text/plain');

include("../config_indemnifier.php");
	date_default_timezone_set("Asia/karachi");
	$accesskey = mysqli_real_escape_string($db, $_GET['accesskey']);
    $deliveryno = mysqli_real_escape_string($db, $_GET['deliveryno']);
    $tlno = mysqli_real_escape_string($db, $_GET['tlno']);
    $driverid = mysqli_real_escape_string($db, $_GET['driverid']);
    $drivername = mysqli_real_escape_string($db, $_GET['drivername']);
    $drivercnic = mysqli_real_escape_string($db, $_GET['drivercnic']);
    $drivernum = mysqli_real_escape_string($db, $_GET['drivernum']);
    $tripstart = mysqli_real_escape_string($db, $_GET['tripstart']);
    $tripend = mysqli_real_escape_string($db, $_GET['tripend']);
    $alerts = mysqli_real_escape_string($db, $_GET['alerts']);
    $Date = date("Y-m-d H:i:s");
    if($deliveryno !='' || $tlno !='' || $driverid !='' || $drivername !='' || $drivercnic !='' || $drivernum !='' || $tripstart !='' || $tripend !='' || $alerts !=''){
        $sql = "INSERT INTO sapdata(deliveryno, tlno, driverid, dname, dcnic, dnumber, tripstart, tripend, alerts, datetime,status) VALUES 
	     ('$deliveryno','$tlno','$driverid','$drivername','$drivercnic','$drivernum','$tripstart','$tripend','$alerts','$Date','0')";
		if (mysqli_query($db, $sql)) {
			echo "successfully !";
		}
		else {
		echo "Error: " . $sql . "" . mysqli_error($db);
	 }
    }else{
        echo "All fields Required";
    }
 
        
	
?>