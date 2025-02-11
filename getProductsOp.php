<?php
  

    // $departid = 0;

    // if(isset($_POST['depart'])){
    // $departid = mysqli_real_escape_string($db,$_POST['depart']); // department id
    // }

    // $users_arr = array();

    // if($departid > 0){
    //     $sql = "SELECT * FROM products_h WHERE status='1' and family= '".$departid."'";

    //     $result = mysqli_query($db,$sql);
    //     echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
    //     echo $result;
        
    //     while( $row = mysqli_fetch_array($result) ){
    //         $userid = $row['id'];
    //         $name = $row['name'];
    //         echo $name;
        
    //         $users_arr[] = array("id" => $userid, "name" => $name);
    //     }
    // }

    // // encoding array to json format
    // echo json_encode($users_arr);
?>

<?php 
include("config_indemnifier.php"); 
include("sessioninput.php"); 

$departid = 0;

if(isset($_POST['depart'])){
    $departid = mysqli_real_escape_string($db,$_POST['depart']); // department id
}
  $users_arr = array();
if($departid > 0){ //mode simple is true when button is Open 

    $sql = "SELECT * FROM products_h WHERE status='1' and family= '".$departid."'";
    echo $sql;

    $result = mysqli_query($db,$sql);
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
    echo $result;
    
    while( $row = mysqli_fetch_array($result) ){
        $userid = $row['id'];
        $name = $row['name'];
        echo $name;
    
        $users_arr[] = array("id" => $userid, "name" => $name);
    }
}
echo json_encode($users_arr);
?>