<?php
session_start();
$_SESSION['user']="";
$_SESSION['pass']="";
session_unset();
session_destroy();
header("location:index.php");
?>

