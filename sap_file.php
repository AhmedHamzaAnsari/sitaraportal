<?php
    include("config_indemnifier.php");
 
$lines = file('sap_files.txt');
$count = 0;
 
foreach($lines as $line) {
    echo $line.'<br>';

    $sql_query = "SELECT * FROM sapstart where deliveryno=$line and status='0'";
    echo $sql_query .'<br>';
                
                $result = $db->query($sql_query) or die ("Error :".mysqli_error());
                $rowcount=mysqli_num_rows($result);
                echo $rowcount .'<br>';
}

 
?>

