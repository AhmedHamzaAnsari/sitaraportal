<?php
include("config_indemnifier.php"); 

// $departid = 0;
// if(isset($_POST['depart'])){
//    $departid = mysqli_real_escape_string($db,$_POST['depart']); // department id
// }

// $users_arr = array();

// if($departid > 0){
//     $sql = "SELECT * FROM products_h WHERE status='1' and family= '".$departid."'";
//     $result = mysqli_query($db,$sql);
    
//     while( $row = mysqli_fetch_array($result) ){
//         $userid = $row['id'];
//         $name = $row['name'];

//         echo $name;
    
//         $users_arr[] = array("id" => $userid, "name" => $name);
//     }
// }

// // encoding array to json format
// echo json_encode($users_arr);

if(isset($_POST['get_option']))
{
 $state = $_POST['get_option'];
 $find=mysqli_query($db,"SELECT * FROM products_h WHERE status='1' and family='$state'");
//  echo "SELECT * FROM products_h WHERE status='1' and family='$state'";
 while($row=mysqli_fetch_array($find))
 {
     
  echo "<option value=".$row['id'].">".$row['name']."</option>";
 }
 exit;
}
?>
