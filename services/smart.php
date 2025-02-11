<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://13.213.212.113/webservice?token=getLiveData&user=etc%40trackingplus.pk&pass=Etc%402024&format=json',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false),
  curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false),
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Cookie: JSESSIONID=B5889F8A3DA9135C7FBB0CBBA041F8EB'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}
