<?php
session_start();
$_SESSION['userA']="";
$_SESSION['passA']="";
session_unset();
session_destroy();

header("location:index.php");
?>

