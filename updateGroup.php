<?php
    include("config_tc.php");
    $id = $_GET['id'];

    
    // $qry = mysqli_query($db,"select * from addcustomer where id='$id'"); // select query

    // $data = mysqli_fetch_array($qry); 
   
    if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Attempt update query execution
    $group = mysqli_real_escape_string($db,$_POST['group']);
    

        $sql = "UPDATE `create_group` SET `name`='$group' WHERE id=$id";
        echo $sql;
        if(mysqli_query($db, $sql)){
            echo "Records were updated successfully.";
            header("location: manageGroup.php");
        } else {
            echo $sql;
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
        }
    }
    
    // Close connection
    mysqli_close($db);
?>