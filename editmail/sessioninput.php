<?php
session_start();
?>

<?php
if($_SESSION["password"]) {
?>
    <!-- <input type="hidden"> -->
<?php
}else {
    echo "<h1>Please login first .</h1>";
    header("location: ../index.php");
}

?>

