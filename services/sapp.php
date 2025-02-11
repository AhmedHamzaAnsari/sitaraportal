<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://103.111.160.120:44300/sap/opu/odata/sap/ZP2P_TRACK_PROJ_SRV/InitialSet(\'25860001\')',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false),
  curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false),
  CURLOPT_HTTPHEADER => array(
    'Authorization: Basic dG1jX2FzaW06dG1jQDEyMw==',
    'Cookie: SAP_SESSIONID_DEV_200=biGrS9KJEytprG3huDAz5-5B8Q2q3BHuhIkAUFa6fv0%3d; sap-usercontext=sap-client=200'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
