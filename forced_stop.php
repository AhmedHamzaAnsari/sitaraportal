<?php
    include("config_indemnifier.php");

    
    // $qry = mysqli_query($db,"select * from addcustomer where id='$id'"); // select query

    // $data = mysqli_fetch_array($qry); 
    if(isset($_POST['Forced__stop'])) {
        
        $id_trip = $_GET['trips__id'];
        $comments = $_GET['comments'];
        $date = $_GET['date'];
        $commenting = mysqli_real_escape_string($db,$_POST[$comments]); 

        

        
        
    
        $sql = "UPDATE trip_sub SET status='2',commets='$commenting' WHERE id='$id_trip'";
        // echo $sql;
        if(mysqli_query($db, $sql)){
            
            echo "<script>
alert('Trip Stop successfully');
window.location.href='tab_trip.php?date=". $_GET['date']."';
</script>";
        } else {
            echo $sql;
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
        }



         
    }
    
    // Close connection
    mysqli_close($db);
?>