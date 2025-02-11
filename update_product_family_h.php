<?php
    include("config_indemnifier.php");
    $id = $_GET['id'];

    
    // $qry = mysqli_query($db,"select * from addcustomer where id='$id'"); // select query

    // $data = mysqli_fetch_array($qry); 
   
    if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Attempt update query execution
    // $s_no = mysqli_real_escape_string($db,$_POST['s_no']);
    $name = mysqli_real_escape_string($db,$_POST['name']);
    $status = mysqli_real_escape_string($db,$_POST['status']); 
    

        $sql = "UPDATE `product_family` SET `name`='$name',`status`='$status' WHERE id=$id";
        // echo $sql;
        if(mysqli_query($db, $sql)){
            echo "<script>
            alert('Data Update successfully');
            window.location.href='manage_family_product_h.php';
            </script>";
            // header("location: managecompany.php");
        } else {
            echo $sql;
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
        }
    }
    
    // Close connection
    mysqli_close($db);
?>