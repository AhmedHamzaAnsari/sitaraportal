<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://login.aitrack.pk/api/get_devices?user_api_hash=%242y%2410%24MWdI3fsiX4YhnhYDdomLzetApTdSmqRmBwvq%2FcY43WaQIv9o7HIP6',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Cookie: laravel_session=eyJpdiI6ImRaQitxQXdwQk1ndTc5XC9mS2JKZGJBPT0iLCJ2YWx1ZSI6Ilh6XC9GT0RvSXBWY0x3ZkFCbDdOckJ4Y0tKQlFTcVJVeHJncWErK3BRUk9cLzVmM3VKSkF4dWZicTZ2MGsydzJZbnp3ZCs4S0IwczZiNVwvQjd1TFd3Q1hSbUYzeVF6ODhjVHBKZHhnTTg2V1VOSENjVWp4d3dheVlkQjQ4dlJzTEFXIiwibWFjIjoiNDA5ZmQwNjU2ZTU3OTZlYTM0MDc4ZGI3NjhhYTJkYTI4ZjM5NmI3OWU2ODkwYzZiMjU1Nzc5NzFhYzA4OTg2OSJ9'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
