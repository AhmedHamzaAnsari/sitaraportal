<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://182.180.188.205:2000/api/Account/get_all_Fleet_Info',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'accept: text/plain',
    'Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJuYW1lIjpbIk9uZURheUFwaSIsIkJhc2l0Il0sIm5hbWVpZCI6IjgwMDQwIiwibmJmIjoxNjk4MzkzODQzLCJleHAiOjE2OTg0ODAyNDMsImlhdCI6MTY5ODM5Mzg0MywiaXNzIjoiTW9uaXQtVGFuemlsLkphZmZyZXkiLCJhdWQiOiJodHRwOi8vTG9jYWxob3N0OjkwOTAifQ.SuNbzVxh3vwUohdcp8aAiGr3bEbQTf3DOdFyFVdpQFY'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
