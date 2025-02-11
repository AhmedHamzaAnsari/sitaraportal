<?php
 $url = '20';
    echo $url . '<br/>';
 $enc = base64_encode($url);
 echo $enc . '<br/>';

 $denc = base64_decode($enc);

 echo $denc . '<br/>';




?>