<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://livetrack.resq911.com.pk/api/last-location',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array('registerationNumber' => ''),
  CURLOPT_HTTPHEADER => array(
    'access-token: m82kmCeyzmUGPq16YMSuzM7Rf4lT4JHR0G44BkSLgXaw79AMHSc7slbrEAhXdDWx',
    'Cookie: ci_session=lavr6patvo7n9gjjg0ops7mhj1gdn62q; site_lang=english'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;