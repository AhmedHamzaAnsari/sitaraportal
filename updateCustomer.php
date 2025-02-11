<?php
    include("config_indemnifier.php");
    $id = $_GET['id'];

    
    // $qry = mysqli_query($db,"select * from addcustomer where id='$id'"); // select query

    // $data = mysqli_fetch_array($qry); 
   
    if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Attempt update query execution
        $name = mysqli_real_escape_string($db,$_POST['name']);
        $email = mysqli_real_escape_string($db,$_POST['email']); 
        // $number = mysqli_real_escape_string($db,$_POST['number']); 
        // $currency = mysqli_real_escape_string($db,$_POST['currency']); 
        // $username = mysqli_real_escape_string($db,$_POST['username']); 
        $password = mysqli_real_escape_string($db,$_POST['confirm_password']); 
        $number = mysqli_real_escape_string($db,$_POST['number']); 
        
        $privilege = mysqli_real_escape_string($db,$_POST['privilege']); 

        // $qty = $_POST['assign'];

        // $billingAdd = mysqli_real_escape_string($db,$_POST['billingAdd']); 
        // $paddress = mysqli_real_escape_string($db,$_POST['paddress']); 
        // $securityNo = mysqli_real_escape_string($db,$_POST['securityNo']); 
        // $joinDate = mysqli_real_escape_string($db,$_POST['joinDate']); 
        // $billingProfile = mysqli_real_escape_string($db,$_POST['billingProfile']); 

        // $assign = mysqli_real_escape_string($db,$_POST['assign']); 

        // $sql = "UPDATE `users` SET `name`='$name',`email`='$email',`number`='$number',`currency`='$currency',`username`='$username',`password`='$password',`billingAdd`='$billingAdd',`paddress`='$paddress',`securityNo`='$securityNo',`joinDate`='$joinDate',`billingProfile`='$billingProfile',`assign`='$assign' WHERE id='$id'";
        $sql = "UPDATE `users` SET `name`='$name',`privilege`='$privilege',`email`='$email',`login`='$email',`description`='$password',`telephone`='$number' WHERE id='$id'";
        echo $sql;
        if(mysqli_query($db, $sql)){
            echo "<script>
alert('Record Update successfully');
// window.location.href='manageCustomer.php';
</script>";
        } else {
            echo $sql;
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
        }
        
        // foreach ($qty as $assign) {
        //     $sql1 = "INSERT INTO  tc_user_device (`userid`,`deviceid`)
        //         VALUES ('$id','$assign')";
    
        //     if (mysqli_query($db, $sql1)) {
        //     echo '<script>alert("New record created successfully")</script>';
        //     } else {
        //         echo "Error: " . $sql . "<br>" . mysqli_error($db);
        //     }
        // }
        
    }
    
    // Close connection
    mysqli_close($db);
?>