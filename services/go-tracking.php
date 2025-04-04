<?php

$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://13.213.212.113/webservice?token=getLiveData&user=etc%40trackingplus.pk&pass=Etc%402024&form%20at=json",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false),
  curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false),
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
  echo $response;
}