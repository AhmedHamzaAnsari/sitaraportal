<?php
    include("config_indemnifier.php");
    $id = $_GET['id'];

    
    // $qry = mysqli_query($db,"select * from addcustomer where id='$id'"); // select query

    // $data = mysqli_fetch_array($qry); 
   
    if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Attempt update query execution
        $name = mysqli_real_escape_string($db,$_POST['name']);
        $email = mysqli_real_escape_string($db,$_POST['email']);
        $password = mysqli_real_escape_string($db,$_POST['confirm_password']); 
        $password_enc = mysqli_real_escape_string($db,$_POST['confirm_password']); 
        $encriped=  md5($password_enc);
        $number = mysqli_real_escape_string($db,$_POST['number']); 

    

        $sql = "UPDATE users SET `name`='$name',`email`='$email',`login`='$email',`password`='$encriped',`telephone`='$number',`description`='$password' WHERE id=$id";
        // echo $sql;
        if(mysqli_query($db, $sql)){
            echo "<script>
alert('Asset Update successfully');
window.location.href='editusers.php?id=$id';
</script>";
            // header("location: manageusers.php");
        } else {
            echo $sql;
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
        }
    }
    
    // Close connection
    mysqli_close($db);
?>