<?php
include("../config_indemnifier.php");

if (!empty($_POST)) {
    $dates = mysqli_real_escape_string($db, $_POST["dates"]);
    $cart_id = mysqli_real_escape_string($db, $_POST["cart_id"]);
    $interval = mysqli_real_escape_string($db, $_POST["interval"]);
    $e_id = mysqli_real_escape_string($db, $_POST["e_id"]);
    $datetime = date('Y-m-d H:i:s');

    if ($_POST["cart_id"] != '' && $_POST["dates"] != '') {
        $query = "INSERT INTO `daily_close_alert_action`
        (`cart_id`,
        `date`,
        `email`,
        `interval`,
        `created_at`,
        `created_by`)
        VALUES
        ('$cart_id',
        '$dates',
        '$e_id',
        '$interval',
        '$datetime',
        '$cart_id');";
    } else {

    }
    if (mysqli_query($db, $query)) {
        //  $output .= '<div class="alert alert-light-warning border-0 mb-4" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="alert"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button> <strong>'.$message.' !</strong></div>';  
        echo 1;
        send_mail($e_id);


    } else {
        echo 'Error'.mysqli_error($db).' Already Closed !';  


    }
} else {
    echo 0;
}

function send_mail($email){

$curl = curl_init();
$base_url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['SCRIPT_NAME']);
curl_setopt_array($curl, [
  CURLOPT_PORT => "8080",
  CURLOPT_URL => $base_url . "/sitara_schedule_email/close_alert_feedback.php?email=".$email."",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => [
    "Accept: */*",
    "User-Agent: Thunder Client (https://www.thunderclient.com)"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
//   echo $response;
}
}
?>