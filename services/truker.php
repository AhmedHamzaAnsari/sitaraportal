<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://tracking.api.trukkr.pk:4021/api/vehicle/tracking/current_packet',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Authorization: U2FsdGVkX18N6NFuP9myVkAyr29YNiTJRXSW6GnvY12o8i5lvnnqFQf7NkteuciEmGNeLBxHLhWLUg4psitx7l7GNesfePnKhfGgSHFU61k9Y+hFEjTJaBmnmC8A9FVNPoXXkDCvLpxquNDeW0TEuVjCde3xFmLYzyejYhM00VhRNYCSwvMVYa49+OmZom66cr+M08XN8QciTNXLxrV6a17RDRE/D73TSD4WXGFe8Y8='
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;