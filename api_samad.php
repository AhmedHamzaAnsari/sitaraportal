<?php
$username = "C03748";
$password = "6bbdc582-7307-4749-ac98-e4252b44039b";
$remote_url = 'https://api.ssactivewear.com/v2/products/?style-39';

// Create a stream
$opts = array(
  'http'=>array(
    'method'=>"GET",
    'header' => "Authorization: Basic " . base64_encode("$username:$password")            
  )
);


$context = stream_context_create($opts);

// Open the file using the HTTP headers set above

$json = file_get_contents($remote_url, false, $context);

$json=str_replace('},
]',"}
]",$json);

$data = json_decode($json, true);

var_dump($data);
?>