<?php

include("config_indemnifier.php");
$id = $_GET['id'];
$table_doc = $_GET['table'];
echo $table_doc;

if($table_doc==="Corporate"){
    $table_doc = "corporate";
}
else if($table_doc==="Person"){
    $table_doc = "accperson";
}
else if($table_doc==="Insurance"){
    $table_doc = "accinsurance";
}

if($table_doc != null){
    echo "not null";
    $del = mysqli_query($db,"delete from $table_doc where id = '$id'"); // delete query
    echo $del;
    
    if($del)
    {
        echo "<script>
        alert('Record Delete successfully..!');
        window.location.href='manage_accounts_h.php';
        </script>";
        // mysqli_close($db); // Close connection
        // header("location:manage_accounts_h.php"); // redirects to all records page
        exit;	
    }
    else
    {
        echo "Error deleting record"; // display error message if not delete
    }
}

?>