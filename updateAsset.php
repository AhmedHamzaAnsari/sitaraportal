<?php
    include("config_indemnifier.php");
    $id = $_GET['id'];

    
    // $qry = mysqli_query($db,"select * from addcustomer where id='$id'"); // select query

    // $data = mysqli_fetch_array($qry); 
   
    if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Attempt update query execution
        $name = mysqli_real_escape_string($db,$_POST['name']);
        // $uniqueId = mysqli_real_escape_string($db,$_POST['imei']); 
        $sim = mysqli_real_escape_string($db,$_POST['sim']); 
        $make = mysqli_real_escape_string($db,$_POST['make']); 
        

        
        
    
        $sql = "UPDATE `devices` SET `name`='$name',`vehicle_make`='$make',`simno`='$sim' WHERE uniqueId='$id'";
        // echo $sql;
        if(mysqli_query($db, $sql)){
            
            echo "<script>
alert('Record Update successfully');
window.location.href='manageAsset.php';
</script>";
        } else {
            echo $sql;
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
        }



         
    }
    
    // Close connection
    mysqli_close($db);
?>