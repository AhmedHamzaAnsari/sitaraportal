<?php
    include("config_indemnifier.php");
    $id = $_GET['id'];

    
    // $qry = mysqli_query($db,"select * from addcustomer where id='$id'"); // select query

    // $data = mysqli_fetch_array($qry); 
   
    if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Attempt update query execution
    // $s_no = mysqli_real_escape_string($db,$_POST['s_no']);
    $type = mysqli_real_escape_string($db,$_POST['type']); 
    $vehicle_no = mysqli_real_escape_string($db,$_POST['vehicle_no']); 
    $complaint_name = mysqli_real_escape_string($db,$_POST['complaint_name']); 
    $phone = mysqli_real_escape_string($db,$_POST['phone']); 
    // $party_acount = mysqli_real_escape_string($db,$_POST['party_acount']); 
    $complaint_status = mysqli_real_escape_string($db,$_POST['complaint_status']); 
    $to = mysqli_real_escape_string($db,$_POST['to']); 
    $from = mysqli_real_escape_string($db,$_POST['from']); 
    $complaint = mysqli_real_escape_string($db,$_POST['complaint']); 

        $sql = "UPDATE `complaint` SET `complaint_no`='',`type`='$type',`vehicle_no`='$vehicle_no',`complaint_name`='$complaint_name',`phone`='$phone',`party_acount`='',`complaint_status`='$complaint_status',`assign_to`='$to',`assign_from`='$from',`complaint`='$complaint' WHERE id=$id";
        // echo $sql;
        if(mysqli_query($db, $sql)){
            // echo "Records were updated successfully.";
            echo "<script>
            alert('Complaint Update successfully');
            window.location.href=' manageComplain.php';
            </script>";
            // header("location: manageComplain.php");
        } else {
            echo $sql;
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
        }
    }
    
    // Close connection
    mysqli_close($db);
?>