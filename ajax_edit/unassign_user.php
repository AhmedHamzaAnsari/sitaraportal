<?php 
include("../config_indemnifier.php");

$id = 0;
if(isset($_POST['id'])){
   $id = mysqli_real_escape_string($db,$_POST['id']);
}
if($id > 0 || $id!=''){

  // Check record exists
  $checkRecord = mysqli_query($db,"SELECT * FROM users_devices $id");
//   echo "SELECT * FROM patners WHERE id=$id";
  $totalrows = mysqli_num_rows($checkRecord);

  if($totalrows > 0){
    // Delete record
    $query = "DELETE FROM users_devices $id";
    mysqli_query($db,$query);
    echo 1;
    exit;
  }else{
    echo 0;
    exit;
  }
}

echo 0;
exit;
?>