

<?php
    $q = intval($_GET['q']);
    echo $q;

    include("config_indemnifier.php");
    mysqli_select_db($db,"ajax_demo");
    $sql="SELECT * FROM email WHERE id = '".$q."'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result);
    echo   $row['body']  ;
    mysqli_close($db);
?>
