

<?php
include "../config_indemnifier.php";
session_start();
$user_id = $_SESSION["userid"];
if (!empty($_POST)) {
    $output = "";
    $message = "";
    $cname = mysqli_real_escape_string($db, $_POST["cname"]);
    $old_sapno = mysqli_real_escape_string($db, $_POST["old_sapno"]);

    if ($_POST["employee_id"] != "") {
        $id = $_POST["employee_id"];


        $query = "UPDATE `sapstart` SET
                      `deliveryno` = '$cname'
                      WHERE `id` = '$id' ";
    
          //  echo $query;
    
          if (mysqli_query($db, $query)) {
              $message = 1;
              $date = date("Y-m-d H:i:s");
              $insert = "INSERT INTO `old_sapno`
              (`sap_id`,
              `old_sapno`,
              `updated_time`,
              `updated_by`)
              VALUES
              ('$id',
              '$old_sapno',
              '$date',
              '$user_id');";
    
              if (mysqli_query($db, $insert)) {
                  // $output .= '<div class="alert alert-light-warning border-0 mb-4" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="alert"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button> <strong>'.$message.' !</strong></div>';
                  //    $output .= $message;
              }
          }

    }

    echo $message;
}

?>
