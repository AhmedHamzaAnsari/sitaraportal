<?php
session_start();
unset($_SESSION["username"]);
unset($_SESSION["password"]);
unset($_SESSION["userid"]);
unset($_SESSION["name"]);
header("Location:index.php");
?>